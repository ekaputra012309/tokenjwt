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
            $table->string('booking_id');
            $table->integer('hotel_id');
            $table->integer('room_id');
            $table->integer('qty');
            $table->dateTime('check_in');
            $table->dateTime('check_out');
            $table->integer('malam');
            $table->string('mata_uang');
            $table->decimal('tarif', 10 , 2);
            $table->decimal('discount', 10 , 2);
            $table->decimal('subtotal', 10 , 2);
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
