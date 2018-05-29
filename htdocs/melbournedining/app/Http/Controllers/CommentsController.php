<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;
use App\Http\Requests\storeComment;

class CommentsController extends Controller
{
    public function index()
    {
		$comments = Comments::all();
		return View::make('comments.index')->with('comments', $comments);
    }

    public function create()
    {
        return View::make('comments.create');
    }
	
	//comments store
	public function store(storeComment $request)
	{
			$validated = $request->validated();
			$Comments = new Comments;
			$Comments->content = Input::get('content');
			$Comments->post = Input::get('post');
			$Comments->user_id = Input::get('user_id');
			$Comments->save();
			Session::flash('message', 'Successfully created Comment!');
			return Redirect::to('Comments');
	}
	
	/*
    public function store(Request $request)
    {
		$rules = array(
		'content' => 'required',
		'post_id' => 'required|numeric',
		'user_id' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) 
		{
			return Redirect::to('comments/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else 
		{
			// Store the data to the database
			$comments = new Comments;
			$comments->content = Input::get('content');
			$comments->post_id = Input::get('post_id');
			$comments->user_id = Input::get('user_id');
			$comments->save();
			// redirect
			Session::flash('message', 'Successfully created
			comments detail!');
			return Redirect::to('comments');
		}
    }
	*/
    public function show($id)
    {
        $comments = Comments::find($id);
		return View::make('comments.show')->with('comments', $comments);
    }

    public function edit($id)
    {
        $comments = Comments::find($id);
		return View::make('comments.edit')->with('comments', $comments);
    }
	
	//comments update
	public function update(storeComment $request)
	{
			$validated = $request->validated();
			$Comments = new Comments;
			$Comments->content = Input::get('content');
			$Comments->post = Input::get('post');
			$Comments->user_id = Input::get('user_id');
			$Comments->save();
			Session::flash('message', 'Successfully updated Comment!');
			return Redirect::to('Comments');
	}
	
	/*
    public function update(Request $request, $id)
    {
		$rules = array(
		'content' => 'required',
		'post_id' => 'required|numeric',
		'user_id' => 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) 
		{
			return Redirect::to('comments/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else 
		{
			// Store the data to the database
			$comments = new Comments;
			$comments->content = Input::get('content');
			$comments->post_id = Input::get('post_id');
			$comments->user_id = Input::get('user_id');
			$comments->save();
			// redirect
			Session::flash('message', 'Successfully created
			comments detail!');
			return Redirect::to('comments');
		}
	}
	*/
    public function destroy($id)
    {
        $comments = Comments::find($id);
		$comments->delete();
		Session::flash('message', 'Successfully deleted the comments');
		return Redirect::to('comments');
    }
}
