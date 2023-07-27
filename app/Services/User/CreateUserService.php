<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Str;

class CreateUserService extends BaseService
{

    public function  execute($params) {
        $user = new User();
        $user->username= $params['username'];
        $user->full_name = $params['full_name'];
        $user->address = $params['address'];
        $user->phone_number = $params['phone_number'];
        $user->email = $params['email'];
        $user->password = bcrypt($params['password']);
        $this->userRepository->create($user->getAttributes());
    }
}
