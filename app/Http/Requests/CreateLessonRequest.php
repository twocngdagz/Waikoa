<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
use Lang;

class CreateLessonRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		if (!empty(Auth::user()->id))
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
            'title' 			=> 'required|regex:/^[A-Za-z0-9\- ]+$/',
			'description' 		=> 'regex:/^[A-Za-z0-9\- ]+$/',
			'type' 				=> 'integer',
			'date' 				=> 'date',
			'url'				=> 'active_url',
			'download_url' 		=> 'active_url',
			'start_time' 		=> 'date',
			'end_time' 			=> 'date',
			'date_visible' 		=> 'date',
			'email_on' 			=> 'date',
			'comments_allowed' 	=> 'integer', 					
			'course_id' 		=> 'required|integer',
        ];
	}
	
	public function messages()
    {
        return [
            'title.required' => Lang::get('lesson.error_title_required'),            						
			'type.integer' => Lang::get('lesson.error_instructor_name_alpha'),
			'date.date' => Lang::get('lesson.error_materials_name_alpha_num'),
			'url.active_url' => Lang::get('lesson.error_materials_name_pl_alpha_num'),
			'download_url.active_url' => Lang::get('lesson.error_events_name_alpha_num'),
			'start_time.date' => Lang::get('lesson.error_name_events_name_pl_alpha_num'),
			'end_time.date' => Lang::get('lesson.error_webinars_name_alpha_num'),
			'date_visible.date' => Lang::get('lesson.error_webinars_name_pl_alpha_num'),
			'email_on.date' => Lang::get('lesson.error_home_name_required'),
			'comments_allowed.integer' => Lang::get('lesson.error_home_name_required'),
			'course_id.required'=> Lang::get('lesson.error_user_id_required'),
			'course_id.integer'=> Lang::get('lesson.error_user_id_integer'),
        ];
    }
	
	public function forbiddenResponse()
    {
        return Response::make('Unauthorized Access!',403);
    }

}
