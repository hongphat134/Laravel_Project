<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = 'order_detail';

	protected $fillable = ['book_id','order_id','orderdetail_quantity'];

	public $timestamps = false;
}
