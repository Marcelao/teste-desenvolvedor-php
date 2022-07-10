<?php

namespace App\Repositories;

use App\Models\Cliente;


class ClienteDAO
{
    /**
     * @var Cliente
     */
    private $model;

    public function __construct(Cliente $a)
    {
        $this->model = $a;
    }

    public function listar($nome = '')
    {
        $select = $this->model
            ->where('nome', 'like', $nome."%");
        return $select->get();
    }

    public function listar_id($id = '')
    {
        $select = $this->model
            ->where('id', 'like', $id."%");
        return $select->get();
    }
}
