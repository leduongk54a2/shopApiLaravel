<?php

namespace App\Repositories;

use App\Models\CartItem;

class CartItemRepository extends BaseRepository
{


    public function model(): string
    {
        // TODO: Implement model() method
        return CartItem::class;
    }
}