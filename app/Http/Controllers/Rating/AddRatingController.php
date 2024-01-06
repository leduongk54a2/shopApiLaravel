<?php

namespace App\Http\Controllers\Rating;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Services\Rating\AddRatingService;
use Illuminate\Http\Request;

class AddRatingController extends BaseController
{
    protected AddRatingService $service;

    /**
     * @param AddRatingService $service
     */
    public function __construct(AddRatingService $service)
    {
        $this->service = $service;
    }


    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
        $this->service->execute($request->all());
        return $this->sendSuccess();

        } catch (\Exception $e) {
            return $this->sendError([],$e->getMessage());
        }
    }
}
