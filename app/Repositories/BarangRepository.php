<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\Barang;
use DB;

class BarangRepository extends Repository
{
    public function __construct(Barang $barang)
    {
        $this->model = $barang;
    }

    public function barangRelasi($relation = ['subkategori','distributor_divisi']) 
    {
        DB::statement(DB::raw('set @rownum=0'));
        return $this->model->with($relation)
               ->select(['*',DB::raw('@rownum  := @rownum  + 1 AS no')]);
    }   
}
