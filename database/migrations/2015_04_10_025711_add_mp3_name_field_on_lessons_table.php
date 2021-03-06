<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMp3NameFieldOnLessonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		 Schema::table('lessons', function(Blueprint $table)
        {			
			$table->string('mp3_name')->after('file_name');			
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lessons', function(Blueprint $table)
        {            
            $table->dropColumn('mp3_name');            
        });
	}

}
