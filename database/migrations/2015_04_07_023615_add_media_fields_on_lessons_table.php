<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMediaFieldsOnLessonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		 Schema::table('lessons', function(Blueprint $table)
        {
			$table->string('file_name')->after('after_message');
			$table->string('path')->after('file_name'); // path: /course/{course_id}/            
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
            $table->dropColumn('file_name');
            $table->dropColumn('path');
        });
	}

}
