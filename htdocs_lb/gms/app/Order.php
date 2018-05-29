<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
	protected $table = 'orders'; // Define the table name
	 public $incrementing = false;
	 public $timestamps = false;
	 protected $primaryKey = "orderid";
	 protected $fillable = ['regno', 'regstate', 'custname', 'custphone', 'vehbrand', 'vehmodel', 'vehyear', 'createddate',	'orderstatus', 'serialno'];
	 protected $casts = [
							'custphone' => 'string',
							'regstate' => 'string',
							'custname' => 'string',
							'custphone' => 'integer',
							'vehbrand' => 'string',
							'vehmodel' => 'string',
							'vehyear' => 'integer',
							'createddate' => 'datetime',
							'orderstatus' => 'boolean',
							'serialno' => 'string'
						];
	
	public function orderdetails()
	{
		return $this->hasMany('App\OrderDetail', 'orderid','orderid');
	}
	
	// Set the vehicle registration number to captial letters
	public function setRegnoAttribute($value)
	{
		$this->attributes['regno'] = strtoupper($value);
	}
	// Set the state to captial letters
	public function setRegstateAttribute($value)
	{
		$this->attributes['regstate'] = strtoupper($value);
	}
	// Retrieve the order status in boolean form
	public function getOrderstatusAttribute($value)
	{
		return $value ? 'true' : 'false';
	}
	// Return the registration number in captial format
	public function getRegnoAttribute($value)
	{
		return ucfirst($value);
	}
	// Return the state full name based on the short abbreviation
	 public function getRegstateAttribute()
	{
		switch (strtoupper($this->attributes['regstate'])) 
		{
			case "VIC":
				echo "Victoria";
			break;
			case "NSW":
				echo "New South Wales";
			break;
		}
	}
}
