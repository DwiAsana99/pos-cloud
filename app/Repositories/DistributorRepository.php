<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\Distributor;
use Fungsi;

class DistributorRepository extends Repository
{
    public function __construct(Distributor $distributor) 
    {
        $this->model = $distributor;
    }

    public function distributorAktif() 
    {
        $data = $this->model->where('IS_AKTIF',1);
        return $data;
    }

    public function AutoKode() 
    {
        $lastKode = $this->model->where('IS_AKTIF',1)
                    ->max('KODE_DISTRIBUTOR');
        $newKode = Fungsi::KodeGenerate2($lastKode,1,'D','4');
        return $newKode;
    }

    public function select2($term) 
    {
        $datas = $this->model->select('KODE_DISTRIBUTOR','NAMA_DISTRIBUTOR')
        ->when(!empty($term), function ($query) use ($term) {
            return $query->where('NAMA_DISTRIBUTOR', 'LIKE', '%'. $term .'%');
        })->get();

        return $datas;
    }
}
