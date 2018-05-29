<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeUser extends FormRequest
{
    public function authorize()
    {
        return true;
    }

	//comment rules
    public function rules()
    {
        return [
			'id' => 'required|numeric',
			'name' => 'required',
			'email' => 'required|email',
			'country_id' => 'required|numeric',
        ];
    }
	
	//comment messages
	public function messages()
	{
		return [
			'id.required' => 'Please enter id.',
			'id.numeric' => 'Please enter number id.',
			'name.required' => 'Please enter name.',
			'email.required' => 'Please enter email',
			'email.email' => 'Please enter formatted email',
			'country_id.required' => 'please enter country id',
			'country_id.numeric' => 'please enter country id in number format',
			
		];
	}
}
