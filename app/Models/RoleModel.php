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
 * 1. Model to hold role information
 * 2. Account Permission (role)
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

class RoleModel
{
    private $id;
    private $rolename;
    private $description;
    
    public function __construct($id, $rolename, $description)
    {
        $this->id = $id;
        $this->rolename = $rolename;
        $this->description = $description;
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return mixed
     */
    public function getRolename()
    {
        return $this->rolename;
    }
    
    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * @param mixed $rolename
     */
    public function setRolename($rolename)
    {
        $this->rolename = $rolename;
    }
    
    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}

?>