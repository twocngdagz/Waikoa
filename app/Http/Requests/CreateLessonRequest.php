<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
use Lang;

//@TODO:Adrian validation for time
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
            'title' 			=> 'required|regex:/^[A-Za-z0-9\.\,\- ]+$/',			
			'type' 				=> 'integer',
			'date' 				=> 'date',
			'url'				=> 'url',
			'download_url' 		=> 'url',
			// 'start_time' 		=> 'regex:/((?:(?:[0-1][0-9])|(?:[2][0-3])|(?:[0-9])):(?:[0-5][0-9])(?::[0-5][0-9])?(?:\\s?(?:am|AM|pm|PM))?)/',
			// 'end_time' 			=> '',
			'date_visible' 		=> 'date',
			'email_on' 			=> 'date',
			'comments_allowed' 	=> 'integer', 					
			'course_id' 		=> 'integer',
			'file_name' 		=> 'max:10000|mimes:audio/mpeg,mp3' //a required, max 10000kb, mpeg or mp3
        ];
	}
	
	public function messages()
    {
        return [
            'title.required' => Lang::get('lesson.error_title_required'),            						
			'type.integer' => Lang::get('lesson.error_type_integer'),
			'date.date' => Lang::get('lesson.error_date_date'),
			'url.url' => Lang::get('lesson.error_url_url'),
			'download_url.url' => Lang::get('lesson.error_download_url_url'),
			'start_time.date' => Lang::get('lesson.error_start_time_date'),
			'end_time.date' => Lang::get('lesson.error_end_time_date'),
			'date_visible.date' => Lang::get('lesson.error_date_visible_date'),
			'email_on.date' => Lang::get('lesson.error_email_on_date'),
			'comments_allowed.integer' => Lang::get('lesson.error_comments_allowed_integer'),
			'course_id.required'=> Lang::get('lesson.error_course_id_required'),
			'course_id.integer'=> Lang::get('lesson.error_course_id_integer'),
			'file_name.mimes'=> Lang::get('lesson.error_file_name_mimes'),
        ];
    }
	
	public function forbiddenResponse()
    {
        return Response::make('Unauthorized Access!',403);
    }

}
