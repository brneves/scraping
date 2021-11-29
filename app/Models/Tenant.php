<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'cpf_cnpj',
        'nome',
        'slug',
        'email',
        'logo',
        'porcentagem',
        'status',
        'data_inscricao',
        'data_expiracao',
        'reference_transaction',
        'inscricao_status'
    ];

    /**
     * Retorna os usuários do tenant
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Retorna o plano que no qual o tenant se cadastrou
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plano()
    {
        return $this->belongsTo(Plano::class);
    }

    /**
     * Retorna os clientes do tenant
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    /**
     * Retorna os produtos do tenant
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }

    public function faturas()
    {
        return $this->hasMany(Fatura::class);
    }

    public function categoriasFatura()
    {
        return $this->hasMany(CategoriaFatura::class);
    }

    public function compras()
    {
        return $this->hasMany(Compra::class);
    }

    public function categorias()
    {
        return $this->hasMany(CategoriaProduto::class);
    }

}
