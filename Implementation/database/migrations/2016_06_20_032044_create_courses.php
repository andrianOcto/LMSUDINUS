<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('courses', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('creator_id')->unsigned();
          $table->char('code',45)->unique();
          $table->char('name',45);
          $table->string('description');
          $table->smallInteger('credit');
          $table->char('status',1);
          $table->timestamps();

          $table->foreign('creator_id')->references('id')->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courses');
    }
}
