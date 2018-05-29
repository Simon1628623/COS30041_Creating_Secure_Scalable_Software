<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeComment extends FormRequest
{
    public function authorize()
    {
        return true;
    }

	//comment rules
    public function rules()
    {
        return [
			'content' => 'required',
			'post_id' => 'required|numeric',
			'user_id' => 'required|numeric'
        ];
    }
	
	//comment messages
	public function messages()
	{
		return [
			'content.required' => 'Please enter content.',
			'post_id.required' => 'Please enter Post ID.',
			'user_id.required' => 'Please enter User ID.',
		];
	}
}
