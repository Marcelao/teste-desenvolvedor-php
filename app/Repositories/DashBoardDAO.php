<?php

namespace App\Repositories;
use App\Models\DashBoard;


class DashBoardDAO
{
    /*
    * @var DashBoard
    */
    private $model;
    
    public function __construct(DashBoard $a)
    {
        $this->model = $a;
    }
}
