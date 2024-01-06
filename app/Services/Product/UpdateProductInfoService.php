<?php

namespace App\Services\Product;

class UpdateProductInfoService extends BaseService
{
    public function execute($productId, $params)
    {
        $this->productRepository->update($params, $productId);
    }
}
