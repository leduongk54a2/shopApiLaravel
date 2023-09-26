<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{

    use HasFactory;

    protected $table = 'carts';
    protected $primaryKey = 'cartId';
    protected $fillable = [
        'cartId',
        "userId",
        "total",
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get the phone associated with the user.
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, "userId", "userID");
    }

    /**
     * Get the phone associated with the user.
     */
    public function CartItem(): HasMany
    {
        return $this->hasMany(CartItem::class, "cartId", "cartId");
    }
}
