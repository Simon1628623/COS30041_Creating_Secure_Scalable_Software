<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
	protected $table = 'categories';
	public $incrementing = true;
	public $timestamps = true;
	protected $primaryKey = "id";
	protected $fillable = ['id', 'name', 'created_at', 'updated_at'];
	
	public function restaurants()
	{
		return $this->hasMany('App\Restaurants');
	}
}
