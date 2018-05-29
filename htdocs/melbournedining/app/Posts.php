<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
	protected $table = 'posts';
	public $incrementing = false;
	public $timestamps = true;
	protected $primaryKey = "id";
	protected $fillable = ['id', 'content', 'created_at', 'updated_at', 'restaurant_id', 'user_id'];
	
	public function restaurants()
	{
		return $this->belongsTo('App\Restaurants', 'restaurant_id', 'restid');
	}
	
	public function users()
	{
		return $this->belongsTo('App\Users', 'user_id', 'id');
	}
	
	public function comments()
	{
		return $this->hasMany('App\Comments', 'post_id', 'id');
	}
	
	public function delete()
	{
		$this->comments()->delete();
		return parent::delete();
	}
}
