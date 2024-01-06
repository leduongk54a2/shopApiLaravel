<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Services\Product\UpdateProductInfoService;
use Illuminate\Http\Request;

class UpdateInfoProductController extends BaseController
{
    protected UpdateProductInfoService $service;

    /**
     * @param UpdateProductInfoService $service
     */
    public function __construct(UpdateProductInfoService $service)
    {
        $this->service = $service;
    }



    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateProductRequest $request, $id)
    {
        try {

            $this->service->execute($id, $request->all());
            return $this->sendSuccess();

        } catch (\Exception $e) {
            return $this->sendError([], $e->getMessage());
        }
    }

}
