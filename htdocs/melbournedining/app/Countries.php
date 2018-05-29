<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    //
	protected $table = 'countries';
	public $incrementing = true;
	public $timestamps = true;
	protected $primaryKey = "id";
	protected $fillable = ['id', 'name', 'created_at', 'updated_at'];
	
	public function restaurants()
	{
		return $this->hasMany('App\Restaurants');
	}
	
	public function users()
	{
		return $this->hasMany('App\Users', 'country_id', 'id');
	}
}
