<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'm_barang';
    protected $guarded = [];
    public $timestamps = FALSE;

    public function subkategori()
    {
        return $this->HasOne('App\Subkategori','KODE_SUB_KATEGORI','KODE_SUB_KATEGORI');
    }

    public function distributor_divisi() 
    {
        return $this->HasOne('App\DistributorDivisi','KODE_DISTRIBUTOR_DIVISI','KODE_DISTRIBUTOR_DIVISI');
    }
}
