<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->increments('id');         
            $table->string('book_name');
            $table->string('book_url');
            $table->string('book_img');
            $table->longText('book_description');
            //$table->integer('book_view');
            $table->integer('book_price');
            $table->integer('book_highlight');
            $table->integer('book_promotion');
            $table->integer('book_quantity');
            $table->integer('pub_id')->unsigned();           
            $table->foreign('pub_id')->references('id')->on('publisher')->onUpdate('cascade');
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('id')->on('category')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book');
    }
}
