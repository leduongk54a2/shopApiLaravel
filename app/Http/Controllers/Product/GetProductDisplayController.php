<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Services\Product\GetProductDisplayService;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class GetProductDisplayController extends BaseController
{
    protected GetProductDisplayService $service;

    /**
     * @param GetProductDisplayService $service
     */
    public function __construct(GetProductDisplayService $service)
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
           return  $this->sendSuccess($this->service->execute());
        } catch (Exception $e) {
           return $this->sendError([],$e->getMessage());
        }

    }
}
