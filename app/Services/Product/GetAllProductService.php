<?php

namespace App\Services\Product;

use App\Models\Rating;

class GetAllProductService extends BaseService
{
    public function execute($categoryId = null, $supplierId = null, $sortTypePrice = null, $keyword = null)
    {
        $listProducts = $this->categoryRepository->getModel()->with([
            "products" => function ($q) use ($categoryId,$supplierId, $sortTypePrice, $keyword) {
                $q->when(!is_null($keyword), function ($q) use ($keyword) {
                    $q->where("productName", "like", "%" . $keyword . "%");
                })->when(!is_null($categoryId), function ($q) use ($categoryId) {
                    $q->where("categoryId", $categoryId);
                })->when(!is_null($supplierId), function ($q) use ($supplierId) {
                    $q->where("supplierId", $supplierId);
                });
            }
        ])->where("visible", true)->get()->pluck("products")->flatten()->sortBy("productId");
        if (!is_null($sortTypePrice)) {
            if ($sortTypePrice) {
                $listProducts = $listProducts->sortBy("price");
            } else {
                $listProducts = $listProducts->sortByDesc("price");
            }
        }


        $result = [];

        foreach ($listProducts->toArray() as $item) {
            $ratingAvg =     Rating::where('productId', $item["productId"])->get()->avg('ratingPoint');
            $item["rating"] = $ratingAvg;
            array_push($result,$item);
        }


        return $result;

    }
}
