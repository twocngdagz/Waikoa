<?php namespace App\Waikoa\Model\Role;

use App\Waikoa\Model\Role\RoleRepository;
use App\Waikoa\Model\Role\Role;

class EloquentRoleRepository implements RoleRepository {

    public function getAll()
    {
        return Role::All();
    }

    public function find($id)
    {
        return Role::findOrFail($id);
    }

}