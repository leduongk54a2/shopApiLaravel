<?php

namespace App\Services\Customer;

class GetInfoCustomerService extends BaseService
{

    public function execute( $id)
    {

        $customerInfo = $this->customerRepository->where("user_id", $id)->first()->toArray();
        return $customerInfo;
    }


}
