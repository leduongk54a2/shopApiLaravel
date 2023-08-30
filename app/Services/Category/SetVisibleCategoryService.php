<?php

namespace App\Services\Category;

class SetVisibleCategoryService extends BaseService
{
    public function execute($params, $id)
    {
       
        return $this->categoryRepository->update(["visible" => $params["visible"]], $id);
    }

}