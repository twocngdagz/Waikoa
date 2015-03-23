<?php namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\UserHasRegistered;
use App\Handlers\Events\RedirectUserToPaypalPayment;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'App\Events\UserHasRegistered' => [
                'App\Handlers\Events\RedirectUserToPaypalPayment',
            ],
        'App\Events\UserHasReturnToWebsite' => [
                'App\Handlers\Events\RegisterAuthenticateUser','App\Handlers\Events\SendEmailAfterUserRegistration'
            ]
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

		//
	}

}
