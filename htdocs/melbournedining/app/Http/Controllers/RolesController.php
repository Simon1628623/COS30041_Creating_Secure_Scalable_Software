<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class RolesController extends Controller
{
    public function index()
    {
		$roles = Roles::all();
		return View::make('roles.index')->with('roles', $roles);
    }

    public function create()
    {
        return View::make('roles.create');
    }

    public function store(Request $request)
    {
		$rules = array(,
		'name' => 'required',
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) 
		{
			return Redirect::to('roles/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else 
		{
			// Store the data to the database
			$roles = new Roles;
			$roles->name = Input::get('name');
			$roles->save();
			// redirect
			Session::flash('message', 'Successfully created
			roles detail!');
			return Redirect::to('roles');
		}
    }

    public function show($id)
    {
        $roles = Roles::find($id);
		return View::make('roles.show')->with('roles', $roles);
    }

    public function edit($id)
    {
        $roles = Roles::find($id);
		return View::make('roles.edit')->with('roles', $roles);
    }

    public function update(Request $request, $id)
    {
		$rules = array(
		'name' => 'required',
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) 
		{
			return Redirect::to('roles/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else 
		{
			// Store the data to the database
			$roles = new Roles;
			$roles->name = Input::get('name');
			$roles->save();
			// redirect
			Session::flash('message', 'Successfully created
			roles detail!');
			return Redirect::to('roles');
		}
	}

    public function destroy($id)
    {
        $roles = Roles::find($id);
		$roles->delete();
		Session::flash('message', 'Successfully deleted the roles');
		return Redirect::to('roles');
    }
}
