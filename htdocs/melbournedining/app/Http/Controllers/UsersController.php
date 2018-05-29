<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class UsersController extends Controller
{
    public function index()
    {
		$users = Users::all();
		return View::make('users.index')->with('users', $users);
    }

    public function create()
    {
        return View::make('users.create');
    }

    public function store(Request $request)
    {
		$rules = array(
		'name' => 'required',
		'email' => 'required',
		'password' => '',
		'country_id' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) 
		{
			return Redirect::to('users/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else 
		{
			// Store the data to the database
			$users = new Users;
			$users->name = Input::get('name');
			$users->email = Input::get('email');
			$users->password = Input::get('password');
			$users->country_id = Input::get('country_id');
			$users->save();
			// redirect
			Session::flash('message', 'Successfully created
			order detail!');
			return Redirect::to('users');
		}
    }

    public function show($id)
    {
        $users = Users::find($id);
		return View::make('users.show')->with('users', $users);
    }

    public function edit($id)
    {
        $users = Users::find($id);
		return View::make('users.edit')->with('users', $users);
    }

    public function update(Request $request, $id)
    {
		$rules = array(
		'name' => 'required',
		'email' => 'required',
		'password' => '',
		'country_id' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) 
		{
			return Redirect::to('users/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else 
		{
			// Store the data to the database
			$users = new Users;
			$users->name = Input::get('name');
			$users->email = Input::get('email');
			$users->password = Input::get('password');
			$users->country_id = Input::get('country_id');
			$users->save();
			// redirect
			Session::flash('message', 'Successfully created
			order detail!');
			return Redirect::to('users');
		}
    }

    public function destroy($id)
    {
        $users = Users::find($id);
		$users->delete();
		Session::flash('message', 'Successfully deleted the users');
		return Redirect::to('users');
    }
}
