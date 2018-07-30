<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'm_divisi';
    protected $fillable = ['KODE_DIVISI','DIVISI'];
    public $timestamps = FALSE;
}
