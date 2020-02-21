<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users_type extends Model
{
    protected $table = 'users_type';

	protected $fillable = ['userstype_name'];

	public $timestamps = false;
}
