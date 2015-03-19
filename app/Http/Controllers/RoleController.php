<?php namespace App\Http\Controllers;


use App\Waikoa\Model\Role;
use Request;

class RoleController extends Controller {

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
        $this->middleware('superadmin');

    }

    /**
     * Show the application user screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('role.show')->with('roles', $roles);
    }

    /**
     * Show the application user screen to the user.
     *
     * @return Response
     */
    public function edit($id)
    {

        $role = Role::findOrFail($id);

        return view('role.edit')->with('role', $role);
    }

    public function save()
    {
        $data = Request::all();
        $role = new Role;
        $role->name = $data['name'];
        $role->save();
        return redirect('roles');
    }


    public function update() {
        $data = Request::all();
        $role = Role::findOrFail($data['role_id']);
        $role->name = $data['name'];
        $role->save();
        return redirect('roles');
    }

}