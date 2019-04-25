<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddBrand extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2|max:190|unique:brands',
            'type' => ['required',Rule::in(['federal_brand','internet_shop'])],
            'site_url' => 'url|nullable',
            'vk_url' => 'url|nullable',
            'img' => 'url|nullable',
            'phone' => ['nullable','regex:/^((\+7|8)[0-9\-\(\)\s]+[,]?[ ]?)+/'],
            'sell_address' => 'nullable|min:4',
            'categories' => 'required|min:1|array',

        ];
    }
}
