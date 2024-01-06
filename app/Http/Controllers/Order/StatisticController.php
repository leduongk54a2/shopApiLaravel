<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Services\Order\StatisticService;
use Illuminate\Http\Request;

class StatisticController extends BaseController
{

    protected StatisticService $service;

    /**
     * @param StatisticService $service
     */
    public function __construct(StatisticService $service)
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
