<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'Products';
    protected $primaryKey = 'productId';

    protected $fillable = [
        "productName",
        "categoryId",
        "description",
        "discount",
        "quantity",
        "price",
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    /**
     * Get the phone associated with the user.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, "categoryId", "categoryId");
    }
}
