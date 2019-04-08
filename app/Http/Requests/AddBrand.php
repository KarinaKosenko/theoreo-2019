<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBrand extends FormRequest {
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
		return [
			'name'         => 'required|min:2|max:150|unique:brands',
			'img'          => 'nullable|image',
			'site_url'     => 'nullable|active_url',
			'vk_url'       => 'nullable|active_url',
			'phone'        => 'nullable|min:6|max:15', // !TODO нужно будет переделать на регулярку
			'sell_address' => 'nullable|min:6|max:250',
			'type'         => 'nullable',
		];
	}
}
