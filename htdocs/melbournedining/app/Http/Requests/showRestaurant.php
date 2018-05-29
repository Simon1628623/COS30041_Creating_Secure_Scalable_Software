<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class showRestaurant extends FormRequest
{
    public function authorize()
    {
        return true;
    }

   	//restaurant rules
    public function rules()
    {
        return [
			'country_id' => 'required|numeric',
			'category_id' => 'required|numeric',
        ];
    }
	
	//Restaurant messages
	public function messages()
	{
		return [
			'country_id.required' => 'Please enter country where Restaurant is located',
			'country_id.numeric' => 'Please enter a numeric category id value',
			'category_id.required' => 'Please enter category that the Restaurant is',
			'category_id.numeric' => 'Please enter a numeric category id value',
			
		];
	}
}
