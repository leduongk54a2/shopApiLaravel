<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\BaseController;
use App\Services\Supplier\GetAllInfoSupplierService;
use Illuminate\Http\Request;

class GetAllInfoSupplierController extends BaseController
{

    protected GetAllInfoSupplierService $service;

    /**
     * @param GetAllInfoSupplierService $service
     */
    public function __construct(GetAllInfoSupplierService $service)
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
            $listInfoCategory = $this->service->execute();
            return $this->sendSuccess($listInfoCategory);
        } catch (\Exception $e) {
            return $this->sendError([], $e->getMessage());
        }
    }
}
