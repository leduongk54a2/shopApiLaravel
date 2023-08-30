<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\BaseController;
use App\Services\Employee\DeleteEmployeeService;
use Illuminate\Http\Request;

class DeleteEmployeeController extends BaseController
{

    protected DeleteEmployeeService $service;

    /**
     * @param DeleteEmployeeService $service
     */
    public function __construct(DeleteEmployeeService $service)
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
        $ids = $request->query('ids');

        $error = $this->service->execute(explode(",", $ids));

        if (strlen($error) > 0) {
            return $this->sendError([], $error);
        } else {
            return $this->sendSuccess();
        }
    }
}
