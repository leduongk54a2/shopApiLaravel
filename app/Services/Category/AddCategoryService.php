<?php

namespace App\Services\Category;


use App\Models\Category;

class AddCategoryService extends BaseService
{

    public function execute($params)
    {
        $category = new Category();
        $category->categoryName = $params["categoryName"];
        $category->textDescription = $params["textDescription"];
        $category->visible = true;
        $this->categoryRepository->create($category->getAttributes());

    }

}