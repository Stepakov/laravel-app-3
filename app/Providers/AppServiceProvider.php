<?php

namespace App\Providers;


use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $this->activeLinks();
    }

    public function activeLinks()
    {
        View::composer( 'layouts.layout', function( $view ) {
            $view->with( 'activeMain', request()->is( '/' ) ? 'active' : '' );
            $view->with( 'activeArticles', ( request()->is( 'articles' ) or request()->is( 'articles/*' ) ) ? 'active' : '' );
        });
    }
}
