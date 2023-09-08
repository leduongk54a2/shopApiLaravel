<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'Category';
    protected $primaryKey = 'categoryId';

    protected $fillable = [
        'categoryName',
        "textDescription",
        "visible",
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get the phone associated with the user.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, "categoryId", "categoryId");
    }


}
