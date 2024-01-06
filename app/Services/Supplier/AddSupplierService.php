<?php

namespace App\Services\Supplier;


use App\Models\Supplier;

class AddSupplierService extends BaseService
{

    public function execute($params)
    {
        $category = new Supplier();
        $category->supplierName = $params["supplierName"];
        $category->textDescription = $params["textDescription"];
        $this->supplierRepository->create($category->getAttributes());
    }

}
