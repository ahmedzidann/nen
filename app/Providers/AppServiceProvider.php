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
    $educationPages = Page::where('parent_id',Page::where('slug','education')->first()->id)
    ->where('navbar','Active')->get();
    $testingPages = Page::where('parent_id',Page::where('slug','testing')->first()->id)
    ->where('navbar','Active')->get();

    $solutionPages = Page::where('parent_id',Page::where('slug','solutions')->first()->id)
    ->where('navbar','Active')->get();
    $projectPages = Page::where('parent_id',Page::where('slug','Projects')->first()->id)
    ->where('navbar','Active')->get();


    View::composer('user.about.*', function ($view) use($pages) {
            $view->with('VCpages', $pages);
        });
    View::composer('user.education.*', function ($view) use($educationPages) {
        $view->with('Spages', $educationPages);
    });
    View::composer('user.testing.*', function ($view) use($testingPages) {
        $view->with('Tpages', $testingPages);
    });
    View::composer('user.projects.*', function ($view) use($projectPages) {

        $view->with('projectPages', $projectPages);
    });
    View::composer('*', function ($view) use($solutionPages) {

        $view->with('ss', $solutionPages);
    });

        // Paginator::useBootstrap(); // here we have added code.
    }
}
