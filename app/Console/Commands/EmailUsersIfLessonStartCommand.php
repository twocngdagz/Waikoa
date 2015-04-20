<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use App\Waikoa\Model\Lesson;

class EmailUsersIfLessonStartCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'emailsusersiflessonstartcommand';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'This will notify all users if the lesson they are enrolled has started';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        $lessons = Lesson::all();
        foreach ($lessons as $lesson)
        {
            $email_on = new Carbon($lesson->email_on);
            if ($email_on->between(Carbon::today(), Carbon::tomorrow()))
            {

            }
        }
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['example', InputArgument::REQUIRED, 'An example argument.'],
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
			['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
		];
	}

}
