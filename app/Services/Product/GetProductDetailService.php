<?php

namespace App\Services\Product;

use App\Models\Rating;

class GetProductDetailService extends BaseService
{
    public function execute($id)
    {
        $product =  $this->productRepository->find($id)->toArray();
        $ratingAvg = Rating::where('productId', $product["productId"])->get()->avg('ratingPoint');
        $product["rating"] = $ratingAvg;

        return $product;
    }
}
