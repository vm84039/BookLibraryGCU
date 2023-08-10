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
 * 1. DAO - Users (Members)
 * 2. Various Users CRUD
 * 3.
 * ---------------------------------------------------------------
 * Revision History:
 * Name            Date       Description
 * --------------- ---------- ------------------------------------
 * Kelly           2022-04-09 Initial Creation
 * Kelly           2022-05-01 Add UserEmailAvailable
 *
 * ---------------------------------------------------------------
 */

namespace App\Services\Data;

use Illuminate\Support\Facades\DB;
use App\Models\UserModel;


class UserDAO
{
    public function __construct()
    {}

    // -------------------------------------------------------------------
    // Create Functionality Methods
    // -------------------------------------------------------------------

    public function createUser($userModel)
    {
        // Parameter - user model

        $firstName = $userModel->getFirstName();
        $lastName  = $userModel->getLastName();
        $email     = $userModel->getEmail();
        $mobile     = $userModel->getMobile();
        $password  = $userModel->getPassword();
        $roleId   = $userModel->getRoleId();

        $sql = 'INSERT INTO users (FIRSTNAME, LASTNAME, EMAIL, MOBILE, PASSWORD, ROLE_ID) ' .
               'VALUES (?,?,?,?,?,?)';
        DB::insert($sql, [$firstName, $lastName, $email, $mobile, $password, $roleId]);

        // Get the id for the user just created
        $user_id = DB::getPdo()->lastInsertId();

        $userModel->setId($user_id);

        return $userModel;
    }

    // -------------------------------------------------------------------
    // Retrieve Functionality Methods
    // -------------------------------------------------------------------

    // Determine validity of user email - for registration - restrict email to one account only
    public function UserEmailAvailable($email): bool
    {
        $exists = DB::select('SELECT COUNT(1) AS AMOUNT FROM users WHERE EMAIL = ? ', [$email]);

        return ($exists[0]->AMOUNT == 0);
    }

    // Determine validity of user id - does a user exist for the id
    public function UserIDExists($user_id): bool
    {
        $exists = DB::select('SELECT COUNT(1) AS AMOUNT FROM users WHERE ID = ? ', [$user_id]);

        return ($exists[0]->AMOUNT > 0);
    }

    public function getUserByEmail($email)
    {
        $rows = DB::select('SELECT * FROM users WHERE EMAIL = ?', [$email]);

        $user = new UserModel($rows[0]->ID,
                              $rows[0]->FIRSTNAME,
                              $rows[0]->LASTNAME,
                              $rows[0]->EMAIL,
                              $rows[0]->MOBILE,
                              $rows[0]->PASSWORD,
                              $rows[0]->ROLE_ID);

        return $user;
    }

    public function getUser($user_id): UserModel
    {
        $rows = DB::table('users')
                    ->where ('ID', '=', $user_id)->get();
        $row = $rows->first();
        $user = new UserModel($row->ID,
                              $row->FIRSTNAME,
                              $row->LASTNAME,
                              $row->EMAIL,
                              $row->MOBILE,
                              $row->PASSWORD,
                              $row->ROLE_ID);

        return $user;
    }

    public function getAllUsers(): array
    {
        $users = array();
        $index = 0;

        $rows = DB::select('SELECT * FROM users ORDER BY FIRSTNAME ASC');

        foreach ($rows as $row)
        {
            $user = new UserModel($row->ID,
                                  $row->FIRSTNAME,
                                  $row->LASTNAME,
	                              $row->USERNAME,
                                  $row->EMAIL,
                                  $row->PASSWORD,
                                  $row->ROLE_ID);
            $users[$index] = $user;
            ++$index;
        }

        return $users;
    }

    // -------------------------------------------------------------------
    // Update Functionality Methods
    // -------------------------------------------------------------------

    public function updateUser($userModel): bool
    {
        $user_id   = $userModel->getId();
        $firstName = $userModel->getFirstName();
        $lastName  = $userModel->getLastName();
        $userName  = $userModel->getLastName();
        $email     = $userModel->getEmail();
        $password  = $userModel->getPassword();
        $roleId    = $userModel->getRoleId();

        $sql = 'UPDATE users SET FIRSTNAME = ?, LASTNAME = ?, USERNAME = ?, EMAIL = ?, PASSWORD = ?, ROLE_ID = ? WHERE ID = ?';
        $data = [$firstName, $lastName, $userName, $email, $password, $roleId, $user_id];
        $count = DB::update($sql, $data);

        return ($count > 0);
    }

    // -------------------------------------------------------------------
    // Delete Functionality Methods
    // -------------------------------------------------------------------

    public function deleteUser($user_id): int
    {
		// TO DO: update books - set any book with checkout_user_id = null, along with other fields relating to check out info.
		//    OR: do not allow delete if books are assigned as checked out for the user.


        $result = DB::delete('DELETE FROM users WHERE ID = ?', [$user_id]);
        return $result;
    }

}

?>
