<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\Pelanggan;
use Fungsi;

class PelangganRepository extends Repository
{
    public function __construct(Pelanggan $pelanggan) 
    {
        $this->model = $pelanggan;
    }

    public function AutoKode() 
    {
        $lastKode = $this->model->max('KODE_PELANGGAN');
        $newKode = Fungsi::KodeGenerate2($lastKode,2,'CU',3);
        return $newKode;
    }
}
