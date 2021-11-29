<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use App\Traits\UserACLTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword;

class User extends Authenticatable
{
    use HasFactory, Notifiable, UserACLTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tenant_id',
        'foto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function scopeTenantUser(Builder $query)
    {
        return $query->where('tenant_id', auth()->user()->tenant_id);
    }


    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function cargos()
    {
        return $this->belongsToMany(Cargo::class, 'cargos_usuarios');
    }

    public function cargosDisponiveis($filtro = null)
    {
        $roles = Cargo::whereNotIn('cargos.id', function ($query){
            $query->select('cargos_usuarios.cargo_id');
            $query->from('cargos_usuarios');
            $query->whereRaw("cargos_usuarios.user_id={$this->id}");
        })
            ->where(function ($queryFiltro) use ($filtro){
                if ($filtro)
                    $queryFiltro->where('cargos.cargo', 'LIKE', "%{$filtro}%");
            })
            ->paginate();

        return $roles;
    }

}
