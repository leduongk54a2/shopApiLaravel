<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\BaseController;
use App\Services\Category\GetAllInfoCategoryService;
use Illuminate\Http\Request;

class GetAllInfoCategoryController extends BaseController
{

    protected GetAllInfoCategoryService $service;

    /**
     * @param GetAllInfoCategoryService $service
     */
    public function __construct(GetAllInfoCategoryService $service)
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
