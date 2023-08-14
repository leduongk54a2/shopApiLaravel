<?php

namespace App\Services\Employee;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CreateEmployeeService extends BaseService
{
    public function execute($params)
    {
        $user = new User();
        $employee = new Employee();
        $user->username = $params['username'];
        $user->full_name = $params['full_name'];
        $user->address = $params['address'];
        $user->phone_number = $params['phone_number'];
        $user->email = $params['email'];
        $user->password = bcrypt($params['password']);
        $user->role = APP_ROLE["EMPLOYEE"];

        try {
            \DB::beginTransaction();
            $employee->user_id = DB::table('users')->insertGetId($user->getAttributes());
            $employee->birth = \DateTime::createFromFormat("Y-m-d", $params["birth"]);
            $employee->salary = $params["salary"];
            $employee->gender = $params["gender"];
            $this->employeeRepository->create($employee->getAttributes());
            \DB::commit();

        } catch (Exception $e) {
            \DB::rollback();
            return $e->getMessage();
        }
    }
}