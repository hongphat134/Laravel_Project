<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();

        $data = [
        	['name' => 'Phát' , 'email' => 'root@gmail.com' , 'password' => '987654', 'userstype_id' => 1],
        	['name' => 'Thiện', 'email' => 'user1@gmail.com', 'password' => '123456', 'userstype_id' => 2],
        ];

        foreach ($data as $v) {
        	DB::table('users')->insert(
        		[
        			'name' => $v['name'],        			
        			'email' => $v['email'],    
        			'password' => bcrypt($v['password']),    
        			'userstype_id' => $v['userstype_id'],   
        			'remember_token' => '', 
        			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        			'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        		]
        	);
        }      

        Schema::enableForeignKeyConstraints();
    }
}
