<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('subscribers', function (Blueprint $table) {
          $table->increments('subscriber_id');
          $table->string('email')->unique();
          $table->boolean('confirmed')->default(0);
          $table->string('code')->nullable();
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
         Schema::drop('subscribers');
     }
}
