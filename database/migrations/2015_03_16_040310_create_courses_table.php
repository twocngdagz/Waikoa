<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
			$table->string('name')->default('90 Day Journey');
			$table->string('student_name', 100)->default('Classmate');
			$table->string('student_name_pl', 100)->default('Classmates');
			$table->string('instructor_name')->default('Coach');
			$table->string('materials_name', 100)->default('Daily Inspiration');
			$table->string('materials_name_pl', 100)->default('Daily Inspiration');
			$table->string('events_name', 100)->default('Live Seminar');
			$table->string('events_name_pl', 100)->default('Live Seminars');
			$table->string('webinars_name', 100)->default('Webinar');
			$table->string('webinars_name_pl', 100)->default('Webinars');
			$table->string('home_name', 100)->default('Course Home');
			$table->boolean('comments_allowed')->unsigned();
			$table->string('download_link')->nullable();
			$table->timestamp('class_start');
			$table->timestamp('class_end');
			$table->timestamp('access_start');
			$table->timestamp('access_end');
			$table->timestamp('register_start');
			$table->timestamp('register_end');
			$table->string('class_size_a')->nullable();
			$table->string('class_size_b')->nullable();
			$table->string('class_size_c')->nullable();			
			$table->boolean('always_on_pre')->unsigned()->default(0);
			$table->boolean('always_on_post')->unsigned()->default(1);
			$table->tinyInteger('date_visible_offset')->default(0);
			$table->tinyInteger('email_notif_offset')->default(0);
			$table->tinyInteger('course_material_schedule')->unsigned(); // Daily, Weekdays, Business Days, Other hardcoded dropDownBox
			$table->string('smtp_email');
			$table->string('smtp_name');
			$table->string('smtp_server');
			$table->string('smtp_user');
			$table->string('smtp_password');			
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
		Schema::drop('courses');
	}

}
