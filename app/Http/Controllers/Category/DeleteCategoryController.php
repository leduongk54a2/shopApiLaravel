<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\BaseController;
use App\Services\Category\DeleteCategoryService;
use Illuminate\Http\Request;

class DeleteCategoryController extends BaseController
{

    protected DeleteCategoryService $service;

    /**
     * @param DeleteCategoryService $service
     */
    public function __construct(DeleteCategoryService $service)
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
