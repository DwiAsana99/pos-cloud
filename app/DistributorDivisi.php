<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistributorDivisi extends Model
{
    protected $table = 'm_distributor_divisi';
    protected $guarded = [];
    public $timestamps = FALSE;

    public function distributor() 
    {
        return $this->HasOne('App\Distributor','KODE_DISTRIBUTOR','KODE_DISTRIBUTOR');
    }
}
