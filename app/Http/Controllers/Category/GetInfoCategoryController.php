<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\BaseController;
use App\Services\Category\GetInfoCategoryService;
use Illuminate\Http\Request;

class GetInfoCategoryController extends BaseController
{

    protected GetInfoCategoryService $service;

    /**
     * @param GetInfoCategoryService $service
     */
    public function __construct(GetInfoCategoryService $service)
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
