<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\Departemen;
use Fungsi;

class DepartemenRepository extends Repository
{
    public function __construct(Departemen $departemen) 
    {
        $this->model = $departemen;
    }

    public function depRelasi($relation = array('divisi')) 
    {
        return $this->model->with($relation);
    }

    public function select2($term) 
    {
        $datas = $this->model->select('KODE_DEPARTEMEN','DEPARTEMEN')
        ->when(!empty($term), function ($query) use ($term) {
            return $query->where('DEPARTEMEN', 'LIKE', '%'. $term .'%');
        })->get();

        return $datas;
    }

    public function AutoKode($lenght,$divisi) 
    {
        $lastKode = $this->model->whereRaw('SUBSTRING(KODE_DEPARTEMEN,1,'.$lenght.') = "'.$divisi.'"')
                    ->max('KODE_DEPARTEMEN');
        $NewKode = Fungsi::KodeGenerate($lastKode,$lenght,$divisi);
        return $NewKode;
    }
}
