<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;
use App\Http\Requests\StoreOrder;

class OrderController extends Controller
{
    public function index()
	{
		 // Retrieve all the orders
		 $orders = Order::all();
		 // Load the view and pass the orders
		 return View::make('orders.index')
		 ->with('orders', $orders);
	}
	
	public function create()
	{
			return View::make('orders.create');
	}
	/*
	public function store(Request $request)
	{
		// Validate
		// Read more on validation at http://laravel.com/docs/validation
		$rules = array(
		'regno' => 'required',
		'regstate' => 'required',
		'custname' => 'required',
		'custphone' => 'required|numeric',
		'vehbrand' => 'required',
		'vehmodel' => 'required',
		'vehyear' => 'required|numeric',
		'serialno' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
		return Redirect::to('orders/create')->withErrors($validator)->withInput(Input::except('password'));
		} else {
			// Store the data to the database
			$order = new Order;
			$order->regno = Input::get('regno');
			$order->regstate = Input::get('regstate');
			$order->custname = Input::get('custname');
			$order->custphone = Input::get('custphone');
			$order->vehbrand = Input::get('vehbrand');
			$order->vehmodel = Input::get('vehmodel');
			$order->vehyear = Input::get('vehyear');
			$order->serialno = Input::get('serialno');
			$order->orderstatus = 0;
			$order->createddate = Carbon::now();
			$order->save();
			// redirect
			Session::flash('message', 'Successfully created order!');
			return Redirect::to('orders');
		}
	}*/
	
	public function store(StoreOrder $request)
	{
		$validated = $request->validated();
		$order = new Order;
		$order->regno = Input::get('regno');
		$order->regstate = Input::get('regstate');
		$order->custname = Input::get('custname');
		$order->custphone = Input::get('custphone');
		$order->vehbrand = Input::get('vehbrand');
		$order->vehmodel = Input::get('vehmodel');
		$order->vehyear = Input::get('vehyear');
		$order->serialno = Input::get('serialno');
		$order->orderstatus = 0;
		$order->createddate = Carbon::now();
		$order->save();
		Session::flash('message', 'Successfully created
		order!');
		return Redirect::to('orders');
	}
	
	public function show($id)
	{
		 // Retrieve the order based on the id
		 $order = Order::find($id);
		 // show the view and pass the order to it
		 return View::make('orders.show')->with('order', $order);
	}
	
	public function edit($id)
	{
		// Retrieve the order
		$order = Order::find($id);
		// show the edit form and pass the order
		return View::make('orders.edit')->with('order', $order);
	}
	/*
	public function update(Request $request, $id)
	{
		// Validate
		// Read more on validation at http://laravel.com/docs/validation
		$rules = array(
		'regno' => 'required',
		'regstate' => 'required',
		'custname' => 'required',
		'custphone' => 'required|numeric',
		'vehbrand' => 'required',
		'vehmodel' => 'required',
		'vehyear' => 'required|numeric',
		'serialno' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);
		// process the login
		if ($validator->fails()) {
			return Redirect::to('orders/' . $id . '/edit')
			->withErrors($validator)
			->withInput(Input::except('password'));
		} else {
			// store
			$order = Order::find($id);
			$order->regno = Input::get('regno');
			$order->regstate = Input::get('regstate');
			$order->custname = Input::get('custname');
			$order->custphone = Input::get('custphone');
			$order->vehbrand = Input::get('vehbrand');
			$order->vehmodel = Input::get('vehmodel');
			$order->vehyear = Input::get('vehyear');
			$order->serialno = Input::get('serialno');
			$order->save();
			// redirect
			Session::flash('message', 'Successfully updated order!');
			return Redirect::to('orders');
		}
	}
	*/
	public function update(StoreOrder $request)
	{
		$validated = $request->validated();
		$order = new Order;
		$order->regno = Input::get('regno');
		$order->regstate = Input::get('regstate');
		$order->custname = Input::get('custname');
		$order->custphone = Input::get('custphone');
		$order->vehbrand = Input::get('vehbrand');
		$order->vehmodel = Input::get('vehmodel');
		$order->vehyear = Input::get('vehyear');
		$order->serialno = Input::get('serialno');
		$order->orderstatus = 0;
		//$order->createddate = Carbon::now();
		$order->save();
		Session::flash('message', 'Successfully updated order!');
		return Redirect::to('orders');
	}
	
	public function destroy($id)
	{
		// Delete
		$order = Order::find($id);
		$order->delete();
		// redirect
		Session::flash('message', 'Successfully deleted the order!');
		return Redirect::to('orders');
	}
	
	public function orderwithdetails($id)
	{
		$order = Order::find($id);
		return View::make('orderdetails.orderwithdetails')->with('order', $order);
	}
	
	// Redirect the user to the view with cerate order detail form
public function orderwithdetailswithcreate($id)
{
	$order = Order::find($id);
	return View::make('orders.createorderdetailswithorderid')->with('order', $order);
}

// Execute the save method to store the order detail redirect the user back to the view
public function createorderdetailswithorderid()
{
	$orderdetails = new OrderDetailController([
		'desc' => Input::get('desc'),
		'cost' => Input::get('cost'),
		'price' => Input::get('price'),
		'orderid' => Input::post('orderid'),
	]);
	$order = Order::find(Input::post('orderid'));
	$order->orderdetails()->save($orderdetails);
	Session::flash('message', 'Successfully created order detail!');
	return Redirect::to('orders/createorderdetailswithorderid/' . Input::post('orderid'));
}
}