<?php

namespace App\Services\Product;

class GetAllProductService extends BaseService
{
    public function execute($categoryId = null, $sortTypePrice = null, $keyword = null)
    {
        $listProducts = $this->categoryRepository->getModel()->with([
            "products" => function ($q) use ($categoryId, $sortTypePrice, $keyword) {
                $q->when(!is_null($keyword), function ($q) use ($keyword) {
                    $q->where("productName", "like", "%" . $keyword . "%");
                })->when(!is_null($categoryId), function ($q) use ($categoryId) {
                    $q->where("categoryId", $categoryId);
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

//        dd($listProducts);
//        return $listProducts;

        return array_values($listProducts->toArray());

    }
}