<?php

namespace App\Services\User;

use App\Repositories\CustomerRepository;
use App\Repositories\UserRepository;

class BaseService
{
    protected UserRepository $userRepository;
    protected CustomerRepository $customerRepository;


    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository, CustomerRepository $customerRepository)
    {
        $this->userRepository = $userRepository;
        $this->customerRepository = $customerRepository;
    }

}
