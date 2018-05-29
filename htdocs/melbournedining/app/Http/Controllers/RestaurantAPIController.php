<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurants;
use App\Posts;
use App\Comments;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB\View;
use Cabon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;
use App\Http\Requests\storeRestaurant;
use App\Http\Requests\deleteRestaurant;
use App\Http\Requests\showRestaurant;


class RestaurantAPIController extends Controller
{
    public function store(Request $request)
    {
		$validator = Validator::make($request->all(), (new storeRestaurant)->rules());
		if ($validator->fails()) 
		{
			return response()->json($validator->errors(), 400);
		} else 
		{
			$restaurant = Restaurants::create($request->all());
			return response()->json($restaurant, 201);
		}
    }

	public function update(Request $request)
    {
		$validator = Validator::make($request->all(), (new storeRestaurant)->rules());
		if ($validator->fails()) 
		{
			return response()->json($validator->errors(), 400);
		} else 
		{
			$restaurant = Restaurants::find($request['restid']);
			$restaurant->update($request->all());
			return response()->json($restaurant, 200);
		}
    }

    public function destroy(Request $request)
    {
		$validator = Validator::make($request->all(), (new deleteRestaurant)->rules());
		if ($validator->fails()) 
		{
			return response()->json($validator->errors(), 400);
		} else 
		{
			$restaurant = Restaurants::find($request['restid']);
			$restaurant->delete();
			return response()->json(null, 204);
		}	
    }
	
	public function showposts(Request $request)
    {
		$validator = Validator::make($request->all(), (new deleteRestaurant)->rules());
		if ($validator->fails()) 
		{
			return response()->json($validator->errors(), 400);
		} else 
		{
			$restaurants = Restaurants::find($request['restid']);
			$restaurants->posts = $restaurants->posts->all();
			foreach($restaurants->posts as $post)
			{
					$post->comments = $post->comments->all();
			}
			return response()->json($restaurants, 200);
		}	
    }
	
    public function showlocationcategory(Request $request)
    {
		$validator = Validator::make($request->all(), (new showRestaurant)->rules());
		if ($validator->fails()) 
		{
			return response()->json($validator->errors(), 400);
		} else 
		{
			$restaurants = Restaurants::where('category_id', $request['category_id'])->where('country_id', $request['country_id'])->get();
			return response()->json($restaurants, 200);
		}	
		
    }
}
