<?php namespace App\Http\Controllers;


use App\User;
use Request;
use Auth;
use App\Waikoa\Model\Role;

class UserController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | User Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the user management
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application user screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.show')->with('users', $users);
    }

   /**
    * Show the application user screen to the user.
    *
    * @return Response
    */
    public function edit($id)
    {

        $user = User::findOrFail($id);

        if ($user->hasRole('Superadmin')) {
            $roles =  Role::all();
        } else {
            $roles =  Role::all()->forget(0);
        }
        return view('user.edit', compact('user', 'roles'));
    }


    public function update() {
        $data = Request::all();
        $user = User::findOrFail($data['user_id']);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();
        return redirect('users');
    }

    public function getProfile()
    {
        $user = Auth::user();
        return view('user.profile')->with('user', $user);
    }

    public function saveProfile()
    {
        $user_id = Request::get('user_id');
        $user = User::findOrFail($user_id);
        $user->name = Request::get('name');
        $user->email = Request::get('email');
        $user->job_title = Request::get('job_title');
        $user->company_name = Request::get('company_name');
        $user->company_url = Request::get('company_url');
        $user->is_share_profile_student = Request::get('is_share_profile_student');
        $user->is_share_profile_public = Request::get('is_share_profile_public');
        $user->telephone = Request::get('telephone');
        $user->mobile_phone = Request::get('mobile_phone');
        $user->address = Request::get('address');
        $user->fax = Request::get('fax');
        $user->is_share_contact = Request::get('is_share_contact');
        $user->save();
        return view('user.profile')->with('success', true)->with('user', $user);

    }

}