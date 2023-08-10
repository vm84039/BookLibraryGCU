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
 * 1. DAO - Roles (Permissions)
 * 2. Various Roles CRUD
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
use App\Models\RoleModel;

class RoleDAO
{

    public function __construct()
    {}

    // -------------------------------------------------------------------
    // Create Functionality Methods
    // -------------------------------------------------------------------

    public function createRole($roleModel)
    {
        $rolename = $roleModel->getRolename();
        $description = $roleModel->getDescription();

        DB::insert('INSERT INTO roles (ROLENAME, DESCRIPTION) VALUES (?, ?)', [$rolename, $description]);

        // Get the id for the user just created
        $role_id = DB::getPdo()->lastInsertId();

        $roleModel->setID($role_id);

        return $roleModel;
    }


    // -------------------------------------------------------------------
    // Retrieve Functionality Methods
    // -------------------------------------------------------------------

    public function getAllRoles()
    {
        $roles = array();
        $index = 0;

        $rows = DB::select('SELECT * FROM roles ORDER BY ID ASC');

        foreach ($rows as $row)
        {
            $role = new RoleModel($row->ID,
                                  $row->ROLENAME,
                                  $row->DESCRIPTION);
            $roles[$index] = $role;
            ++$index;
        }

        return $roles;
    }

    public function getRoleByID($role_id)
    {
        $row = DB::select('SELECT * FROM roles WHERE ID = ?', [$role_id]);

        $role = new RoleModel($row[0]->ID,
                              $row[0]->ROLENAME,
                              $row[0]->DESCRIPTION);

        return $role;
    }


    // -------------------------------------------------------------------
    // Update Functionality Methods
    // -------------------------------------------------------------------

    public function updateRole($roleModel)
    {
        $id = $roleModel->getId();
        $rolename = $roleModel->getRolename();
        $description = $roleModel->getDescription();

        $count = DB::update('UPDATE roles SET ROLENAME = ?, DESCRIPTION = ? WHERE ID = ?', [$rolename, $description, $id]);
        return $count;
    }

    // -------------------------------------------------------------------
    // Delete Functionality Methods
    // -------------------------------------------------------------------

    public function deleteRole($role_id)
    {
        $count = DB::delete('DELETE FROM roles WHERE ID = ?', [$role_id]);
        return $count;
    }

}

?>