<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    const CREATED_AT = 'orderDate';
    protected $table = 'Orders';
    protected $primaryKey = 'orderId';
    protected $fillable = [
        'orderId',
        "shippedDate",
        "status",
        "customerInfo",
        "total",
        "comment",
        "address",
        "userId",
    ];
    protected $hidden = [
        'orderDate',
        'updated_at',
    ];


    /**
     * Get the phone associated with the user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "userId", "userID");
    }


}
