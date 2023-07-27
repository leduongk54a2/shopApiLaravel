<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Services\User\UpdatePasswordService;
use Illuminate\Http\Request;
use Exception;

class UpdatePasswordController extends BaseController
{
    protected  UpdatePasswordService $service;

    /**
     * @param UpdatePasswordService $service
     */
    public function __construct(UpdatePasswordService $service)
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
        //

        try {
            $this->service->execute($request->all());
            return $this->sendSuccess();
        } catch (Exception $e) {
            return $this->sendError([],$e->getMessage());
        }
    }
}
