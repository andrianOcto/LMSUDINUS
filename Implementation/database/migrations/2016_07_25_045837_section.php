<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Section extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('section', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('course_id')->unsigned();
      $table->char('title',45);
      $table->string('description');
      $table->char('status',1);
      $table->timestamps();

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
        //
    }
}
