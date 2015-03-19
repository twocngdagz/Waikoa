<?php namespace App\Commands;

use App\Commands\Command;

class UserRegisterCommand extends Command {

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */

    public $data;
	public function __construct($data)
	{
		$this->data = $data;
	}

}
