<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_distributor', function (Blueprint $table) {
            $table->string('KODE_DISTRIBUTOR',10)->primary();
            $table->string('NAMA_DISTRIBUTOR',50);
            $table->string('ALAMAT',100);
            $table->string('PIC',50);
            $table->string('HP',100);
            $table->string('EMAIL',50);
            $table->string('NO_NPWP',100);
            $table->integer('IS_PKP');
            $table->string('KETERANGAN',200);
            $table->integer('IS_AKTIF');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_distributor');
    }
}
