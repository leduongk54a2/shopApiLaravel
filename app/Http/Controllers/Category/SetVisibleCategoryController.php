<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\BaseController;
use App\Services\Category\SetVisibleCategoryService;
use Illuminate\Http\Request;

class SetVisibleCategoryController extends BaseController
{

    protected SetVisibleCategoryService $service;

    /**
     * @param SetVisibleCategoryService $service
     */
    public function __construct(SetVisibleCategoryService $service)
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
