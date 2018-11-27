<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Categoria;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view) {
            $categorias = Categoria::all()->where('deleted_at',null);
            $view->with('categorias', $categorias);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
