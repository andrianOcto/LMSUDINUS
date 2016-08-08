<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('post', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('course_id')->unsigned();
          $table->integer('response_to')->unsigned();
          $table->integer('user_id')->unsigned();
          $table->string('content');
          $table->char('url',255);
          $table->date('post_date');
          $table->char('status',1);

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
