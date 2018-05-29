<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    //
	protected $table = 'restaurants';
	public $incrementing = true;
	public $timestamps = false;
	protected $primaryKey = "restid";
	protected $fillable = ['restid', 'restname', 'restphone', 'restaddress1', 'restaddress2', 'suburb', 'state', 'numberofseats', 'country_id', 'category_id'];

	public function countries()
	{
		return $this->belongsTo('App\Countries', 'country_id', 'id');
	}
	
	public function categories()
	{
		return $this->belongsTo('App\Categories', 'category_id', 'id');
	}
	
	public function posts()
	{
		return $this->hasMany('App\Posts', 'restaurant_id', 'restid');
	}
}
