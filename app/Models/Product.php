<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'productId';

    protected $fillable = [
        "productName",
        "categoryId",
        "supplierId",
        "description",
        "discount",
        "quantity",
        "price",
        "imgUrl",
        "display"
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
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the phone associated with the user.
     */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
