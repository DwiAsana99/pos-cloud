<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetodePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_metode_pembayaran', function (Blueprint $table) {
            $table->increments('ID_METODE');
            $table->string('METODE',50);
            $table->integer('IS_DEBET');
            $table->decimal('CHARGE',5,3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_metode_pembayaran');
    }
}
