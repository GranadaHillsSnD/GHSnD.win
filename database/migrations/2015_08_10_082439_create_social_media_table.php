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
            $table->string('insta_id');
            $table->string('username');
            $table->string('profile_pic_url');
            $table->string('tweet');
            $table->string('caption', 5000)->nullable();
            $table->string('message', 10000)->nullable();
            $table->string('source');
            $table->string('link');
            $table->string('imgUrl');
            $table->integer('width');
            $table->integer('height');
            $table->string('resize');
            $table->string('approved');
            $table->integer('approver_id');
            $table->datetime('datetime_posted');
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
