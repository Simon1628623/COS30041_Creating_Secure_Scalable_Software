<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
	protected $table = 'roles';
	public $incrementing = true;
	public $timestamps = true;
	protected $primaryKey = "id";
	protected $fillable = ['id', 'name', 'created_at', 'updated_at'];
	
	//many to many
	public function users()
	{
		return $this->belongsToMany('App\Users');
	}
}
