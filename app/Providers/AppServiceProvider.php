<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\About;
use App\Models\Footer;
use App\Models\SidebarResource;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrapFive();
        $pages = Page::where('parent_id', Page::where('slug', 'about')->first()->id)
            ->where('navbar', 'Active')->get();
        $educationPages = Page::where('parent_id', Page::where('slug', 'education')->first()->id)
            ->where('navbar', 'Active')->get();
        $testingPages = Page::where('parent_id', Page::where('slug', 'testing')->first()->id)
            ->where('navbar', 'Active')->get();

        $solutionPages = Page::where('parent_id', Page::where('slug', 'solutions')->first()->id)
            ->where('navbar', 'Active')->get();
        $projectPages = Page::where('parent_id', Page::where('slug', 'Projects')->first()->id)
            ->where('navbar', 'Active')->get();
        $technologies = Page::where('parent_id', Page::where('slug', 'technology')->first()->id)
            ->where('navbar', 'Active')->get();

        $docs = Page::where('parent_id', Page::where('slug', 'doc-validation')->first()->id)
            ->where('navbar', 'Active')->get();

        $findus = Page::where('parent_id', Page::where('slug', 'find-us')->first()->id)
            ->where('navbar', 'Active')->get();

        $joinus = Page::where('parent_id', Page::where('slug', 'join-us')->first()->id)
            ->where('navbar', 'Active')->get();

        $footerData = Footer::where('status', 'Active')->get()->groupBy('type');
        $upperSection = SidebarResource::where('show_in_home', true)->where('type', 1)->latest()->get();
        $lowerSection = SidebarResource::where('show_in_home', true)->where('type', 2)->latest()->get();

        $about = About::first();
        View::composer('user.about.*', function ($view) use ($pages) {
            $view->with('VCpages', $pages);
        });
        View::composer('user.education.*', function ($view) use ($educationPages) {
            $view->with('Spages', $educationPages);
        });
        View::composer('user.testing.*', function ($view) use ($testingPages) {
            $view->with('Tpages', $testingPages);
        });
        View::composer('user.projects.*', function ($view) use ($projectPages) {
            $view->with('projectPages', $projectPages);
        });
        View::composer('user.technology.*', function ($view) use ($technologies) {

            $view->with('technologies', $technologies);
        });
        View::composer('user.doc-validation.*', function ($view) use ($docs) {

            $view->with('docs', $docs);
        });
         View::composer('user.join-us.*', function ($view) use ($joinus) {

            $view->with('joinus', $joinus);
        });
         
        View::composer('user.find-us.*', function ($view) use ($findus) {

            $view->with('findus', $findus);
        });
        View::composer('*', function ($view) use ($solutionPages) {

            $view->with('ss', $solutionPages);
        });
        View::composer('*', function ($view) use ($about, $upperSection, $lowerSection) {

            $view->with('about', $about);
            $view->with('upperSection', $upperSection);
            $view->with('lowerSection', $lowerSection);
        });

        View::composer('*', function ($view) use ($footerData) {

            $view->with('footerData', $footerData);
        });


        // Paginator::useBootstrap(); // here we have added code.
    }
}
