<?php

namespace App\Repositories;

use App\Models\OrderDetail;

class OrderDetailRepository extends BaseRepository
{

    public function model(): string
    {
        return OrderDetail::class;
    }
}
