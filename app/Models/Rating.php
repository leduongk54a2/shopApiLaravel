<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;


    protected $table = 'Ratings';
    protected $fillable = [
        'customerId',
        'productId',
        'ratingPoint',
        'ratingPredict',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];



}
