<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\BaseController;
use App\Services\Category\EditCategoryInfoService;
use Illuminate\Http\Request;

class EditCategoryInfoController extends BaseController
{

    protected EditCategoryInfoService $service;

    /**
     * @param EditCategoryInfoService $service
     */
    public function __construct(EditCategoryInfoService $service)
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
