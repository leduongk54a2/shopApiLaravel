<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey  = 'orderId';
    protected $fillable = [
        "shippedDate",
        "status",
        "customerInfo",
        "total",
        "comment",
        "address",
        "userId",
    ];
    protected $hidden = [
        'updated_at',
    ];
    protected $casts = [
        'orderId' => 'integer', // Adjust the data type accordingly
    ];

    /**
     * Get the phone associated with the user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "userId", "userID");
    }


}
