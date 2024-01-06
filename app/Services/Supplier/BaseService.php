<?php

namespace App\Services\Supplier;

use App\Repositories\SupplierRepository;

class BaseService
{

    protected SupplierRepository $supplierRepository;

    /**
     * @param SupplierRepository $supplierRepository
     */
    public function __construct(SupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }


}
