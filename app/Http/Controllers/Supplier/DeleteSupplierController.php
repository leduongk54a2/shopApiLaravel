<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\BaseController;
use App\Services\Supplier\DeleteSupplierService;
use Illuminate\Http\Request;

class DeleteSupplierController extends BaseController
{

    protected DeleteSupplierService $service;

    /**
     * @param DeleteSupplierService $service
     */
    public function __construct(DeleteSupplierService $service)
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

        $ids = $request->query('ids');
        $error = $this->service->execute(explode(",", $ids));
        if (strlen($error) > 0) {
            return $this->sendError([], $error);
        } else {
            return $this->sendSuccess();
        }
    }
}
