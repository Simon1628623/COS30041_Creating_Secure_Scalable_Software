<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Comments;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB\View;
use Cabon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;
use App\Http\Requests\storePost;

class PostAPIController extends Controller
{
    public function store(Request $request)
    {
		$validator = Validator::make($request->all(), (new storePost)->rules());
		if ($validator->fails()) 
		{
			return response()->json($validator->errors(), 400);
		} else 
		{
			$post = Posts::create($request->all());
			return response()->json($post, 201);
		}	
    }

	public function update(Request $request)
    {
		$validator = Validator::make($request->all(), (new storePost)->rules());
		if ($validator->fails()) 
		{
			return response()->json($validator->errors(), 400);
		} else 
		{
			$post = Posts::find($request['restaurant_id']);
			$post->update($request->all());
			return response()->json($post, 200);
		}
		
    }

    public function destroy(Request $request)
    {
		$post = Posts::find($request['restaurant_id']);	
		$post->delete();
		return response()->json(null, 204);
    }
}
