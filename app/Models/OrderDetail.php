<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;


    protected $table = 'OrderDetails';
    protected $primaryKey = ['orderId', 'productId'];
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function order()
    {
        return $this->belongsTo(Order::class, "orderId", "orderId");
    }

    public function product()
    {
        return $this->belongsTo(Product::class, "productId", "productId");
    }
}
