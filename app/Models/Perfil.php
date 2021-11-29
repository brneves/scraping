<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfis';
    protected $fillable = [
        'uuid',
        'perfil',
        'descricao'
    ];



    public function permissoes()
    {
        return $this->belongsToMany(Permissao::class, 'perfis_permissoes');
    }

    /**
     * Permissões não vinculadas ao perfil
     */
    public function permissoesDisponiveis($filtro = null)
    {
        $permissoes = Permissao::whereNotIn('id', function ($query){
            $query->select('perfis_permissoes.permissao_id');
            $query->from('perfis_permissoes');
            $query->whereRaw("perfis_permissoes.perfil_id={$this->id}");
        })
            ->where(function ($queryFiltro) use ($filtro){
                if ($filtro)
                    $queryFiltro->where('permissoes.nome', 'LIKE', "%{$filtro}%");
            })
            ->get();

        return $permissoes;
    }

    public function planos()
    {
        return $this->belongsToMany(Plano::class, 'plano_perfil');
    }
}
