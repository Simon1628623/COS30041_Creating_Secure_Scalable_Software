<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeRestaurant extends FormRequest
{
    public function authorize()
    {
        return true;
    }

	//restaurant rules
    public function rules()
    {
        return [
			'restname' => 'required',
			'restphone' => 'required|numeric',
			'restaddress1' => 'required',
			'restaddress2' => 'required',
			'suburb' => 'required',
			'state' => 'required',
			'numberofseats' => 'required',
			'country_id' => 'required|numeric',
			'category_id' => 'required|numeric',
        ];
    }
	
	//Restaurant messages
	public function messages()
	{
		return [
			'restname.required' => 'Please enter a Restaurant name.',
			'restphone.required' => 'Please enter a Restaurant Phone Number',
			'restphone.numeric' => 'PLease only use numbers',
			'restaddress1.required' => 'Please enter Part 1 of the Restaurants Address',
			'restaddress2.required' => 'Please enter Part 2 of the Restaurants Address',
			'suburb.required' => 'Please enter suburb of Restaurant',
			'state.required' => 'Please enter the State in which the Restaurant is located in.',
			'numberofseats.required' => 'Please enter number of seats in the Restaurant',
			'country_id.required' => 'Please enter country where Restaurant is located',
			'category_id.required' => 'Please enter category that the Restaurant is',
			
		];
	}
}
