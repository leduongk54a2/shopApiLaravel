<?php

namespace App\Services\Category;

class GetAllInfoCategoryService extends BaseService
{
    public function execute()
    {

        return $this->categoryRepository->all()->toArray();
    }


}