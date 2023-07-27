<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Str;

class GetAllUserService extends BaseService
{
    public function  execute() {

        return $this->userRepository->all();
    }
}
