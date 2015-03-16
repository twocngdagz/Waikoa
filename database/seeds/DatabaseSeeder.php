<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
        DB::table('role_user')->truncate();
        $this->call('RoleTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('CourseTableSeeder');		

	}

}
