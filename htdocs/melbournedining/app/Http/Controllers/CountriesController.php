<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Countries;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class CountriesController extends Controller
{
    public function index()
    {
		$countries = Countries::all();
		return View::make('countries.index')->with('countries', $countries);
    }

    public function create()
    {
        return View::make('countries.create');
    }

    public function store(Request $request)
    {
		$rules = array(
		'name' => 'required',
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) 
		{
			return Redirect::to('countries/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else 
		{
			// Store the data to the database
			$countries = new Countries;
			$countries->name = Input::get('name');
			$countries->save();
			// redirect
			Session::flash('message', 'Successfully created
			countries detail!');
			return Redirect::to('countries');
		}
    }

    public function show($id)
    {
        $countries = Countries::find($id);
		return View::make('countries.show')->with('countries', $countries);
    }

    public function edit($id)
    {
        $countries = Countries::find($id);
		return View::make('countries.edit')->with('countries', $countries);
    }

    public function update(Request $request, $id)
    {
		$rules = array(
		'name' => 'required',
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) 
		{
			return Redirect::to('countries/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else 
		{
			// Store the data to the database
			$countries = new Countries;
			$countries->name = Input::get('name');
			$countries->save();
			// redirect
			Session::flash('message', 'Successfully created
			countries detail!');
			return Redirect::to('countries');
		}
    }

    public function destroy($id)
    {
        $countries = Countries::find($id);
		$countries->delete();
		Session::flash('message', 'Successfully deleted the countries');
		return Redirect::to('countries');
    }
}
