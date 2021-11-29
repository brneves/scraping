<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    use HasFactory;

    protected $fillable = [
        'plano',
        'slug',
        'preco',
        'descricao',
        'stripe_id',
        'recomendado',
        'cobranca'
    ];

    public function getPrecoAttribute()
    {
        return $this->attributes['preco'] / 100;
    }

    public function setPrecoAttribute($prop)
    {
        $preco = str_replace('.', '', $prop);
        return $this->attributes['preco'] = str_replace(',', '', $preco);
    }

    /*
    public function setPrecoAttribute($prop)
    {
        return $this->attributes['preco'] = $prop * 100;
    }
    */

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    public function detalhes()
    {
        return $this->hasMany(DetalhePlano::class);
    }

    public function perfis()
    {
        return $this->belongsToMany(Perfil::class, 'plano_perfil');
    }

    /**
     * Perfis não vinculados ao plano
     */
    public function perfisDisponiveis($filtro = null)
    {
        $perfis = Perfil::whereNotIn('id', function ($query){
            $query->select('plano_perfil.perfil_id');
            $query->from('plano_perfil');
            $query->whereRaw("plano_perfil.plano_id={$this->id}");
        })
            ->where(function ($queryFiltro) use ($filtro){
                if ($filtro)
                    $queryFiltro->where('perfis.nome', 'LIKE', "%{$filtro}%");
            })
            ->paginate();

        return $perfis;
    }
}
