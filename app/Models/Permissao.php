<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    use HasFactory;

    protected $table = 'permissoes';

    protected $fillable = [
        'uuid',
        'permissao',
        'descricao'
    ];

    public function cargos()
    {
        return $this->belongsToMany(Cargo::class, 'permissions_roles');
    }
}
