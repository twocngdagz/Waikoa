<?php namespace App\Http\Controllers;


use App\User;
use Request;

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

        return view('user.edit')->with('user', $user);
    }


    public function update() {
        $data = Request::all();
        $user = User::findOrFail($data['user_id']);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();
        return redirect('users');
    }

}