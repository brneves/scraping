<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provedor extends Model
{
    use HasFactory;

    public function servico()
    {
        return $this->hasMany(Marcacao::class);
    }
}
