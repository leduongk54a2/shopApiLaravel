<?php

namespace App\Services\Employee;

class SearchEmployeeService extends BaseService
{
    public function execute($keyword)
    {
        $keySearch = '%' . $keyword . '%';
        return $this->employeeRepository->join("users", "user_id", "=", "userID")->where("full_name", "like",
            $keySearch)->orWhere("username", "like",
            $keySearch)->orWhere("gender", "like",
            $keySearch)->orWhere("address", "like",
            $keySearch)->orWhere("phone_number", "like",
            $keySearch)->orWhere("birth", "like",
            $keySearch)->orWhere("salary", "like",
            $keySearch)->get()->makeHidden([
            "userID",
            "email_verified_at",
            "password",
        ])->toArray();
    }
}