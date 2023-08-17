<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\BaseController;
use App\Services\Employee\GetAllEmployeeService;
use Illuminate\Http\Request;

class GetAllEmployeeController extends BaseController
{
    protected GetAllEmployeeService $service;

    /**
     * @param GetAllEmployeeService $service
     */
    public function __construct(GetAllEmployeeService $service)
    {
        $this->service = $service;
    }


    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request): object
    {
        return $this->sendSuccess($this->service->execute(), "get done");
    }
}
