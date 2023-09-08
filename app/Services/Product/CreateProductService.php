<?php

namespace App\Services\Product;

class CreateProductService extends BaseService
{

    public function execute($params)
    {
//        dd($params);

        $this->productRepository->create($params);

    }


}