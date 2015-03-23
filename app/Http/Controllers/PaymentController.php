<?php namespace App\Http\Controllers;


use App\User;
use Request;
use Auth;
use Omnipay\Omnipay;
use Session;

class PaymentController extends Controller {

    public function pay()
    {
        $params = array(
            'cancelUrl' => url('auth/register'),
            'returnUrl' => url('/success'),
            'name'	=> 'John Doe',
            'description' => 'Group 1',
            'amount' => 500.00,
            'currency' => 'USD',
            'data' => Request::all()
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
            dd('SUCCESS');
        } elseif ($response->isRedirect())
        {
            $response->redirect();
        } else {
            echo $response->getMessage();
        }
    }

    public function successPayment()
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
            return redirect('home');
        }
    }

}