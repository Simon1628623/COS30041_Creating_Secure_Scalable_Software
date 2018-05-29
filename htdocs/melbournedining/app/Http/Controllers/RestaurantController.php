<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Restaurants;
use Illuminate\Support\Facades\View;
use Validator;
use Input;
use Session;
use Redirect;
use App\Http\Requests\storeRestaurant;

class RestaurantController extends Controller
{
    public function showRestaurant() {
		$data = Array(
			Array(
				'Restaurant'=>'Waya', 
				'Location'=>'Glen Waverley', 
				'Cuisinie'=>'Japanese'
			),
			Array(
				'Restaurant'=>'Uncle Jack',
				'Location'=>'Wheelers Hill',
				'Cuisinie'=>'Chinese'
			),
			Array(
				'Restaurant'=>'Bon Chicker and Beer',
				'Location'=>'Glen Waverley',
				'Cuisinie'=>'Korean'
			)
		);
				
		return view('showrestaurant',compact('data'));
	}
	
	public function insertRestaurant($restname,$restphone,$restaddress1,$restaddress2,$suburb,$state,$numberofseats) {
	$id = DB::table('restaurants')->insertGetId(['restname' => $restname, 
		'restphone' => $restphone, 'restaddress1' => $restaddress1, 
		'restaddress2' => $restaddress2, 'suburb' => $suburb, 
		'state' => $state, 'numberofseats' => $numberofseats] 
		);
		if($id) {$b= 'true';}
		else{$b= 'false';}
		return $b;
	}
	
	public function showAllRestaurants() {
		$restaurants = DB::table('restaurants')->paginate(2);
		return view('showallrestaurants', ['restaurants' => $restaurants]);
	}
	
	public function deleteRestaurant($restid) {
		$q = DB::table('restaurants')
		->where('restid', $restid)
		->delete();
		if($q) {$b= 'true';}
		else{$b= 'false';}
		return $b;
	}
	
	public function updateRestaurant($restid, $restname,$restphone,$restaddress1,$restaddress2,$suburb,$state,$numberofseats) {
		$id = DB::table('restaurants')->where('restid',$restid)->update(['restname' => $restname, 
		'restphone' => $restphone, 'restaddress1' => $restaddress1, 
		'restaddress2' => $restaddress2, 'suburb' => $suburb, 
		'state' => $state, 'numberofseats' => $numberofseats] 
		);
	return $id;
	}
	
    public function index()
    {
		$restaurants = Restaurants::all();
		return View::make('restaurants.index')->with('restaurants', $restaurants);
    }

    public function create()
    {
        return View::make('restaurants.create');
    }
	
	//store restaurant
	public function store(storeRestaurant $request)
	{
			$validated = $request->validated();
			$restaurants = new Restaurants;
			$restaurants->restname = Input::get('restname');
			$restaurants->restphone = Input::get('restphone');
			$restaurants->restaddress1 = Input::get('restaddress1');
			$restaurants->restaddress2 = Input::get('restaddress2');
			$restaurants->suburb = Input::get('suburb');
			$restaurants->state = Input::get('state');
			$restaurants->numberofseats = Input::get('numberofseats');
			$restaurants->country_id = Input::get('country_id');
			$restaurants->category_id = Input::get('category_id');
			$restaurants->save();
			Session::flash('message', 'Successfully created restaurant detail!');
			return Redirect::to('restaurants');
	}
	
	/*
    public function store(Request $request)
    {
		$rules = array(
		'restname' => 'required',
		'restphone' => 'required|numeric',
		'restaddress1' => 'required',
		'restaddress2' => 'required',
		'suburb' => 'required',
		'state' => 'required',
		'numberofseats' => 'required',
		'country_id' => 'required|numeric',
		'category_id' => 'required|numeric',
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) 
		{
			return Redirect::to('restaurants/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else 
		{
			// Store the data to the database
			$restaurants = new Restaurants;
			$restaurants->restname = Input::get('restname');
			$restaurants->restphone = Input::get('restphone');
			$restaurants->restaddress1 = Input::get('restaddress1');
			$restaurants->restaddress2 = Input::get('restaddress2');
			$restaurants->suburb = Input::get('suburb');
			$restaurants->state = Input::get('state');
			$restaurants->numberofseats = Input::get('numberofseats');
			$restaurants->country_id = Input::get('country_id');
			$restaurants->category_id = Input::get('category_id');
			$restaurants->save();
			// redirect
			Session::flash('message', 'Successfully created
			restaurant detail!');
			return Redirect::to('restaurants');
		}
    }
	*/
    public function show($id)
    {
        $restaurants = Restaurants::find($id);
		return View::make('restaurants.show')->with('restaurants', $restaurants);
    }

    public function edit($id)
    {
        $restaurants = Restaurants::find($id);
		return View::make('restaurants.edit')->with('restaurants', $restaurants);
    }
	
		//update restaurant
	public function update(storeRestaurant $request)
	{
			$validated = $request->validated();
			$restaurants = new Restaurants;
			$restaurants->restname = Input::get('restname');
			$restaurants->restphone = Input::get('restphone');
			$restaurants->restaddress1 = Input::get('restaddress1');
			$restaurants->restaddress2 = Input::get('restaddress2');
			$restaurants->suburb = Input::get('suburb');
			$restaurants->state = Input::get('state');
			$restaurants->numberofseats = Input::get('numberofseats');
			$restaurants->country_id = Input::get('country_id');
			$restaurants->category_id = Input::get('category_id');
			$restaurants->save();
			Session::flash('message', 'Successfully updated restaurant detail!');
			return Redirect::to('restaurants');
	}
	
	/*
    public function update(Request $request, $id)
    {
		$rules = array(
		'restname' => 'required',
		'restphone' => 'required|numeric',
		'restaddress1' => 'required',
		'restaddress2' => 'required',
		'suburb' => 'required',
		'state' => 'required',
		'numberofseats' => 'required',
		'country_id' => 'required|numeric',
		'category_id' => 'required|numeric',
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) 
		{
			return Redirect::to('restaurants/create')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else 
		{
			// Store the data to the database
			$restaurants = new Restaurants;
			$restaurants->restname = Input::get('restname');
			$restaurants->restphone = Input::get('restphone');
			$restaurants->restaddress1 = Input::get('restaddress1');
			$restaurants->restaddress2 = Input::get('restaddress2');
			$restaurants->suburb = Input::get('suburb');
			$restaurants->state = Input::get('state');
			$restaurants->numberofseats = Input::get('numberofseats');
			$restaurants->country_id = Input::get('country_id');
			$restaurants->category_id = Input::get('category_id');
			$restaurants->save();
			// redirect
			Session::flash('message', 'Successfully created restaurant detail!');
			return Redirect::to('restaurants');
		}
    }
	*/
    public function destroy($id)
    {
        $restaurants = Restaurants::find($id);
		$restaurants->delete();
		Session::flash('message', 'Successfully deleted the restaurants');
		return Redirect::to('restaurants');
    }
	
	public function restaurantwithdetails($id)
	{
		$restaurants = Restaurants::find($id);
		return View::make('restaurants.restaurantwithdetails')->with('restaurants', $restaurants);
	}
}
