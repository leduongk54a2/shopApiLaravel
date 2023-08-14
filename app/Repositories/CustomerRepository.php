<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository extends BaseRepository
{

    public function model(): string
    {
        return Customer::class;
    }
}