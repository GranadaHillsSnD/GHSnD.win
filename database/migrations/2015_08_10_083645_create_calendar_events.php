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
            $table->increments('cal_event_id');
            $table->string('event_title');
            $table->datetime('event_start');
            $table->datetime('event_end');
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
        Schema::drop('calendar_events');
    }
}
