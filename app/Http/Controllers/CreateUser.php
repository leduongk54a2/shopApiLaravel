<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateUser extends Controller
{
    public function __invoke(Request $request)
    {
        return $request->all();
    }
}
