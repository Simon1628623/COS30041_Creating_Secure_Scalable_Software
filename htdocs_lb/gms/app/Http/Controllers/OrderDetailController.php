<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class OrderDetailController extends Controller
{
	public function index()
	{
		$orderdetails = OrderDetail::all();
		return View::make('orderdetails.index')
		->with('orderdetails', $orderdetails);
	}
	public function create()
	{
		return View::make('orderdetails.create');
	}
	public function store(Request $request)
	{
		$rules = array(
		'desc' => 'required',
		'cost' => 'required',
		'price' => 'required',
		'orderid' => 'required|numeric',
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
		return Redirect::to('orderdetails/create')
		->withErrors($validator)
		->withInput(Input::except('password'));
		} else {
			// Store the data to the database
			$orderdetail = new OrderDetail;
			$orderdetail->desc = Input::get('desc');
			$orderdetail->cost = Input::get('cost');
			$orderdetail->price = Input::get('price');
			$orderdetail->orderid = Input::get('orderid');
			$orderdetail->save();
			// redirect
			Session::flash('message', 'Successfully created
			order detail!');
			return Redirect::to('orderdetails');
		}
	}
	public function show($id)
	{
		$orderdetail = OrderDetail::find($id);
		return View::make('orderdetails.show')
		->with('orderdetail', $orderdetail);
	}
	public function edit($id)
	{
		$orderdetail = OrderDetail::find($id);
		return View::make('orderdetails.edit')
		->with('orderdetail', $orderdetail);
	}
	public function update(Request $request, $id)
	{
		$rules = array(
		'desc' => 'required',
		'cost' => 'required',
		'price' => 'required',
		'orderid' => 'required|numeric',
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
		return Redirect::to('orderdetails/' . $id .
		'/edit')
		->withErrors($validator)
		->withInput(Input::except('password'));
		} else {
			// Store the data to the database
			$orderdetail = new OrderDetail;
			$orderdetail->desc = Input::get('desc');
			$orderdetail->cost = Input::get('cost');
			$orderdetail->price = Input::get('price');
			$orderdetail->orderid = Input::get('orderid');
			$orderdetail->save();
			// redirect
			Session::flash('message', 'Successfully updated
			order detail!');
			return Redirect::to('orderdetails');
		}
	}
	public function destroy($id)
	{
		$orderdetail = OrderDetail::find($id);
		$orderdetail->delete();
		Session::flash('message', 'Successfully deleted the
		order detail!');
		return Redirect::to('orderdetails');
	}
}
