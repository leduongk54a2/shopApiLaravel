<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Supplier extends Model
{
    use HasFactory;


    protected $table = 'suppliers';
    protected $primaryKey = 'supplierId';

    protected $fillable = [
        "supplierId",
        "supplierName",
        "textDescription",
    ];


    protected $hidden = [
        'created_at',
        'updated_at',
    ];



}
