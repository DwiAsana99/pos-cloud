<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\Divisi;
use Fungsi;

class DivisiRepository extends Repository
{
    public function __construct(Divisi $divisi) {
        $this->model = $divisi;
    }

    public function select2($term)
    {
        $datas = $this->model->select('KODE_DIVISI','DIVISI')
        ->when(!empty($term), function ($query) use ($term) {
            return $query->where('DIVISI', 'LIKE', '%'. $term .'%');
        })->get();

        return $datas;
    }

    public function AutoKode() 
    {
        $lastKode = $this->model->max('KODE_DIVISI');
        $NewKode = Fungsi::KodeGenerate($lastKode,'0');
        return $NewKode;
    }
}