<?php

/*
 * ---------------------------------------------------------------
 * Name      : Group Assignment
 * Date      : 2022-04-09
 * Class     : CST-323 Cloud Computing
 * Professor : Bradley Mauger PhD
 * Assignment: Milestone
 * Disclaimer: This is my own work
 * ---------------------------------------------------------------
 * Description:
 * 1. DAO - Security
 * 2. Authenicate Login
 * 3.
 * ---------------------------------------------------------------
 * Revision History:
 * Name            Date       Description
 * --------------- ---------- ------------------------------------
 * Kelly           2022-04-09 Initial Creation
 *
 *
 * ---------------------------------------------------------------
 */

namespace App\Services\Data;

use Illuminate\Support\Facades\DB;

class SecurityDAO
{

    public function __construct()
    {}

    public function AuthenticateLogin($email, $password): bool
    {
        $exists = DB::select('SELECT COUNT(1) AS AMOUNT FROM users WHERE EMAIL = ? AND PASSWORD = ?', [$email, $password]);

        return ($exists[0]->AMOUNT > 0);
    }
}

