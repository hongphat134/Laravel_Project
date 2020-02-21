<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $table = 'publisher';

	protected $fillable = ['pub_name','pub_url','pub_des'];

	public $timestamps = false;
}
