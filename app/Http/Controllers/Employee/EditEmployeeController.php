<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\BaseController;
use App\Services\Employee\EditEmployeeService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class EditEmployeeController extends BaseController
{

    protected EditEmployeeService $service;

    /**
     * @param EditEmployeeService $service
     */
    public function __construct(EditEmployeeService $service)
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
        $validator = Validator::make($request->all(),
            [
                'full_name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'phone_number' => 'required|string|max:255',
                'email' => 'required|string|email:rfc,dns|max:255|',
                'birth' => 'required|date_format:Y-m-d',
                'salary' => 'required|integer',
                'gender' => 'required|boolean'

            ]
        );

        if ($validator->fails()) {
            return $this->sendError(['errors' => $validator->errors()], "validated fails",
                Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            $error = $this->service->execute($request->all(), $id);
            if (strlen($error) > 0) {
                return $this->sendError(['errors' => ""], $error);
            } else {
                return $this->sendSuccess();

            }
        }
    }
}
