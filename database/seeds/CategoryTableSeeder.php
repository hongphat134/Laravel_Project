<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('category')->truncate();

        $data = [
        	['cat_name' => 'Giáo khoa', 'cat_url' => 'giao-khoa', 'cat_des' => 'Đây là sách giáo khoa'],
        	['cat_name' => 'Tin học'  , 'cat_url' => 'tin-hoc'  , 'cat_des' => 'Đây là sách tin học'],
        	['cat_name' => 'Từ điển'  , 'cat_url' => 'tu-dien'  , 'cat_des' => 'Đây là từ điển'],
        	['cat_name' => 'Du lịch'  , 'cat_url' => 'du-lich'  , 'cat_des' => 'Đây là báo chí du lịch']
        ];

        foreach ($data as $v) {
        	DB::table('category')->insert(
        		[
        			'cat_name' => $v['cat_name'],
        			'cat_url' => $v['cat_url'],
        			'cat_des' => $v['cat_des'],
        			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        			'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        		]
        	);
        }      

        Schema::enableForeignKeyConstraints();
    }
}
