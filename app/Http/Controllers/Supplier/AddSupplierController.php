<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Supplier\AddSupplierRequest;
use App\Services\Supplier\AddSupplierService;

class AddSupplierController extends BaseController
{

    protected  AddSupplierService $service;

    /**
     * @param AddSupplierService $service
     */
    public function __construct(AddSupplierService $service)
    {
        $this->service = $service;
    }


    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(AddSupplierRequest $request)
    {
        try {
            $this->service->execute($request->all());
            return $this->sendSuccess();
        } catch (\Exception $e) {
            return $this->sendError([], $e->getMessage());
        }
    }
}
