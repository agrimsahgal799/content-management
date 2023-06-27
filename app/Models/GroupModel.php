<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * model GroupModel
 * contain database functions for groups.
*/
class GroupModel extends Model
{
    protected $table = 'groups';

    public function getGroups()
    {
        return $this->findAll();
    }
}
