<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_barang', function (Blueprint $table) {
            $table->increments('ID_BARANG');
            $table->string('KODE_SUB_KATEGORI',10);
            $table->string('KODE_DISTRIBUTOR_DIVISI',20);
            $table->string('BARCODE',50);
            $table->string('NAMA_BARANG',50);
            $table->string('SATUAN',20);
            $table->decimal('MARGIN',5,3);
            $table->decimal('HARGA_POKOK',15,2);
            $table->decimal('HARGA_BELI_TERAKHIR',15,2);
            $table->decimal('HARGA_JUAL',15,2);
            $table->decimal('QTY2',5,2);
            $table->decimal('HARGA_JUAL2',15,2);
            $table->decimal('QTY3',5,2);
            $table->decimal('HARGA_JUAL3',15,2);
            $table->decimal('MARGIN2',5,2);
            $table->decimal('STOK',10,3);
            $table->decimal('STOK_MAX',10,3);
            $table->decimal('STOK_MIN',10,3);
            $table->char('ABC',1);
            $table->integer('IS_BKP');
            $table->integer('IS_AKTIF');
            $table->integer('IS_HARGA_TETAP');
            $table->integer('IS_KONSINYASI');
            $table->string('TGL_REGISTER');
            $table->string('TGL_STOK_AWAL');
            $table->decimal('STOK_AWAL',10,3);
            $table->string('KODE_PC',50);
            $table->decimal('MARGIN3',5,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_barang');
    }
}
