<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles_User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class Roles_UserController extends Controller
{
    public function index()
    {
		$roles_user = Roles_User::all();
		return View::make('roles_user.index')->with('roles_user', $roles_user);
    }
	
    public function create()
    {
        return View::make('roles_user.create');
    }

    public function store(Request $request)
    {
		$rules = array(
		'user_id' => 'required|numeric',
		'role_id' => 'required|numeric',
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) 
		{
			return Redirect::to('roles_user/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else 
		{
			// Store the data to the database
			$roles_user = new Roles_User;
			$roles_user->user_id = Input::get('user_id');
			$roles_user->role_id = Input::get('role_id');
			$roles_user->save();
			// redirect
			Session::flash('message', 'Successfully created
			roles_user detail!');
			return Redirect::to('roles_user');
		}
    }

    public function show($id)
    {
        $roles_user = Roles_User::find($id);
		return View::make('roles_user.show')->with('roles_user', $roles_user);
    }

    public function edit($id)
    {
        $roles_user = Roles_User::find($id);
		return View::make('roles_user.edit')->with('roles_user', $roles_user);
    }

    public function update(Request $request, $id)
    {
		$rules = array(
		'user_id' => 'required|numeric',
		'role_id' => 'required|numeric',
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) 
		{
			return Redirect::to('roles_user/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else 
		{
			// Store the data to the database
			$roles_user = new Roles_User;
			$roles_user->user_id = Input::get('user_id');
			$roles_user->role_id = Input::get('role_id');
			$roles_user->save();
			// redirect
			Session::flash('message', 'Successfully created
			roles_user detail!');
			return Redirect::to('roles_user');
		}
	}

    public function destroy($id)
    {
        $roles_user = Roles_User::find($id);
		$roles_user->delete();
		Session::flash('message', 'Successfully deleted the roles_user');
		return Redirect::to('roles_user');
    }
}
