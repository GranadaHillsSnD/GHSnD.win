<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media', function (Blueprint $table) {
            $table->increments('social_media_id');
            $table->string('username');
            $table->string('tweet');
            $table->string('imgUrl');
            $table->string('caption');
            $table->string('message');
            $table->string('source');
            $table->integer('approver_id');
            $table->timestamp('datetime_posted');
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
        Schema::drop('social_media');
    }
}
