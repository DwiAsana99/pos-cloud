<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\DistributorDivisi;
use Fungsi;

class DistributorDivisiRepository extends Repository
{
    public function __construct(DistributorDivisi $distributorDivisi) 
    {
        $this->model = $distributorDivisi;
    }

    public function distributor_divisiRelasi($relation = ['distributor']) 
    {
        $data = $this->model->with($relation)->where('IS_AKTIF',1);
        return $data;
    }

    public function AutoKode($lenght, $distributor) 
    {
        $lastKode = $this->model->whereRaw('SUBSTR(KODE_DISTRIBUTOR_DIVISI,1,'.$lenght.') = "'.$distributor.'"')
                    ->where('IS_AKTIF',1)
                    ->max('KODE_DISTRIBUTOR_DIVISI');
        $newKode = Fungsi::KodeGenerate($lastKode,(int)$lenght+1,$distributor,'-');
        return $newKode;
    }

    public function select2($term) 
    {
        $datas = $this->model->select('KODE_DISTRIBUTOR_DIVISI','NAMA_DISTRIBUTOR_DIVISI')
        ->when(!empty($term), function ($query) use ($term) {
            return $query->where('NAMA_DISTRIBUTOR_DIVISI', 'LIKE', '%'. $term .'%');
        })->get();

        return $datas;
    }
}
