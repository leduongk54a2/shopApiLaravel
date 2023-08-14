<?php

namespace App\Repositories;

use App\Models\Employee;

class EmployeeRepository extends BaseRepository
{

    public function model(): string
    {
        return Employee::class;
    }
}