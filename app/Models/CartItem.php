<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;


    protected $table = 'cart_items';
    protected $fillable = [
        'cartId',
        'productId',
        'quantity',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function cart()
    {
        return $this->belongsTo(Cart::class, "cartId", "cartId");
    }

    public function product()
    {
        return $this->belongsTo(Product::class, "productId", "productId");
    }
}
