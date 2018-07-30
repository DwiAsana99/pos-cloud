<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\Kategori;
use Fungsi;

class KategoriRepository extends Repository
{
    public function __construct(Kategori $kategori) 
    {
        $this->model = $kategori;
    }

    public function kategoriRelasi($relation = array('departemen')) 
    {
        return $this->model->with($relation);
    }

    public function select2($term) 
    {
        $datas = $this->model->select('KODE_KATEGORI','KATEGORI')
        ->when(!empty($term), function ($query) use ($term) {
            return $query->where('KATEGORI', 'LIKE', '%'. $term .'%');
        })->get();

        return $datas;
    }

    public function AutoKode($lenght,$departemen) 
    {
        $lastKode = $this->model->whereRaw('SUBSTRING(KODE_KATEGORI,1,'.$lenght.') = "'.$departemen.'"')
                    ->max('KODE_KATEGORI');
        $NewKode = Fungsi::KodeGenerate($lastKode,$lenght,$departemen);
        return $NewKode;
    }
}
