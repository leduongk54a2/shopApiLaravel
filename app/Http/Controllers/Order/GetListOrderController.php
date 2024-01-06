<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Services\Order\GetListOrderService;
use Illuminate\Http\Request;

class GetListOrderController extends BaseController
{
    protected GetListOrderService $service;

    /**
     * @param GetListOrderService $service
     */
    public function __construct(GetListOrderService $service)
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
        try {
            $result = $this->service->execute();
            return $this->sendSuccess($result);

        } catch (\Exception $e) {
            return $this->sendError([],$e->getMessage());
        }
    }
}
