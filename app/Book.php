<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';

	protected $fillable = ['book_name','book_url','book_img','book_description','book_promotion','book_quantity','pub_id','cat_id'];

	public $timestamps = false;

	//public function __construct(){	}
}
