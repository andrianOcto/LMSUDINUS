<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Content extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('content', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('section_id')->unsigned();
          $table->integer('post_id')->unsigned();
          $table->char('title',45);
          $table->string('description');
          $table->date('available_from');
          $table->date('available_until');
          $table->char('status',1);
          $table->char('type',1);
          $table->timestamps();

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
