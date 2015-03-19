<?php namespace App\Handlers\Events;

use App\Events\UserRedirectFromPaypalPayment;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Auth;
use Session;
use App\User;
use Omnipay\Omnipay;
class RegisterAuthenticateUser {

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
	public function handle()
	{
        $gateway = Omnipay::create(env('GATEWAY'));
        $gateway->setUsername(env('GATEWAY_USERNAME'));
        $gateway->setPassword(env('GATEWAY_PASSWORD'));
        $gateway->setSignature(env('GATEWAY_SIGNATURE'));
        $gateway->setTestMode(env('GATEWAY_TESTMODE'));

        $params = Session::get('params');

        $response = $gateway->completePurchase($params)->send();


        if ($response->isSuccessful())
        {
            Auth::login(User::create($params['data']));
            Session::forget('params');
        }
	}

}
