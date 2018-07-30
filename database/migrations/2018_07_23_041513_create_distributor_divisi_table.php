<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributorDivisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_distributor_divisi', function (Blueprint $table) {
            $table->string('KODE_DISTRIBUTOR_DIVISI',20)->primary();
            $table->string('KODE_DISTRIBUTOR');
            $table->string('NAMA_DISTRIBUTOR_DIVISI');
            $table->string('NAMA_SALES');
            $table->string('NOHP_SALES');
            $table->integer('IS_AKTIF');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_distributor_divisi');
    }
}
