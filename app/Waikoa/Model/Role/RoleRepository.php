<?php namespace App\Waikoa\Model\Role;


interface RoleRepository {

    public function getAll();

    public function find($id);

}