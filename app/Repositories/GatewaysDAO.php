<?php

namespace App\Repositories;

use App\Models\Gateways;

/**
 * Class GatewaysDAO
 */
class GatewaysDAO
{
    /**
     * @var Gateways
     */
    private $model;

    public function __construct(Gateways $a)
    {
        $this->model = $a;
    }

    public function listar($descricao = '')
    {
        $select = $this->model
            ->where('descricao', 'like', $descricao.'%');
        return $select->get();
    }

    public function listar_id($id = '')
    {
        $select = $this->model
            ->where('id', 'like', $id.'%');
        return $select->get();
    }

        
}
