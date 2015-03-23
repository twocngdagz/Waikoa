<?php namespace App\Handlers\Commands;

use App\Commands\UserRedirectFromPaypalPaymentCommand;

use App\Events\UserHasReturnToWebsite;
use Illuminate\Queue\InteractsWithQueue;
use Event;
class UserRedirectFromPaypalPaymentCommandHandler {

	/**
	 * Create the command handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the command.
	 *
	 * @param  UserRedirectFromPaypalPaymentCommand  $command
	 * @return void
	 */
	public function handle(UserRedirectFromPaypalPaymentCommand $command)
	{
        Event::fire(new UserHasReturnToWebsite());
        return redirect()->intended('/home');
	}

}
