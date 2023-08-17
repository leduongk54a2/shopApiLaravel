<?php

namespace App\Services\Employee;

use App\Repositories\EmployeeRepository;
use App\Repositories\UserRepository;

class BaseService
{

    protected EmployeeRepository $employeeRepository;
    protected UserRepository $userRepository;

    /**
     * @param EmployeeRepository $employeeRepository
     * @param UserRepository $userRepository
     */
    public function __construct(EmployeeRepository $employeeRepository, UserRepository $userRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->userRepository = $userRepository;
    }


}