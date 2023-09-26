<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Models\Cart;
use App\Services\User\LoginUserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginUserController extends BaseController
{


    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //

        $validator = Validator::make($request->all(),
            [
                'username' => 'required|string|max:255',
                'password' => 'required|string|min:8|max:255',
            ]

        );

        if ($validator->fails()) {
            return $this->sendError(['errors' => $validator->errors()], "validated fails",
                Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {

            $credentials = request(['username', 'password']);
            if (!Auth::attempt($credentials)) {
                return $this->sendError([], "Unauthorized", Response::HTTP_UNAUTHORIZED);
            }
            $user = Auth::user();
            $cart = Cart::firstOrCreate(["userId" => $user->userID]);
            $accessToken = $user->createToken('authToken')->accessToken;
            return $this->sendSuccess(['accessToken' => $accessToken, "user" => $user, "cart" => $cart]);
        }
    }
}
