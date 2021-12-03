<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provedor extends Model
{
    use HasFactory;

    protected $table = 'provedores';

    protected $fillable = [
        'provedor'
    ];

    public function marcacoes()
    {
        return $this->hasMany(Marcacao::class, 'provedores_id');
    }
}
