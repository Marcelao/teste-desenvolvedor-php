<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\EmissaoPedidoDAORepository;
use App\Entities\EmissaoPedidoDAO;
use App\Validators\EmissaoPedidoDAOValidator;

/**
 * Class EmissaoPedidoDAORepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EmissaoPedidoDAORepositoryEloquent extends BaseRepository implements EmissaoPedidoDAORepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EmissaoPedidoDAO::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
