<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DefaultsClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            // $table->text('text')->change();
            $table->string('interior_num')->nullable()->change();
            $table->string('rfc')->nullable()->change();
            $table->string('billing_contact')->nullable()->change();
            $table->integer('billing_c_phone')->nullable()->change();
            $table->string('billing_c_email')->nullable()->change();
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
