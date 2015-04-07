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

	// Lesson Table
	'title' 			=> 'Title',
	'description' 		=> 'Description',
	'content' 			=> 'Content',
	'before_message' 	=> 'Before Message',
	'during_message' 	=> 'During Message',
	'after_message' 	=> 'After Message',
	'type' 				=> 'Lesson Type',
	'date' 				=> 'Lesson Date',
	'url'				=> 'URL',
	'download_url' 		=> 'Download URL',
	'start_time' 		=> 'Start Time',
	'end_time' 			=> 'End Time',
	'date_visible' 		=> 'Date Visible',
	'email_on' 			=> 'Email On',
	'comments_allowed' 	=> 'Comments Allowed',
	'course_id' 		=> 'Course ID',
	'file' 				=> 'Mp3 File',
	'file_name' 		=> 'Mp3 Name',
		
	// Error Messages
	'error_title_required'=>'Title must not be blank.',            						
	'error_type_integer'=>'Lesson Type must have an integer value.',
	'error_date_date'=>'Lesson Date must be a valid date.',
	'error_url_url'=>'URL must be a valid URL. (start with http://)',
	'error_download_url_url'=>'Download URL must be a valid URL. (start with http://)',
	'error_start_time_date'=>'Start Time must be a valid date.',
	'error_end_time_date'=>'End Time must be a valid date.',
	'error_date_visible_date'=>'Date Visible must be a valid date.',
	'error_email_on_date'=>'Email On must be a valid date.',
	'error_comments_allowed_integer'=>'Comments Allowed must have an integer value.',
	'error_course_id_required'=>'Course ID must not be blank.',
	'error_course_id_integer'=>'Course ID must have an integer value.',
	'error_file_name_mimes'=>'File extension must be an audio file mpeg/mp3',
	

];
