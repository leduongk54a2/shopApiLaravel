<?php

namespace App\Services\Category;

use App\Repositories\CategoryRepository;

class BaseService
{

    protected CategoryRepository $categoryRepository;

    /**
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


}