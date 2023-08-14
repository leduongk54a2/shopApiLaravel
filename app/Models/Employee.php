<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $table = 'Employees';
    protected $primaryKey = 'employeeId';

    protected $fillable = [
        'employeeId',
        "birth",
        "gender",
        "user_id",
        "salary"
    ];


    /**
     * Get the phone associated with the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, "user_id", 'userID');
    }
}
