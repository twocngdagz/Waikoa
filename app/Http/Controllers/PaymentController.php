<?php namespace App\Http\Controllers;


use App\Commands\UserRedirectFromPaypalPaymentCommand;
use App\Commands\UserRegisterCommand;
use App\User;
use Request;
use Auth;

use Session;

class PaymentController extends Controller {

    public function pay()
    {
        return $this->dispatch(new UserRegisterCommand(Request::all()));

    }

    public function successPayment()
    {
        return $this->dispatch(new UserRedirectFromPaypalPaymentCommand());

    }

}