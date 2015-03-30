<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lessons', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('course_id')->unsigned()->nullable();
            $table->foreign('course_id')->references('id')->on('courses');
			$table->string('title');
			$table->text('description');
			$table->tinyInteger('type'); // lesson-1, webinar-2 or event-3
			$table->timestamp('date');
			$table->text('content');
			$table->string('url'); // content links, videos, mp3
			$table->string('download_url');
			$table->timestamp('start_time');
			$table->timestamp('end_time');
			$table->timestamp('date_visible');
			$table->timestamp('email_on');			
			$table->boolean('comments_allowed')->unsigned();
			$table->text('before_message');
			$table->text('during_message');
			$table->text('after_message');
			$table->integer('updated_by')->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('users');
			$table->integer('deleted_by')->unsigned()->nullable();
            $table->foreign('deleted_by')->references('id')->on('users');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lessons');
	}

}
