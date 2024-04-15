<?php

namespace App\Providers;

use App\Models\Page;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    $pages = Page::where('parent_id',Page::where('slug','about')->first()->id)
            ->where('navbar','Active')->get();
    View::composer('user.about.*', function ($view) use($pages) {
            $view->with('VCpages', $pages);
        });
        // Paginator::useBootstrap(); // here we have added code.
    }
}
