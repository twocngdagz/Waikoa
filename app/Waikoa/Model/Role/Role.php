<?php namespace App\Waikoa\Model\Role;


use Illuminate\Database\Eloquent\Model;
class Role extends Model {
    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = ['name'];
    protected $dates = ['deleted_at'];
}