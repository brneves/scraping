<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informacao extends Model
{
    use HasFactory;

    protected $table = 'informacoes';
    protected $fillable = [
        'chave',
        'valor'
    ];

    public function marcacao()
    {
        return $this->belongsTo(Marcacao::class);
    }

}
