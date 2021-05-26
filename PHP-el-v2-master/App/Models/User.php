<?php
namespace App\Models;

use Core\Database\QueryBuilder;

class User extends QueryBuilder
{
    public function __construct() { }

    public function getAllUsers($table)
    {
        // parent::__construct(APP['database']);
        // $this->selectAll('users');

        $db = new QueryBuilder(APP['database']);
        return $db->selectAll($table);
    }
}
