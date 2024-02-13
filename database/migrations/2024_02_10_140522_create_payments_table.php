<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id_payment');
            $table->integer('id_booking');
            $table->dateTime('tgl_payment');
            $table->decimal('sar_idr', 10, 2);
            $table->decimal('sar_usd', 10, 2);
            $table->decimal('usd_idr', 10, 2);
            $table->string('mu_tagihan');
            $table->string('mu_deposit');
            $table->decimal('deposit', 10, 2);
            $table->string('metode_bayar');
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
        Schema::dropIfExists('payments');
    }
}
