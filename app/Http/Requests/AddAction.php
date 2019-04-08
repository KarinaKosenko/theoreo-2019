<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAction extends FormRequest {
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
			'title'       => 'required|min:2|max:200',
			'text'        => 'required',
			'date_start'  => 'required|date',
			'date_end'    => 'required|date',
			'rating'      => 'nullable|numeric',
			'priority'    => 'nullable|integer',
			'is_paid'     => 'nullable|boolean',
			'store_url'   => 'nullable|active_url',
			'type'        => 'nullable',
			'img'         => 'nullable|image',
			'brand_id'    => 'required|integer',
			'category_id' => 'required|integer',
			'address'     => 'nullable|min:6|max:250',
			'phone'       => 'nullable|min:6|max:15', // !TODO нужно будет переделать на регулярку

		];
	}
}
