<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('color');
            $table->string('description', 5000);
            $table->string('location');
            $table->string('file1_name')->nullable();
            $table->string('file1_url')->nullable();
            $table->string('file2_name')->nullable();
            $table->string('file2_url')->nullable();
            $table->datetime('start');
            $table->datetime('end');
            $table->boolean('all_day');
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
        Schema::drop('calendar_events');
    }
}
