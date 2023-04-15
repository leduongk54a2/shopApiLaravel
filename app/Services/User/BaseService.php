<?php

namespace App\Services\User;

use App\Repositories\UserRepository;

class BaseService
{
    protected UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


}
