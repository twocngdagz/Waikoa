<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar;

class WaikoaRegistrar implements Registrar {

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'telephone' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'job_title' => $data['job_title'],
            'company_name' => $data['company_name'],
            'company_url' => $data['company_url'],
            'is_share_profile_student' => $data['is_share_profile_student'],
            'is_share_profile_public' => $data['is_share_profile_public'],
            'telephone' => $data['telephone'],
            'mobile_phone' => $data['mobile_phone'],
            'address' => $data['address'],
            'fax' => $data['fax'],
            'is_share_contact' => $data['is_share_contact'],
            'level' => $data['level']
        ]);
    }

}