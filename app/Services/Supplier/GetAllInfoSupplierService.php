<?php

namespace App\Services\Supplier;

class GetAllInfoSupplierService extends BaseService
{
    public function execute()
    {

        return $this->supplierRepository->all()->toArray();
    }


}
