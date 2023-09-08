<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Product\CreateProductRequest;
use App\Services\Product\CreateProductService;

class CreateProductController extends BaseController
{


    protected CreateProductService $service;

    /**
     * @param CreateProductService $service
     */
    public function __construct(CreateProductService $service)
    {
        $this->service = $service;
    }


    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateProductRequest $request)
    {
        try {
            $this->service->execute($request->all());
            return $this->sendSuccess();

        } catch (\Exception $e) {
            return $this->sendError([], $e->getMessage());
        }
    }
}
