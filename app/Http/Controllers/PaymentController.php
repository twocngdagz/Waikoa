<?php namespace App\Http\Controllers;


use App\Commands\UserRedirectFromPaypalPaymentCommand;
use App\Commands\UserRegisterCommand;
use App\Http\Requests\CreateUserRequest;
use App\User;
use Request;
use Auth;

use Session;

class PaymentController extends Controller {

    public function pay(CreateUserRequest $request)
    {
        return $this->dispatch(new UserRegisterCommand(Request::all()));

    }

    public function successPayment()
    {
        return $this->dispatch(new UserRedirectFromPaypalPaymentCommand());

    }

}