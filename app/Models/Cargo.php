<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'cargo',
        'descricao'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'cargos_usuarios');
    }

    public function permissoes()
    {
        return $this->belongsToMany(Permissao::class, 'cargos_permissoes');
    }

    /**
     * Permissões não vinculadas ao perfil
     */
    public function permissoesDisponiveis($filtro = null)
    {
        $permissoes = Permissao::whereNotIn('id', function ($query){
            $query->select('cargos_permissoes.permissao_id');
            $query->from('cargos_permissoes');
            $query->whereRaw("cargos_permissoes.cargo_id={$this->id}");
        })
            ->where(function ($queryFiltro) use ($filtro){
                if ($filtro)
                    $queryFiltro->where('permissoes.permissao', 'LIKE', "%{$filtro}%");
            })
            ->get();

        return $permissoes;
    }
}
