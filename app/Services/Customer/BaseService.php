<?php

namespace App\Services\Customer;

use App\Repositories\CustomerRepository;

class BaseService
{

    protected  CustomerRepository $customerRepository;

    /**
     * @param CustomerRepository $customerRepository
     */
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }


}
