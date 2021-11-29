<?php

namespace App\Observers;

use App\Models\Cargo;
use Illuminate\Support\Str;

class CargoObserver
{
    public function creating(Cargo $cargo)
    {
        $cargo->uuid = Str::uuid();
    }
}
