<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddAction extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|min:2|max:190|unique:actions',
            'text' => 'required|min:20|max:1000',
            'brand_id' => 'required|exists:brands,id',
            'type' => ['required',Rule::in(['discount','sale'])],
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
            'phone' => ['nullable','regex:/^((\+7|8)[0-9\-\(\)\s]+[,]?[ ]?)+/'],
            'address' => 'nullable|min:4',
            'category_id' => 'required|numeric',
            'tags' => 'required|min:1|array',
            'img' => 'url|nullable',

        ];
    }
}
