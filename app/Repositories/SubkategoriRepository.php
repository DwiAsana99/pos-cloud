<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\Subkategori;
use Fungsi;

class SubkategoriRepository extends Repository
{
    public function __construct(Subkategori $subkategori) 
    {
        $this->model = $subkategori;
    }

    public function subkategoriRelasi($relation = array('kategori')) 
    {
        return $this->model->with($relation);
    }

    public function AutoKode($lenght,$kategori) 
    {
        $lastKode = $this->model->whereRaw('SUBSTRING(KODE_SUB_KATEGORI,1,'.$lenght.') = "'.$kategori.'"')
                    ->max('KODE_SUB_KATEGORI');
        $NewKode = Fungsi::KodeGenerate($lastKode,$lenght,$kategori);
        return $NewKode;
    }

    public function select2($term) 
    {
        $datas = $this->model->select('KODE_SUB_KATEGORI','SUB_KATEGORI')
        ->when(!empty($term), function ($query) use ($term) {
            return $query->where('SUB_KATEGORI', 'LIKE', '%'. $term .'%');
        })->get();

        return $datas;
    }
}
