<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $table = 'Employees';
    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'employee_id',
        "birth",
        "gender",
        "user_id",
        "salary"
    ];

    protected $hidden = [
        'role',
        'remember_token',
        'created_at',
        'updated_at',
    ];


    /**
     * Get the phone associated with the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, "user_id", 'userID');
    }
}
