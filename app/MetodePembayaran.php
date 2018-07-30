<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    protected $table = 'm_metode_pembayaran';
    protected $guarded = [];
    public $timestamps = FALSE;
}
