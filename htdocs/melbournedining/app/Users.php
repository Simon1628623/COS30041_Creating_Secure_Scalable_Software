<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
	protected $table = 'users';
	public $incrementing = true;
	public $timestamps = true;
	protected $primaryKey = "id";
	protected $fillable = ['id', 'name', 'email', 'password', 'created_at', 'updated_at', 'country_id'];
	
	//one to many countries has many users
	public function countries()
	{
		return $this->belongsTo('App\Countries', 'country_id', 'id');
	}
	//one to many
	public function posts()
	{
		return $this->hasMany('App\Posts', 'user_id', 'id');
	}
	//one to many
	public function comments()
	{
		return $this->hasMany('App\Comments', 'user_id', 'id');
	}
	//many to many
	public function roles()
	{
		return $this->belongsToMany('App\Roles');
	}
}
