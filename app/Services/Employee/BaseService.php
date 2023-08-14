<?php

namespace App\Services\Employee;

use App\Repositories\EmployeeRepository;

class BaseService
{

    protected EmployeeRepository $employeeRepository;

    /**
     * @param EmployeeRepository $employeeRepository
     */
    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

}