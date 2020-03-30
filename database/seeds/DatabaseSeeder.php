<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PublisherTableSeeder::class);
        $this->call(UsersTypeTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BookTableSeeder::class);
    }
}
