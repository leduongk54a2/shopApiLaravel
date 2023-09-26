<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\BaseController;
use App\Services\Cart\GetCartInfoService;
use Illuminate\Http\Request;

class GetCartInfoController extends BaseController
{

    protected GetCartInfoService $service;

    /**
     * @param GetCartInfoService $service
     */
    public function __construct(GetCartInfoService $service)
    {
        $this->service = $service;
    }


    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
            $listCartItem = $this->service->execute();
            return $this->sendSuccess($listCartItem, "OK");
        } catch (\Exception $e) {
            return $this->sendError([], $e->getMessage());
        }
    }
}
