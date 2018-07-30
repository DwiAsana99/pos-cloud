<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubkategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_subkategori', function (Blueprint $table) {
            $table->string('KODE_SUB_KATEGORI',10)->primary();
            $table->string('KODE_KATEGORI',7);
            $table->string('SUB_KATEGORI',50);
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
        Schema::dropIfExists('m_subkategori');
    }
}
