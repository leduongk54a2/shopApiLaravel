<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Category\AddCategoryRequest;
use App\Services\Category\AddCategoryService;

class AddCategoryController extends BaseController
{

    protected AddCategoryService $service;

    /**
     * @param AddCategoryService $service
     */
    public function __construct(AddCategoryService $service)
    {
        $this->service = $service;
    }


    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(AddCategoryRequest $request)
    {
        try {
            $this->service->execute($request->all());
            return $this->sendSuccess();
        } catch (\Exception $e) {
            return $this->sendError([], $e->getMessage());
        }
    }
}
