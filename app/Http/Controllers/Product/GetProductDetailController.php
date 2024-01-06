<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Services\Product\GetProductDetailService;
use Illuminate\Http\Request;

class GetProductDetailController extends BaseController
{

    protected  GetProductDetailService $service;

    /**
     * @param GetProductDetailService $service
     */
    public function __construct(GetProductDetailService $service)
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
            $product = $this->service->execute($id);
            return $this->sendSuccess( $product);
        } catch (Exception $e) {
            return $this->sendError([],$e->getMessage());
        }
    }
}
