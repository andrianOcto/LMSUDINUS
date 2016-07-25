<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Course;
use App\User_Course;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $user1 = User::create([
            'username' => "admin",
            'name' => 'admin',
            'phone' => '086666',
            'address' => 'megawon',
            'image' => 'admin.jpg',
            'role' => 0,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
           ]);

       $user2 = User::create([
             'username' => "andrian",
             'name' => 'andrian',
             'phone' => '086666',
             'address' => 'megawon',
             'image' => 'admin.jpg',
             'role' => 1,
             'email' => 'andrian@gmail.com',
             'password' => bcrypt('3102')
            ]);
      $user3 = User::create([
            'username' => "deny",
            'name' => 'deny',
            'phone' => '086666',
            'address' => 'megawon',
            'image' => 'admin.jpg',
            'role' => 2,
            'email' => 'deny@gmail.com',
            'password' => bcrypt('3102')
           ]);

       $user4 = User::create([
             'username' => "valen",
             'name' => 'valen',
             'phone' => '086666',
             'address' => 'megawon',
             'image' => 'admin.jpg',
             'role' => 2,
             'email' => 'valen@gmail.com',
             'password' => bcrypt('3102')
            ]);


        $course1 = Course::create([
              'code' => "IF2040",
              'name' => 'Pemrograman Dasar',
              'description' => 'ini adalah deskripsi dari pemrograman dasar',
              'credit' => 4,
              'status' => '1',
              'creator_id'=>'1'
             ]);
        $course2 = Course::create([
             'code' => "IF2041",
             'name' => 'Pemrograman Internet',
             'description' => 'ini adalah deskripsi dari pemrograman internet',
             'credit' => 4,
             'status' => '1',
             'creator_id'=>'1'
            ]);

        $course2 = Course::create([
             'code' => "IF2042",
             'name' => 'Pemrograman Lanjut',
             'description' => 'ini adalah deskripsi dari pemrograman lanjut',
             'credit' => 4,
             'status' => '1',
             'creator_id'=>'1'
            ]);

        $enroll1 = User_Course::create([
             'course_id' => "1",
             'user_id' => '2'
            ]);
        $enroll2 = User_Course::create([
             'course_id' => "2",
             'user_id' => '2'
            ]);
        $enroll3 = User_Course::create([
             'course_id' => "3",
             'user_id' => '2'
            ]);
        $enroll4 = User_Course::create([
             'course_id' => "1",
             'user_id' => '3'
            ]);
        $enroll5 = User_Course::create([
             'course_id' => "2",
             'user_id' => '3'
            ]);
        $enroll6 = User_Course::create([
             'course_id' => "3",
             'user_id' => '3'
            ]);
        
    }
}
