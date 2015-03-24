<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Lang;

class CreateCourseRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'name' => 'required|alpha',
			'student_name' => 'alpha_num',
			'student_name_pl' => 'alpha_num',
			'instructor_name' => 'alpha_num',
			'materials_name' => 'alpha_num',
			'materials_name_pl' => 'alpha_num',
			'events_name' => 'alpha_num',
			'events_name_pl' => 'alpha_num',
			'webinars_name' => 'alpha_num',
			'webinars_name_pl' => 'alpha_num',
			'home_name' => 'required|alpha', 		
			'download_link' => 'active_url',
			'class_start' => 'date',
			'class_end' => 'date',
			'access_start' => 'date',
			'access_end' => 'date',
			'register_start' => 'date',
			'register_end' => 'date',
			'class_size_a' => 'integer',
			'class_size_b' => 'integer',
			'class_size_c' => 'integer',
			'course_material_schedule' => 'integer',
			'comments_allowed' => 'boolean',
			'always_on_pre' => 'boolean',
			'always_on_post' => 'boolean',
			'date_visible_offset' => 'integer',
			'email_notif_offset' => 'integer',
			'smtp_email' => 'email',
			'smtp_name' => 'alpha_dash',
			'smtp_server' => 'ip',
			'smtp_user' => 'alpha_dash',
			'smtp_password' => 'alpha_dash',
			'user_id'=>'required|integer'
        ];
	}

    public function messages()
    {
        return [
            'name.required' => Lang::get('course.error_name_required'),
            'name.alpha' => Lang::get('course.error_name_alpha'),
			'student_name.alpha_num' => Lang::get('course.error_student_name_alpha_num'),
			'student_name_pl.alpha_num' => Lang::get('course.error_student_name_pl_alpha_num'),
			'instructor_name.alpha_num' => Lang::get('course.error_instructor_name_alpha_num'),
			'materials_name.alpha_num' => Lang::get('course.error_materials_name_alpha_num'),
			'materials_name_pl.alpha_num' => Lang::get('course.error_materials_name_pl_alpha_num'),
			'events_name.alpha_num' => Lang::get('course.error_events_name_alpha_num'),
			'events_name_pl.alpha_num' => Lang::get('course.error_name_events_name_pl_alpha_num'),
			'webinars_name.alpha_num' => Lang::get('course.error_webinars_name_alpha_num'),
			'webinars_name_pl.alpha_num' => Lang::get('course.error_webinars_name_pl_alpha_num'),
			'home_name.required' => Lang::get('course.error_home_name_required'),
			'home_name.alpha' => Lang::get('course.error_home_name_alpha'),
			'download_link.active_url' => Lang::get('course.error_download_link_active_url'),
			'class_start.date' => Lang::get('course.error_class_start_date'),
			'class_end.date' => Lang::get('course.error_class_end_date'),
			'access_start.date' => Lang::get('course.error_access_start_date'),
			'access_end.date' => Lang::get('course.error_access_end_date'),
			'register_start.date' => Lang::get('course.error_register_start_date'),
			'register_end.date' => Lang::get('course.error_register_end_date'),
			'class_size_a.integer' => Lang::get('course.error_class_size_a_integer'),
			'class_size_b.integer' => Lang::get('course.error_class_size_b_integer'),
			'class_size_c.integer' => Lang::get('course.error_class_size_c_integer'),
			'course_material_schedule.integer' => Lang::get('course.error_course_material_schedule_integer'),
			'comments_allowed.boolean' => Lang::get('course.error_comments_allowed_boolean'),
			'always_on_pre.boolean' => Lang::get('course.error_always_on_pre_boolean'),
			'always_on_post.boolean' => Lang::get('course.error_always_on_post_boolean'),
			'date_visible_offset.integer' => Lang::get('course.error_date_visible_offset_integer'),
			'email_notif_offset.integer' => Lang::get('course.error_name_email_notif_offset_integer'),
			'smtp_email.email' => Lang::get('course.error_smtp_email_email'),
			'smtp_name.alpha_dash' => Lang::get('course.error_smtp_name_alpha_dash'),
			'smtp_server.ip' => Lang::get('course.error_smtp_server_ip'),
			'smtp_user.alpha_dash' => Lang::get('course.error_smtp_user_alpha_dash'),
			'smtp_password.alpha_dash' => Lang::get('course.error_smtp_password_alpha_dash'),
			'user_id.required'=> Lang::get('course.error_user_id_required'),
			'user_id.integer'=> Lang::get('course.error_user_id_integer'),
        ];

    }

}
