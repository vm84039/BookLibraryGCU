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
 * 1. Model to hold user information
 * 2. Member Profile
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

namespace App\Models;

class UserModel
{
    private mixed $id;
    private mixed $firstName;
    private mixed $lastName;
    private mixed $email;
    private mixed $mobile;
    private mixed $password;
    private mixed $roleId;

    public function __construct($id, $firstName, $lastName, $email, $mobile, $password, $roleId)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->mobile = $mobile;
        $this->password = $password;
        $this->roleId = $roleId;
    }

    /**
     * @return mixed
     */
    public function getId(): mixed
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(mixed $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstName(): mixed
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName(mixed $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName(): mixed
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName(mixed $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail(): mixed
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail(mixed $email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getMobile(): mixed
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile(mixed $mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * @return mixed
     */
    public function getPassword(): mixed
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword(mixed $password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRoleId(): mixed
    {
        return $this->roleId;
    }

    /**
     * @param mixed $roleId
     */
    public function setRoleId(mixed $roleId): void
    {
        $this->roleId = $roleId;
    }


}

