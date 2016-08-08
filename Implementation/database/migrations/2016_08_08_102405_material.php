<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Material extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('material', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('content_id')->unsigned();
          $table->char('filename',255);
          $table->char('url',255);
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
