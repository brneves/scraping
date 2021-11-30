<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcacao extends Model
{
    use HasFactory;

    protected $table = 'marcacoes';

    protected $fillable = [
        'marcacao',
        'url'
    ];

    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }

    public function tipoMarcacao()
    {
        return $this->belongsTo(TipoMarcacao::class);
    }

    public function provedor()
    {
        return $this->belongsTo(Provedor::class);
    }
}
