<?php

namespace App\Services\User;

use Exception;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordService extends BaseService
{
    public function execute($params)
    {

        $user = $this->userRepository->where("username", $params["username"])->first();


        if ($user === null) {
            throw  new Exception("username not correct");
        }
        if (Hash::check($params["oldPassword"], $user->makeVisible(['password'])->password)) {
            $user->password = bcrypt($params["newPassword"]);
            $user->save();
            return true;
        } else {
            throw  new Exception("password not correct");
        }
    }
}
