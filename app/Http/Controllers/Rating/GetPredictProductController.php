<?php

namespace App\Http\Controllers\Rating;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Services\Product\GetProductDetailService;
use App\Services\Rating\GetPredictProductService;
use Illuminate\Http\Request;

class GetPredictProductController extends BaseController
{

    protected GetPredictProductService $service;

    /**
     * @param GetPredictProductService $service
     */
    public function __construct(GetPredictProductService $service)
    {
        $this->service = $service;
    }


    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        try {
            $result = $this->service->execute($id);
            return $this->sendSuccess($result);

        } catch (\Exception $e) {
            return $this->sendError([],$e->getMessage());
        }
    }
}
