<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class CategoriesController extends Controller
{
    public function index()
    {
		$categories = Categories::all();
		return View::make('categories.index')->with('categories', $categories);
    }

    public function create()
    {
        return View::make('categories.create');
    }

    public function store(Request $request)
    {
		$rules = array(
		'name' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) 
		{
			return Redirect::to('categories/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else 
		{
			// Store the data to the database
			$categories = new Categories;
			$categories->name = Input::get('name');
			$categories->save();
			// redirect
			Session::flash('message', 'Successfully created
			categories detail!');
			return Redirect::to('categories');
		}
    }

    public function show($id)
    {
        $categories = Categories::find($id);
		return View::make('categories.show')->with('categories', $categories);
    }

    public function edit($id)
    {
        $categories = Categories::find($id);
		return View::make('categories.edit')->with('categories', $categories);
    }

    public function update(Request $request, $id)
    {
		$rules = array(
		'name' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) 
		{
			return Redirect::to('categories/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else 
		{
			// Store the data to the database
			$categories = new Categories;
			$categories->name = Input::get('name');
			$categories->save();
			// redirect
			Session::flash('message', 'Successfully created
			categories detail!');
			return Redirect::to('categories');
		}
	}
    
    public function destroy($id)
    {
        $categories = Categories::find($id);
		$categories->delete();
		Session::flash('message', 'Successfully deleted the categories');
		return Redirect::to('categories');
    }
}
