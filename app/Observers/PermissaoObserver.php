<?php

namespace App\Observers;

use App\Models\Permissao;
use Illuminate\Support\Str;

class PermissaoObserver
{
    public function creating(Permissao $permissao)
    {
        $permissao->uuid = Str::uuid();
    }
}
