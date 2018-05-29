<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB\View;
use Cabon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;
use App\Http\Requests\storeRole;

class RoleAPIController extends Controller
{
    public function store(Request $request)
    {
		$validator = Validator::make($request->all(), (new storeRole)->rules());
		if ($validator->fails()) 
		{
			return response()->json($validator->errors(), 400);
		} else 
		{
			$role = Roles::create($request->all());
			return response()->json($role, 201);
		}
    }

	public function update(Request $request)
    {
		$validator = Validator::make($request->all(), (new storeRole)->rules());
		if ($validator->fails()) 
		{
			return response()->json($validator->errors(), 400);
		} else 
		{
			$role = Roles::find($request['id']);
			$role->update($request->all());
			return response()->json($role, 200);
		}
		

    }

    public function destroy(Request $request)
    {
        $role = Roles::find($request['id']);
		$role->delete();
		return response()->json(null, 204);
    }
}
