<?php

namespace App\Providers;

use App\Models\Cargo;
use App\Models\Perfil;
use App\Models\Permissao;
use App\Models\Tenant;
use App\Models\User;
use App\Observers\CargoObserver;
use App\Observers\PerfilObserver;
use App\Observers\PermissaoObserver;
use App\Observers\TenantObserver;
use App\Observers\UserObserver;
use App\Repositories\Contracts\TenantRepositoryInterface;
use App\Repositories\TenantRepository;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TenantRepositoryInterface::class, TenantRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Tenant::observe(TenantObserver::class);
        Perfil::observe(PerfilObserver::class);
        Cargo::observe(CargoObserver::class);
        Permissao::observe(PermissaoObserver::class);
        User::observe(UserObserver::class);

        $this->app['request']->server->set('HTTPS', $this->app->environment() != 'local');

        /**
         * if customizável
         */
        Blade::if('admin', function (){
            $user = auth()->user();

            return $user->isAdmin();
        });
    }
}
