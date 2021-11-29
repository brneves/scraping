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

}
