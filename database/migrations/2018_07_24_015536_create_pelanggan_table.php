<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_pelanggan', function (Blueprint $table) {
            $table->string('KODE_PELANGGAN')->primary();
            $table->string('NAMA_PELANGGAN');
            $table->string('ALAMAT');
            $table->string('NO_HP');
            $table->string('EMAIL');
            $table->string('NPWP');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_pelanggan');
    }
}
