<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\BaseController;
use App\Services\Employee\GetEmployeeInfoService;
use Illuminate\Http\Request;

class GetEmployeeInfoController extends BaseController
{

    protected GetEmployeeInfoService $service;

    /**
     * @param GetEmployeeInfoService $service
     */
    public function __construct(GetEmployeeInfoService $service)
    {
        $this->service = $service;
    }


    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        return $this->sendSuccess($this->service->execute($id), "get done");
    }
}
