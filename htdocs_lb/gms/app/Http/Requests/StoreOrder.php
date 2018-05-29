<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
{
	public function authorize()
	{
		return true;
	}
	public function rules()
	{
		return [
		'regno' => 'required',
		'regstate' => 'required',
		'custname' => 'required',
		'custphone' => 'required|numeric',
		'vehbrand' => 'required',
		'vehmodel' => 'required',
		'vehyear' => 'required|numeric',
		'serialno' => 'required'
		];
	 }
	public function messages()
	{
		return [
		'regno.required' => 'Please enter the Registration Number.',
		'regstate.required' => 'Please enter the State.',
		'custname.required' => 'Please Enter Customer Name.',
		'custphone.required' => 'Please enter customer phone number.',
		'vehbrand.required' => 'Please enter vehicle brand.',
		'vehmodel.required' => 'Please enter vehicle model.',
		'vehyear.required' => 'Please enter vehicle year.',
		'serialno.required' => 'Please enter serial number',
		];
	}
	
	
}
