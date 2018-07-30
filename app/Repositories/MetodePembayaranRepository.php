<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\MetodePembayaran;

class MetodePembayaranRepository extends Repository
{
    public function __construct(MetodePembayaran $metodePembayaran) 
    {
        $this->model = $metodePembayaran;
    }
}
