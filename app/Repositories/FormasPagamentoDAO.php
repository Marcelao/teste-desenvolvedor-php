<?php

namespace App\Repositories;

use App\Models\FormasPagamento;

/**
 * Class FormasPagamentoDAO
 */
class FormasPagamentoDAO
{
    /**
     * @var FormasPagamento
     */
    private $model;

    public function __construct(FormasPagamento $a)
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
