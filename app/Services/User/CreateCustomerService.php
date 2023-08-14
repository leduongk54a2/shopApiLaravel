<?php

namespace App\Services\User;

use App\Models\Customer;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class CreateCustomerService extends BaseService
{

    public function execute($params)
    {
        $user = new User();
        $customer = new Customer();
        $user->username = $params['username'];
        $user->full_name = $params['full_name'];
        $user->address = $params['address'];
        $user->phone_number = $params['phone_number'];
        $user->email = $params['email'];
        $user->password = bcrypt($params['password']);
        $user->role = APP_ROLE["CUSTOMER"];

        try {
            \DB::beginTransaction();
            $customer->user_id = DB::table('users')->insertGetId($user->getAttributes());
            if (!$params["birth"]) {
                throw new Exception("choose birth");
            }
            $customer->birth = \DateTime::createFromFormat("Y-m-d", $params["birth"]);
            $customer->credit_card_number = $params["creditCardNumber"];
            $this->customerRepository->create($customer->getAttributes());
            \DB::commit();

        } catch (Exception $e) {
            \DB::rollback();
            return $e->getMessage();
        }
    }
}
