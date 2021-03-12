<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	public function messages() {
		return [

			"admin_role_id.required" => 'The role field required.',
			"branch_id.required" => 'The branch field required.',

		];
	}


	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
//		required_with:password_confirmation|


		$rules = [
			//
			"name"                  => 'required',

			'password'              => 'min:6|required|same:password_confirmation',
			'password_confirmation' => 'min:6',
			"email"                 => 'required|email|unique:admins',

		];
		if ($this->isMethod('put')) {

			unset($rules['email']);
		}


		return $rules;
	}
}
