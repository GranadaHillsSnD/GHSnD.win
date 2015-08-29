<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('calendar_details', function (Blueprint $table) {
          $table->increments('details_id');
          $table->integer('id');
          $table->string('address1');
          $table->string('address2');
          $table->string('city');
          $table->string('state');
          $table->string('zip');
          $table->string('contact');
          $table->string('contact_phone');
          $table->string('contact_email');
          $table->string('description');
          $table->string('file1_name');
          $table->string('file1');
          $table->string('file2_name');
          $table->string('file2');
          $table->string('file3_name');
          $table->string('file3');
          $table->string('file4_name');
          $table->string('file4');
          $table->string('file5_name');
          $table->string('file5');
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
      Schema::drop('calendar_details');
  }
}
