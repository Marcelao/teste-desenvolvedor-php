<?php

namespace App\Repositories;

use App\Models\PedidoSituacao;

class PedidoSituacaoDAO
{
    /**
     * @var PedidoSituacao 
     */
    private $model;
    
    public function __construct(PedidoSituacao $a)
    {
        $this->model = $a;
    }

    public function listar($descricao = '')
    {
        $select = $this->model
            ->where('descricao', 'like', $descricao."%");
        return $select->get();
    }

    public function listar_id($id = '')
    {
        $select = $this->model
            ->where('id', 'like', $id."%");
        return $select->get();
    }
}
