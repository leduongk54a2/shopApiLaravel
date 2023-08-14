<?php

namespace App\Const;


if (!defined("APP_ROLE")) {
    define("APP_ROLE", [
        'ADMIN' => "admin",
        'EMPLOYEE' => "employee",
        'CUSTOMER' => "customer",
    ]);
}