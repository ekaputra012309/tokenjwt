<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_details', function (Blueprint $table) {
            $table->increments('id_booking_detail');
            $table->integer('booking_id');
            $table->integer('hotel_id');
            $table->integer('room_id');
            $table->integer('qty');
            $table->dateTime('check_in');
            $table->dateTime('check_out');
            $table->integer('malam');
            $table->string('mata_uang');
            $table->integer('tarif');
            $table->integer('discount');
            $table->integer('subtotal');
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
        Schema::dropIfExists('booking_details');
    }
}
