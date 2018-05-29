<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function createOrder($regno,$regstate,$custname,$custphone,$vehbrand,$vehmodel,$vehyear,$serialno) {
		$id = DB::table('orders')->insertGetId(['regno' => $regno, 
			'regstate' => $regstate, 'custname' => $custname, 
			'custphone' => $custphone, 'vehbrand' => $vehbrand, 
			'vehmodel' => $vehmodel, 'vehyear' => $vehyear, 
			'createddate' => Carbon::now(), 'orderstatus' => '0', 
			'serialno' => $serialno]);
		return $id;
	}
	
	public function showAllOrders() {
		$orders = DB::table('orders')->paginate(2);
		return view('showallorders', ['orders' => $orders]);
	}

}
