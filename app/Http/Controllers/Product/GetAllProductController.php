<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\BaseController;
use App\Services\Product\GetAllProductService;
use Illuminate\Http\Request;

class GetAllProductController extends BaseController
{

    protected GetAllProductService $service;

    /**
     * @param GetAllProductService $service
     */
    public function __construct(GetAllProductService $service)
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

        $categoryId = $request->query('categoryId');
        $supplierId = $request->query('supplierId');
        $sortTypePrice = $request->query('sortTypePrice');
        $keyword = $request->query('keyword');
        try {
            return $this->sendSuccess($this->service->execute($categoryId,$supplierId, $sortTypePrice, $keyword));
        } catch (\Exception $e) {
            return $this->sendError([], $e->getMessage());
        }
    }
}
