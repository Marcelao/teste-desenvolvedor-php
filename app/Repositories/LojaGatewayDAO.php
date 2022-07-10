<?php

namespace App\Repositories;

use App\Models\LojaGAteway;

class LojaGatewayDAO
{
    /**
     * @var LojaGateway
     */
    private $model;

    public function __construct(LojaGateway $a)
    {
        $this->model = $a;
    }

    public function listar($id_loja = '')
    {
        $select = $this->model
            ->where('id_loja', 'like', $id_loja.'%');
        return $select->get();
    }

    public function listar_id($id = '')
    {
        $select = $this->model
            ->where('id', 'like', $id."%");
        return $select->get();
    }
    
}
