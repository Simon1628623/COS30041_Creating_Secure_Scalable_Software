<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storePost extends FormRequest
{
    public function authorize()
    {
        return true;
    }

	//Post rules
    public function rules()
    {
        return [
			'content' => 'required',
			'restaurant_id' => 'required|numeric',
			'user_id' => 'required|numeric',
        ];
    }
	
	//Post messages
	public function messages()
	{
		return [
			'content.required' => 'Please enter content.',
			'restaurant_id.required' => 'Please enter Restaurant ID.',
			'user_id.required' => 'Please enter User ID.',
		];
	}
}
