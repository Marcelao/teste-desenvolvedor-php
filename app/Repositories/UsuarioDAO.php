<?php

namespace App\Repositories;
use App\Models\Usuario;


class UsuarioDAO
{
    /**
     * @var Usuario
     */
    private $model;
    

    public function __construct(Usuario $a)
    {
        $this->model = $a;
    }

    public function listar($nome = '')
    {
        $select = $this->model
            ->where("nome", "like", $nome."%");
        return $select->get();
    }
    
}
