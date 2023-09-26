<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\BaseController;
use App\Services\Cart\AddCartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddCartController extends BaseController
{

    protected AddCartService $service;

    /**
     * @param AddCartService $service
     */
    public function __construct(AddCartService $service)
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
            $this->sendSuccess();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
