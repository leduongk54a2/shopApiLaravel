<?php

namespace App\Services\Rating;

use App\Models\Rating;

class GetPredictProductService extends BaseService
{
    public function execute($id)
    {
        $customer = $this->customerRepository->where("user_id", $id)->first();
        $result = Rating::where('customerId', $customer->customer_id)->get()->sortByDesc("ratingPredict")->pluck("productId")->toArray();
        return array_slice($result,0,3);
    }

}
