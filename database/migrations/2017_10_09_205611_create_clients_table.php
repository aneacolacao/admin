<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('business_name');
            $table->string('tradename');
            $table->string('street');
            $table->integer('exterior_num');
            $table->string('interior_num');
            $table->string('colony');
            $table->string('region');
            $table->string('city');
            $table->integer('zip_code');
            $table->string('country');
            $table->string('rfc');
            $table->string('main_contact');
            $table->integer('main_c_phone');
            $table->string('main_c_email');
            $table->string('billing_contact');
            $table->integer('billing_c_phone');
            $table->string('billing_c_email');
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
        Schema::dropIfExists('clients');
    }
}
