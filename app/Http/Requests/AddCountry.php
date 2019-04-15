<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Redirect;

class AddCountry extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {

		if ( $this->get( 'method' ) == 'Назад' ) {
			return [];
		}
		return [
			'name'       => 'required|min:2|max:50|unique:countries',
		];
	}
}
