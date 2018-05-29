<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class deleteRestaurant extends FormRequest
{
    public function authorize()
    {
        return true;
    }

   	//restaurant rules
    public function rules()
    {
        return [
			'restid' => 'required|numeric',
        ];
    }
	
	//Restaurant messages
	public function messages()
	{
		return [
			'restid.required' => 'Please enter Restaurant ID',
			'restid.numeric' => 'Please enter a numeric restaurant id value',			
		];
	}
}
