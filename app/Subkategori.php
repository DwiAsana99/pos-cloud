<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subkategori extends Model
{
    protected $table = 'm_subkategori';

    protected $guarded = [];

    public $timestamps = FALSE;

    public function kategori() 
    {
        return $this->HasOne('App\Kategori','KODE_KATEGORI','KODE_KATEGORI');
    }
}
