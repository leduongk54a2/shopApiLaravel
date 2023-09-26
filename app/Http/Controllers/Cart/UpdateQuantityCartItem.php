<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\BaseController;
use App\Services\Cart\UpdateQuantityCartItemService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateQuantityCartItem extends BaseController
{
    protected UpdateQuantityCartItemService $service;

    /**
     * @param UpdateQuantityCartItemService $service
     */
    public function __construct(UpdateQuantityCartItemService $service)
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
            DB::beginTransaction();
            $this->service->execute($request->all());
            DB::commit();
            return $this->sendSuccess();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError([], $e->getMessage());
        }
    }
}
