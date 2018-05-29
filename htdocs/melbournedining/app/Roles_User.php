<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles_User extends Model
{
    //
	protected $table = 'role_user';
	public $incrementing = false;
	public $timestamps = true;
	protected $primaryKey = "user_id";
	protected $fillable = ['user_id', 'role_id', 'created_at', 'updated_at'];
}
