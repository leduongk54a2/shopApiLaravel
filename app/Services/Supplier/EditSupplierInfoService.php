<?php

namespace App\Services\Supplier;

class EditSupplierInfoService extends BaseService
{

    public function execute($params, $id)
    {
        $paramsUpdate = [
            "supplierName" => $params["supplierName"],
            "textDescription" => $params["textDescription"],
        ];

        $this->supplierRepository->update($paramsUpdate, $id);

    }

}
