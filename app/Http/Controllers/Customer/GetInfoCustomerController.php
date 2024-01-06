<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Services\Customer\GetInfoCustomerService;
use Illuminate\Http\Request;

class GetInfoCustomerController extends BaseController
{

    protected GetInfoCustomerService $service;

    /**
     * @param GetInfoCustomerService $service
     */
    public function __construct(GetInfoCustomerService $service)
    {
        $this->service = $service;
    }


    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$id)
    {
        try {
            $result = $this->service->execute($id);
            return $this->sendSuccess($result);

        } catch (\Exception $e) {
            return $this->sendError([],$e->getMessage());
        }
    }
}