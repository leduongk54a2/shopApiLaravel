<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Employee\CreateEmployeeRequest;
use App\Services\Employee\CreateEmployeeService;

class CreateEmployeeController extends BaseController
{

    protected CreateEmployeeService $service;

    /**
     * @param CreateEmployeeService $service
     */
    public function __construct(CreateEmployeeService $service)
    {
        $this->service = $service;
    }


    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateEmployeeRequest $request)
    {
//        $validator = Validator::make($request->all(),
//            [
//                'username' => 'required|string|max:255|unique:users',
//                'full_name' => 'required|string|max:255',
//                'address' => 'required|string|max:255',
//                'phone_number' => 'required|string|max:255',
//                'email' => 'required|string|email:rfc,dns|max:255|unique:users',
//                'password' => 'required|string|min:8|max:255|confirmed',
//                'birth' => 'required|date_format:Y-m-d',
//                'salary' => 'required|integer',
//                'gender' => 'required|boolean'
//
//            ]
//        );
//
//        if ($validator->fails()) {
//            return $this->sendError(['errors' => $validator->errors()], "validated fails",
//                Response::HTTP_UNPROCESSABLE_ENTITY);
//        } else {
//        }
        $error = $this->service->execute($request->all());
        if (strlen($error) > 0) {
            return $this->sendError(['errors' => ""], $error);
        } else {
            return $this->sendSuccess();
        }
    }

}
