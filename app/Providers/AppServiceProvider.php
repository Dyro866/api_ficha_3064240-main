<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Importar Interfaces
use App\Interfaces\RolRepositoryInterface;
use App\Interfaces\ZonaRepositoryInterface;
use App\Interfaces\ClienteRepositoryInterface;
use App\Interfaces\EmpleadoRepositoryInterface;
use App\Interfaces\UsuarioRepositoryInterface;

// Importar Repositorios
use App\Repositories\RolRepository;
use App\Repositories\ZonaRepository;
use App\Repositories\ClienteRepository;
use App\Repositories\EmpleadoRepository;
use App\Repositories\UsuarioRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Vinculación de las 5 entidades
        $this->app->bind(RolRepositoryInterface::class, RolRepository::class);
        $this->app->bind(ZonaRepositoryInterface::class, ZonaRepository::class);
        $this->app->bind(ClienteRepositoryInterface::class, ClienteRepository::class);
        $this->app->bind(EmpleadoRepositoryInterface::class, EmpleadoRepository::class);
        $this->app->bind(UsuarioRepositoryInterface::class, UsuarioRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}