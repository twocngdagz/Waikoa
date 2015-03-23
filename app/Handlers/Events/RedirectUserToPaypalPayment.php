<?php namespace App\Handlers\Events;

use App\Events\UserHasRegistered;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Omnipay\Omnipay;
use Request;
use Session;
class RedirectUserToPaypalPayment {

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
	 * @param  UserHasRegistered  $event
	 * @return void
	 */
	public function handle()
	{
        $params = array(
            'cancelUrl' => url('auth/register'),
            'returnUrl' => url('/success'),
            'name'	=> 'John Doe',
            'description' => 'Group 1',
            'amount' => 500.00,
            'currency' => 'USD',
            'data' =>Request::all()
        );

        Session::put('params', $params);
        Session::save();

        $gateway = Omnipay::create(env('GATEWAY'));
        $gateway->setUsername(env('GATEWAY_USERNAME'));
        $gateway->setPassword(env('GATEWAY_PASSWORD'));
        $gateway->setSignature(env('GATEWAY_SIGNATURE'));
        $gateway->setTestMode(env('GATEWAY_TESTMODE'));
        $response = $gateway->purchase($params)->send();

        if ($response->isSuccessful())
        {

        } elseif ($response->isRedirect())
        {
            return $response->redirect();
        } else {
            return $response->getMessage();
        }
	}

}
