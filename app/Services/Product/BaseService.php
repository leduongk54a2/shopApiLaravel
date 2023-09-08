<?php

namespace App\Services\Product;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class BaseService
{
    protected ProductRepository $productRepository;
    protected CategoryRepository $categoryRepository;

    /**
     * @param ProductRepository $productRepository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }


}