<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Table Fields Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines are used by the column labels for forms.
	| You are free to change them to anything you want to customize your views to 
	| better match your application.
	|
	*/

	// Course Table
	'id' => 'ID', 
	'user_id' => 'User ID', 
	'updated_by' => 'Updated By', 
	'deleted_by' => 'Deleted By', 
	'updated_at' => 'Updated At', 
	'deleted_at' => 'Deleted At',
	'name' => 'Course Name', 
	'student_name' => 'Student Name',
	'student_name_pl' => 'Student Name (Plural)', 
	'instructor_name' => 'Instructor Name', 
	'materials_name' => 'Materials Name', 
	'materials_name_pl' => 'Materials Name (Plural)',
	'events_name' => 'Events Name', 
	'events_name_pl' => 'Events Name (Plural)', 
	'webinars_name' => 'Webinars Name', 
	'webinars_name_pl' => 'Webinars Name (Plural)', 
	'home_name' => 'Home Name', 
	'comments_allowed' => 'Comments Allowed', 
	'download_link' => 'Download Link', 
	'class_start' => 'Class Start', 
	'class_end' => 'Class End', 
	'access_start' => 'Access Start', 
	'access_end' => 'Access End', 
	'register_start' => 'Register Start', 
	'register_end' => 'Register End', 
	'class_size_a' => 'Class Size Level 1', 
	'class_size_b' => 'Class Size Level 2',
	'class_size_c' => 'Class Size Level 3', 
	'course_material_schedule' => 'Course Material Schedule', 
	'always_on_pre' => 'Always On Pre', 
	'always_on_post' => 'Always On Post', 
	'date_visible_offset' => 'Date Visible Offset', 
	'email_notif_offset' => 'Date Notification Offset',
	'smtp_email' => 'SMTP Email', 
	'smtp_name' => 'SMTP Name', 
	'smtp_server' => 'SMTP Server', 
	'smtp_user' => 'SMTP User', 
	'smtp_password' => 'SMTP Password',	
	
	// Error Messages
	'course.error_name_required'=> 'Name must not be blank.',
	'course.error_name_alpha'=> 'Name must be entirely alphabetic characters.',
	'course.error_student_name_alpha_num'=> 'Student Name must be entirely alpha-numeric characters.',
	'course.error_student_name_pl_alpha_num'=> 'Student Name Plural must be entirely alpha-numeric characters.',
	'course.error_instructor_name_alpha_num'=> 'Instructor Name must be entirely alpha-numeric characters.',
	'course.error_materials_name_alpha_num'=> 'Materials Name must be entirely alpha-numeric characters.',
	'course.error_materials_name_pl_alpha_num'=> 'Materials Name Plural must be entirely alpha-numeric characters.',
	'course.error_events_name_alpha_num'=> 'Event\'s Name must be entirely alpha-numeric characters.',
	'course.error_name_events_name_pl_alpha_num'=> 'Event\'s Name Plural must be entirely alpha-numeric characters.',
	'course.error_webinars_name_alpha_num'=> 'Webinar\'s Name must be entirely alpha-numeric characters.',
	'course.error_webinars_name_pl_alpha_num'=> 'Webinar\'s Name Plural must be entirely alpha-numeric characters.',
	'course.error_home_name_required'=> 'Home Name must not be blank.',
	'course.error_home_name_alpha'=> 'Home Name must be entirely alphabetic characters.',
	'course.error_download_link_active_url'=> 'Download Link must be a valid URL.',
	'course.error_class_start_date'=> 'Class Start must be a valid date.',
	'course.error_class_end_date'=> 'Class End must be a valid date.',
	'course.error_access_start_date'=> 'Access Start must be a valid date.',
	'course.error_access_end_date'=> 'Access End must be a valid date.',
	'course.error_register_start_date'=> 'Register Start must be a valid date.',
	'course.error_register_end_date'=> 'Register End must be a valid date.',
	'course.error_class_size_a_integer'=> 'Class Size A must have an integer value.',
	'course.error_class_size_b_integer'=> 'Class Size B must have an integer value.',
	'course.error_class_size_c_integer'=> 'Class Size C must have an integer value.',
	'course.error_course_material_schedule_integer'=> 'Course Material Schedule must have an integer value.',
	'course.error_comments_allowed_boolean'=> 'Comments Allowed must be a boolean value.',
	'course.error_always_on_pre_boolean'=> 'Always On Pre must be a boolean value.',
	'course.error_always_on_post_boolean'=> 'Always On Post must be a boolean value.',
	'course.error_date_visible_offset_integer'=> 'Date Visible Offset must have an integer value.',
	'course.error_name_email_notif_offset_integer'=> 'Email Notif Offset must have an integer value.',
	'course.error_smtp_email_email'=> 'Email must be formatted as an e-mail address.',
	'course.error_smtp_name_alpha_dash'=> 'SMTP Name must be alphabetic characters, dashes or underscores.',
	'course.error_smtp_server_ip'=> 'aaa',
	'course.error_smtp_user_alpha_dash'=> 'SMTP User must be alphabetic characters, dashes or underscores.',
	'course.error_smtp_password_alpha_dash'=> 'SMTP User must be alphabetic characters, dashes or underscores.',
	'course.error_user_id_required'=> 'User ID must not be blank.',
	'course.error_user_id_integer'=> 'User ID must have an integer value.',

];
