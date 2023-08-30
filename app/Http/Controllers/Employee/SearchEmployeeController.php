<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\BaseController;
use App\Services\Employee\SearchEmployeeService;
use Illuminate\Http\Request;

class SearchEmployeeController extends BaseController
{

    protected SearchEmployeeService $service;

    /**
     * @param SearchEmployeeService $service
     */
    public function __construct(SearchEmployeeService $service)
    {
        $this->service = $service;
    }


    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $keyword = $request->query('keyword');
        return $this->sendSuccess($this->service->execute($keyword));
    }
}
