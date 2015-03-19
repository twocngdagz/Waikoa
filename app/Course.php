<?php namespace App;

class Course extends BaseModel {

	/**
	 * States which field is NOT safe for mass assignment Input::all().
	 */	
	protected $guarded = ['id', 'user_id', 'updated_by', 'deleted_by', 'updated_at', 'deleted_at'];
	
	/**
	 * States which field is safe for mass assignment Input::all().
	 */	
	protected $fillable = ['name', 'student_name','student_name_pl', 'instructor_name', 'materials_name', 'materials_name_pl',
		'events_name', 'events_name_pl', 'webinars_name', 'webinars_name_pl', 'home_name', 'comments_allowed', 'download_link', 
		'class_start', 'class_end', 'access_start', 'access_end', 'register_start', 'register_end', 'class_size_a', 'class_size_b',
		'class_size_c', 'course_material_schedule', 'always_on_pre', 'always_on_post', 'date_visible_offset', 'email_notif_offset',
		'smtp_email', 'smtp_name', 'smtp_server', 'smtp_user', 'smtp_password',
	];
	
}
?>
