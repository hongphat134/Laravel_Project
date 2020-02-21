<?php

use Illuminate\Database\Seeder;

class PublisherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('publisher')->truncate();

       $data = [
        	['pub_name' => 'Tin học' , 'pub_url' => 'tin-hoc' , 'pub_des' => 'Đây là lĩnh vực tin học'],
        	['pub_name' => 'Toán học', 'pub_url' => 'toan-hoc', 'pub_des' => 'Đây là lĩnh vực toán học'],
        	['pub_name' => 'Vắn học' , 'pub_url' => 'van-hoc' , 'pub_des' => 'Đây là lĩnh vực văn học'],
        	['pub_name' => 'Sử học'  , 'pub_url' => 'su-hoc'  , 'pub_des' => 'Đây là lĩnh vực sử học']
        ];

        foreach ($data as $v) {
        	DB::table('publisher')->insert(
        		[
        			'pub_name' => $v['pub_name'],
        			'pub_url' => $v['pub_url'],
        			'pub_des' => $v['pub_des'],
        			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        			'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        		]
        	);
        }  

        Schema::enableForeignKeyConstraints();
    }
}
