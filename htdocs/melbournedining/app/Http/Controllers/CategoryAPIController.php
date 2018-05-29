<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB\View;
use Cabon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;
use App\Http\Requests\storeCategory;

class CategoryAPIController extends Controller
{
    public function store(Request $request)
    {
		$validator = Validator::make($request->all(), (new storeCategory)->rules());
		if ($validator->fails()) 
		{
			return response()->json($validator->errors(), 400);
		} else 
		{
			$category = Categories::create($request->all());
			return response()->json($category, 201);
		}			
    }

	public function update(Request $request)
    {
		$validator = Validator::make($request->all(), (new storeCategory)->rules());
		if ($validator->fails()) 
		{
			return response()->json($validator->errors(), 400);
		} else 
		{
			$category = Categories::find($request['id']);
			$category->update($request->all());
			return response()->json($category, 200);
		}	
		
    }

    public function destroy(Request $request)
    {
        $category = Categories::find($request['id']);
		$category->delete();
		return response()->json(null, 204);
    }
}
