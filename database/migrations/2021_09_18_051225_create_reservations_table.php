<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('venue');
            $table->string('motif');
            $table->string('guests_no');
            $table->dateTime('r_date');
            $table->string('r_type');
            $table->string('special_req')->nullable();
            $table->string('total_payment');
            $table->string('downpayment');
            $table->string('gcash_name');
            $table->string('upload_image');
            $table->dateTime('dp_date_time');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('reservations');
    }
}
