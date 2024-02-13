<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id_booking');
            $table->string('booking_id');
            $table->dateTime('tgl_booking');
            $table->integer('agent_id');
            $table->dateTime('check_in');
            $table->dateTime('check_out');
            $table->string('mata_uang');
            $table->text('keterangan');
            $table->decimal('total_discount', 10, 2);
            $table->decimal('total_subtotal', 10, 2);
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
        Schema::dropIfExists('bookings');
    }
}
