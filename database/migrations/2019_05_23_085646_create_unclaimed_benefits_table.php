<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnclaimedBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unclaimed_benefits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('industry_number')->nullable();
            $table->integer('id_number')->nullable();
            $table->string('current_employer')->nullable();
            $table->string('previous_employer')->nullable();
            $table->integer('contact_number')->nullable();
            $table->string('hear')->nullable();
            $table->integer('status')->nullable();
            $table->string('first_name')->nullable();
            $table->string('maiden_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('email_address')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('unclaimed_benefits');
    }
}
