<?php

namespace App\Repositories;

use App\Repositories\Repository;
use App\Operator;

class OperatorRepository extends Repository
{
    public function __construct(Operator $operator) 
    {
        $this->model = $operator;
    }
}
