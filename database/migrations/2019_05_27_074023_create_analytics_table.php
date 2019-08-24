<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalyticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analytics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status_code');
            $table->string('ip_address');
            $table->string('country_code');
            $table->string('country_name');
            $table->string('clientIP');
            $table->string('region_name');
            $table->string('city_name');
            $table->string('zip_code');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('timezone');
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
        Schema::dropIfExists('analytics');
    }
}
