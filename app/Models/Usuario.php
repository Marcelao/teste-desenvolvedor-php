<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Access;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = "usuario";
    protected $fillable = [
        'nome', 'email', 'senha'
    ];

    protected $hidden = [
        'senha'
    ];

    public function accesses()
    {
        //Não esqueça de usar a aclass Access: use App\Models\Access;
        return $this->hasMany(Access::class);
    }

    public function registerAccess()
    {
        return $this->access()->create([
            'usuario_id' => $this->id,
            'datetime' => date('YmdHis'),
        ]);
    }
}
