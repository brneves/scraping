<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMarcacao extends Model
{
    use HasFactory;

    protected $table = 'tipos_marcacao';

    protected $fillable = [
        'tipo'
    ];

    public function marcacoes()
    {
        return $this->belongsToMany(Marcacao::class);
    }
}
