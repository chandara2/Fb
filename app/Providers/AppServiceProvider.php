<?php

namespace App\Providers;

use App\Models\FooterContact;
use App\Models\FooterQrcode;
use App\Models\FooterSocialMedia;
use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

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

        View::composer('*', function ($view) {
            $footercontact = FooterContact::all();
            $footersm = FooterSocialMedia::all();
            $footerqrcode = FooterQrcode::all();
            return $view->with([
                'footercontact'=>$footercontact,
                'footersm'=>$footersm,
                'footerqrcode'=>$footerqrcode,
            ]);
        });
    }
}
