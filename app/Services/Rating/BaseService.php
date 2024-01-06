<?php

namespace App\Services\Rating;

use App\Repositories\CustomerRepository;
use App\Repositories\RatingRepository;

class BaseService
{
    protected RatingRepository $ratingRepository;
    protected  CustomerRepository $customerRepository;

    /**
     * @param RatingRepository $ratingRepository
     * @param CustomerRepository $customerRepository
     */
    public function __construct(RatingRepository $ratingRepository, CustomerRepository $customerRepository)
    {
        $this->ratingRepository = $ratingRepository;
        $this->customerRepository = $customerRepository;
    }


}
