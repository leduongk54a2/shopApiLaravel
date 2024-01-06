<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\BaseController;
use App\Services\Supplier\EditSupplierInfoService;
use Illuminate\Http\Request;

class EditSupplierInfoController extends BaseController
{

    protected EditSupplierInfoService $service;

    /**
     * @param EditSupplierInfoService $service
     */
    public function __construct(EditSupplierInfoService $service)
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
            $this->service->execute($request->all(), $id);

            return $this->sendSuccess();
        } catch (\Exception $e) {
            return $this->sendError([], $e->getMessage());
        }
    }
}
