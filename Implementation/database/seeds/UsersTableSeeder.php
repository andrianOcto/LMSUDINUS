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

      DB::table('users')->insert([
         'username' => "admin",
         'name' => 'admin',
         'phone' => '086666',
         'address' => 'megawon',
         'image' => 'admin.jpg',
         'role' => 'admin',
         'email' => 'admin@gmail.com',
         'password' => bcrypt('admin'),
      ]);
    }
}
