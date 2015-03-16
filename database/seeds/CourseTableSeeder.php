<?php

use Illuminate\Database\Seeder;
use App\Course;

class CourseTableSeeder extends Seeder {

    public function run()
    {        
        DB::table('courses')->truncate();

        $course = Course::create([
			'user_id' => 'aaa',
			'instructor_name' => 'First Instructor Name',
			'comments_allowed' => 1,
			'class_start' => date('y-m-d h:i:s',time()),
			'class_end' => date('y-m-d h:i:s',time()),
			'access_start' => date('y-m-d h:i:s',time()),
			'access_end' => date('y-m-d h:i:s',time()),
			'register_start' => date('y-m-d h:i:s',time()),
			'register_end' => date('y-m-d h:i:s',time()),
			'course_material_schedule' => 1,
			'always_on_pre' => 0,
			'always_on_post' => 1,
			'date_visible_offset' => 0,
			'email_notif_offset' => 0,
			'smtp_email' => 'admin@waikoa.com',
			'smtp_name' => 'waikoa',
			'smtp_server' => '127.0.0.1',
			'smtp_user' => 'waikoa',
			'smtp_password'	 => 'waikoaPass',
            
        ]);  

		$course = Course::create([
			'user_id' => 'aaa',
			'instructor_name' => 'Second Instructor Name',
			'comments_allowed' => 1,
			'class_start' => date('y-m-d h:i:s',time()),
			'class_end' => date('y-m-d h:i:s',time()),
			'access_start' => date('y-m-d h:i:s',time()),
			'access_end' => date('y-m-d h:i:s',time()),
			'register_start' => date('y-m-d h:i:s',time()),
			'register_end' => date('y-m-d h:i:s',time()),
			'course_material_schedule' => 1,
			'always_on_pre' => 0,
			'always_on_post' => 1,
			'date_visible_offset' => 0,
			'email_notif_offset' => 0,
			'smtp_email' => 'admin2@waikoa.com',
			'smtp_name' => 'waikoa2',
			'smtp_server' => '127.0.0.1',
			'smtp_user' => 'waikoa2',
			'smtp_password'	 => 'waikoaPass2',
            
        ]);
    }

}