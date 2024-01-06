<?php

namespace App\Services\Product;

class GetProductDisplayService extends BaseService
{
    public function execute()
    {

      return  $this->productRepository->where("display",true)->get();
    }
}
