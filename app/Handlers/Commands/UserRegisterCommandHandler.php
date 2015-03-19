<?php namespace App\Handlers\Commands;

use App\Commands\UserRegisterCommand;

use Illuminate\Queue\InteractsWithQueue;
use App\User;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Event;
use App\Events\UserHasRegistered;

class UserRegisterCommandHandler {

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */

    protected $auth;

	public function __construct()
	{

	}

	/**
	 * Handle the command.
	 *
	 * @param  UserRegisterCommand  $command
	 * @return void
	 */
	public function handle(UserRegisterCommand $command)
	{
		Event::fire(new UserHasRegistered($command));
	}

}
