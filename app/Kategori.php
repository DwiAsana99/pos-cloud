<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'm_kategori';

    protected $guarded = [];

    public $timestamps = FALSE;

    public function departemen() 
    {
        return $this->HasOne('App\Departemen','KODE_DEPARTEMEN','KODE_DEPARTEMEN');
    }
}
