<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Categoria;
use App\Models\Curso;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('*', function($view) {
            $categories = Categoria::all()->where('deleted_at',null);
            $courses = Curso::where('categoria_id',null)
                        ->orderBy('created_at','DESC')
                        ->get();
            $view
            ->with(compact('categories'))
            ->with(compact('courses'));
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
        // $this->app->bind('path.public',function(){
        //     return base_path().'/public_html';
        // });
    }
}
