<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\BaseController;
use App\Services\Cart\AddCartService;
use App\Services\Cart\GetCartInfoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddCartController extends BaseController
{

    protected AddCartService $addCartService;
    protected GetCartInfoService $getCartInfoService;

    /**
     * @param AddCartService $addCartService
     * @param GetCartInfoService $getCartInfoService
     */
    public function __construct(AddCartService $addCartService, GetCartInfoService $getCartInfoService)
    {
        $this->addCartService = $addCartService;
        $this->getCartInfoService = $getCartInfoService;
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
            $this->addCartService->execute($request->all());
            $listCartItemResponse = $this->getCartInfoService->execute();
            return $this->sendSuccess($listCartItemResponse);
        } catch (\Exception $e) {
            return  $this->sendError([],$e->getMessage());
        }
    }
}
