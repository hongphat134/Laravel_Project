<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $table = 'order';

	protected $fillable = ['consignee_name','consignee_email','consignee_phone','consignee_add','order_status','order_note','user_id'];

	public $timestamps = false;
}
