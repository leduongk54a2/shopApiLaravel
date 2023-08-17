<?php

namespace App\Services\Employee;

class GetAllEmployeeService extends BaseService
{
    public function execute(): array
    {

        return $this->employeeRepository->withUser()->get()->toArray();
    }
}