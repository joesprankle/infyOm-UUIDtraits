<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToOrgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('address')->nullable();;
            $table->string('city')->nullable();;
            $table->string('state')->nullable();;
            $table->string('zip')->nullable();;
            $table->string('logo')->nullable();;
            $table->string('website')->nullable();;
            $table->string('email')->nullable();;
            $table->string('short_name')->nullable();;
            $table->string('abbv_name')->nullable();;
            $table->string('bio')->nullable();;
            $table->string('video')->nullable();;
            $table->string('video_cover')->nullable();;
            $table->string('photo')->nullable();;
            $table->string('api_key')->nullable();;
            $table->string('color_1')->nullable();;
            $table->string('color_2')->nullable();;
            $table->string('color_3')->nullable();;
            $table->string('color_background')->nullable();;
            $table->string('tagline')->nullable();;
            $table->string('gcm')->nullable();;
            $table->string('apns')->nullable();;
            $table->string('timezone')->nullable();;
            $table->string('sponsor_button_name')->nullable();;
            $table->string('GA')->nullable();;
            $table->boolean('free')->nullable();;
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
