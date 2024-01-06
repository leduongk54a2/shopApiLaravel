<?php

namespace App\Services\Supplier;

class GetInfoSupplierService extends BaseService
{
    public function execute($id)
    {
        return $this->supplierRepository->find($id)->toArray();
    }
}
