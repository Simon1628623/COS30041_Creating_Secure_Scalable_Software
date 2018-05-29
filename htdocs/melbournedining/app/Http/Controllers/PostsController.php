<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;
use App\Http\Requests\storePost;

class PostsController extends Controller
{
    public function index()
    {
		$posts = Posts::all();
		return View::make('posts.index')->with('posts', $posts);
    }

    public function create()
    {
        return View::make('posts.create');
    }
	
	//posts store
	public function store(storePost $request)
	{
			$validated = $request->validated();
			$Posts = new Posts;
			$Posts->content = Input::get('content');
			$Posts->restaurant_id = Input::get('restaurant_id');
			$Posts->user_id = Input::get('user_id');
			$Posts->save();
			Session::flash('message', 'Successfully created post!');
			return Redirect::to('Posts');
	}
	
	/*
    public function store(Request $request)
    {
		$rules = array(
		'content' => 'required',
		'restaurant_id' => 'required',
		'user_id' => 'required',
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) 
		{
			return Redirect::to('posts/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else 
		{
			// Store the data to the database
			$posts = new Posts;
			$posts->content = Input::get('content');
			$posts->restaurant_id = Input::get('restaurant_id');
			$posts->user_id = Input::get('user_id');
			$posts->save();
			// redirect
			Session::flash('message', 'Successfully created
			order detail!');
			return Redirect::to('posts');
		}
    }
	*/
    public function show($id)
    {
        $posts = Posts::find($id);
		return View::make('posts.show')->with('posts', $posts);
    }

    public function edit($id)
    {
        $posts = Posts::find($id);
		return View::make('posts.edit')->with('posts', $posts);
    }
	
		//posts update
	public function update(storePost $request)
	{
			$validated = $request->validated();
			$Posts = new Posts;
			$Posts->content = Input::get('content');
			$Posts->restaurant_id = Input::get('restaurant_id');
			$Posts->user_id = Input::get('user_id');
			$Posts->save();
			Session::flash('message', 'Successfully updated post!');
			return Redirect::to('Posts');
	}

	/*
    public function update(Request $request, $id)
    {
		$rules = array(
		'content' => 'required',
		'restaurant_id' => 'required',
		'user_id' => 'required',
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) 
		{
			return Redirect::to('posts/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else 
		{
			// Store the data to the database
			$posts = new Posts;
			$posts->content = Input::get('content');
			$posts->restaurant_id = Input::get('restaurant_id');
			$posts->user_id = Input::get('user_id');
			$posts->save();
			// redirect
			Session::flash('message', 'Successfully created
			posts detail!');
			return Redirect::to('posts');
		}
    }
	*/
    public function destroy($id)
    {
        $posts = Posts::find($id);
		$posts->delete();
		Session::flash('message', 'Successfully deleted the posts');
		return Redirect::to('posts');
    }
}
