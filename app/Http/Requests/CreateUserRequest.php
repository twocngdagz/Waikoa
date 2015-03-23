<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Lang;

class CreateUserRequest extends Request {

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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];
	}

    public function messages()
    {
        return [
            'name.required' => Lang::get('user.error_name'),
            'email.required' => Lang::get('user.error_email'),
            'email.email' => Lang::get('user.error_email_format'),
            'password.required' => Lang::Get('user.error_password'),
            'password_confirmation.required' => Lang::Get('user.error_password_confirmation'),
            'password.confirmed'  => Lang::get('user.error_password_match'),
        ];

    }

}
