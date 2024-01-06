<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Services\Order\SaveOrderService;
use Illuminate\Http\Request;

class SaveOrderController extends BaseController
{
    protected SaveOrderService $service;

    /**
     * @param SaveOrderService $service
     */
    public function __construct(SaveOrderService $service)
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
            $message = $this->service->execute($request->all());
            if(!strlen($message)) {
                return $this->sendSuccess();
            } else {
                return $this->sendError([], $message);
            }
    }
}
