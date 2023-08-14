<?php

namespace App\Services\Employee;

class GetAllEmployeeService extends BaseService
{
    public function execute(): array
    {
        return Employee::query()->with("user")->get();


        return $this->employeeRepository->getAll();


    }
}