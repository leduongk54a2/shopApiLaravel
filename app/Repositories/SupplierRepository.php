<?php

namespace App\Repositories;

use App\Models\Supplier;

class SupplierRepository extends BaseRepository
{

    public function model(): string
    {
        return Supplier::class;
    }
}
