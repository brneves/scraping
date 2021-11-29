<?php

namespace App\Observers;

use App\Models\Perfil;
use Illuminate\Support\Str;

class PerfilObserver
{
    public function creating(Perfil $perfil)
    {
        $perfil->uuid = Str::uuid();
    }
}
