<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartemenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_departemen', function (Blueprint $table) {
            $table->string('KODE_DEPARTEMEN',4)->primary();
            $table->string('KODE_DIVISI',2);
            $table->string('DEPARTEMEN',50);
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
        Schema::dropIfExists('m_departemen');
    }
}
