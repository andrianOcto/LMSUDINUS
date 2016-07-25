<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_course', function (Blueprint $table) {
      $table->integer('course_id')->unsigned();
      $table->integer('user_id')->unsigned();
      $table->char('type',1);
      $table->timestamps();


      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_course');
    }
}
