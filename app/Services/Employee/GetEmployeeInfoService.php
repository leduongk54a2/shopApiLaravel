<?php

namespace App\Services\Employee;

class GetEmployeeInfoService extends BaseService
{
    public function execute($id)
    {
        return $this->employeeRepository->withUser()->find($id)->toArray();
    }
}