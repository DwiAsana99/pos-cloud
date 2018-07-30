<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = 'm_departemen';

    protected $guarded = [];

    public $timestamps = FALSE;

    public function divisi() 
    {
        return $this->HasOne('App\Divisi','KODE_DIVISI','KODE_DIVISI');
    }
}
