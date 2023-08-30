<?php

namespace App\Services\Category;

class GetInfoCategoryService extends BaseService
{
    public function execute($id)
    {
        return $this->categoryRepository->find($id)->toArray();
    }
}