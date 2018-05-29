<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB\View;
use Cabon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;
use App\Http\Requests\storeUser;

class UserAPIController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), (new storeUser)->rules());
		if ($validator->fails()) 
		{
			return response()->json($validator->errors(), 400);
		} else 
		{
			$user = Users::create($request->all());
			return response()->json($user, 201);
		}			
    }

	public function update(Request $request)
    {
		$validator = Validator::make($request->all(), (new storeUser)->rules());
		if ($validator->fails()) 
		{
			return response()->json($validator->errors(), 400);
		} else 
		{
			$user = Users::find($request['id']);
			$user->update($request->all());
			return response()->json($user, 200);
		}	

    }

    public function destroy(Request $request)
    {
        $user = Users::find($request['id']);
		$user->delete();
		return response()->json(null, 204);
    }
}
