<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\BaseController;
use App\Services\Supplier\GetInfoSupplierService;
use Illuminate\Http\Request;

class GetInfoSupplierController extends BaseController
{

    protected GetInfoSupplierService $service;

    /**
     * @param GetInfoSupplierService $service
     */
    public function __construct(GetInfoSupplierService $service)
    {
        $this->service = $service;
    }


    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        try {
            $infoCategory = $this->service->execute($id);
            return $this->sendSuccess($infoCategory);
        } catch (\Exception $e) {
            return $this->sendError([], $e->getMessage());
        }
    }
}
