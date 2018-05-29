<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
	protected $table = 'comments';
	public $incrementing = false;
	public $timestamps = true;
	protected $primaryKey = "id";
	protected $fillable = ['id', 'content', 'created_at', 'updated_at', 'post_id', 'user_id'];
	
	public function posts()
	{
		return $this->belongsTo('App\Posts', 'post_id', 'id');
	}
	
	public function users()
	{
		return $this->belongsTo('App\Users', 'user_id', 'id');
	}
}
