<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'm_pelanggan';
    protected $guarded = [];
    public $timestamps = FALSE;
}
