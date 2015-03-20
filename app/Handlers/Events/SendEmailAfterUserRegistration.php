<?php namespace App\Handlers\Events;

use App\Events\UserRedirectFromPaypalPayment;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Session;

class SendEmailAfterUserRegistration implements ShouldBeQueued {

	use InteractsWithQueue;

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  UserRedirectFromPaypalPayment  $event
	 * @return void
	 */
	public function handle(UserRedirectFromPaypalPayment $event)
	{
        $params = Session::get('params');
        $data['name'] = $params['data']['name'];
        $data['email'] = $params['data']['email'];
        Mail::queue('emails.registration', $data, function($message) use ($data)
        {
            $message->to($data['email'], $data['name'])->subject(env('MAIL_SUBJECT'));
        });
	}

}
