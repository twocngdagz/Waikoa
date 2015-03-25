<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword, SoftDeletes;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	
	/**
	 * Used for soft/pseudo Deleting a user model.
	 *
	 * @var string/timestamp
	 */
    protected $dates = ['deleted_at'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
        'name',
        'email',
        'password',
        'job_title',
        'company_name',
        'company_url',
        'is_share_profile_student',
        'is_share_profile_public',
        'telephone',
        'mobile_phone',
        'address',
        'fax',
        'is_share_contact',
        'level',
    ];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany('App\Waikoa\Model\Role\Role')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany('App\Waikoa\Model\MessageBoard\Comment');
    }


    /**
     * Does the user have a particular role?
     *
     * @param $name
     * @return bool
     */
    public function hasRole($name)
    {
        foreach ($this->roles as $role)
        {
            if ($role->name == $name) return true;
        }
        return false;
    }


    /**
     * Assign a role to the user
     *
     * @param $role
     * @return mixed
     */
    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }


    /**
     * Remove a role from a user
     *
     * @param $role
     * @return mixed
     */
    public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }

    public function isAdmin()
    {
        return $this->hasRole('Admin');
    }

    public function isSuperadmin()
    {
        return $this->hasRole('Superadmin');
    }

}
