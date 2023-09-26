<?php

namespace App\Repositories;

use App\Models\Cart;

class CartRepository extends BaseRepository
{
    public function model(): string
    {
        // TODO: Implement model() method.
        return Cart::class;
    }


}