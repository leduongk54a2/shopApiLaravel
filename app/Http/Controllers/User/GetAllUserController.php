<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Services\User\GetAllUserService;
use Illuminate\Http\Request;

class GetAllUserController extends BaseController
{

    protected GetAllUserService $service;

    /**
     * @param GetAllUserService $service
     */
    public function __construct(GetAllUserService $service)
    {
        $this->service = $service;
    }


    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return  $this->sendResponse($this->service->execute(),"get complete");
    }
}
