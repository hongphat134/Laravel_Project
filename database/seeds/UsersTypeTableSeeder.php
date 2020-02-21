<?php

use Illuminate\Database\Seeder;

class UsersTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users_type')->truncate();

        $data = [
        	['userstype_name' => 'Quản trị viên'],
        	['userstype_name' => 'Khách hàng']
        ];

        foreach ($data as $v) {
        	DB::table('users_type')->insert(
        		[
        			'userstype_name' => $v['userstype_name'],        			
        			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        			'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        		]
        	);
        }      

        Schema::enableForeignKeyConstraints();
    }
}
