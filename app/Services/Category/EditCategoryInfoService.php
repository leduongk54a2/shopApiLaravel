<?php

namespace App\Services\Category;

class EditCategoryInfoService extends BaseService
{

    public function execute($params, $id)
    {
        $paramsUpdate = [
            "categoryName" => $params["categoryName"],
            "textDescription" => $params["textDescription"],
            "visible" => $params["visible"]
        ];

        $this->categoryRepository->update($paramsUpdate, $id);

    }

}