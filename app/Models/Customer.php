<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $table = 'Customers';
    protected $primaryKey = 'customerId';
    protected $fillable = [
        'customerId',
        "birth",
        "user_id",
        "credit_card_number"
    ];


    /**
     * Get the phone associated with the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
