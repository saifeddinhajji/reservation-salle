<?php

use Illuminate\Database\Seeder;

class UserSeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  /**********************create patient *************************/
  DB::table('users')->insert([
    'name' => 'user1',
    'email' => 'user1@gmail.com',
    'password' => bcrypt('reservation'),            
]);
  /**********************create patient *************************/
  DB::table('users')->insert([
    'name' => 'user2',
    'email' => 'user2@gmail.com',
    'password' => bcrypt('reservation'),            
]);
    }
}
