<?php

use App\Http\Controllers\Admin\SidebarResource\SidebarResourceController;
use App\Http\Controllers\User\AboutUs\AboutController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\ContactUs\ContactUsController;
use App\Http\Controllers\User\DocValidation\DocValidationController;
use App\Http\Controllers\User\Education\EducationController;
use App\Http\Controllers\User\FindUs\FindUsController;
use App\Http\Controllers\User\Projects\ProjectController;
use App\Http\Controllers\User\ResourceController;
use App\Http\Controllers\User\Solution\SolutionController;
use App\Http\Controllers\User\Technology\TechnologyContoller;
use App\Http\Controllers\User\Testing\TestingContoller;
use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Web\BlogDetailsController;
use App\Http\Controllers\Web\HomeController;
use App\Models\Page;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'about', 'as' => 'about.', 'name' => 'about.'], function () {
    Route::get('identity', [AboutController::class, 'identity'])->name('identity');
    Route::get('investors', [AboutController::class, 'investors'])->name('investors');
    Route::get('achievements', [AboutController::class, 'achievements'])->name('achievements');

    Route::get('awards', [AboutController::class, 'awards'])->name('awards');
    Route::get('certificates', [AboutController::class, 'certificates'])->name('certificates');
    Route::get('partners', [AboutController::class, 'partners'])->name('partners');
    Route::get('clients', [AboutController::class, 'clients'])->name('clients');
    Route::get('careers', [AboutController::class, 'careers'])->name('careers');
    Route::get('our-team', [AboutController::class, 'our_team'])->name('our-team');
});

Route::group(['prefix' => 'solutions', 'as' => 'solutions.', 'name' => 'solutions.'], function () {

    foreach (Page::where('parent_id', Page::where('slug', 'solutions')->first()->id)->get() as $page) {
        // dd($page->slug);
        Route::get($page->slug . "/{page_id}", [SolutionController::class, 'index'])->name($page->slug);
        // Route::get('index', [SolutionController::class, 'index'])->name('education');
    }

});

Route::group(['prefix' => 'education', 'as' => 'education.', 'name' => 'education.'], function () {
    foreach (Page::where('parent_id', Page::where('slug', 'education')->first()->id)->get() as $page) {
        // dd($page->slug);
        Route::get($page->slug, [EducationController::class, 'index'])->name($page->slug);
        // Route::get('index', [SolutionController::class, 'index'])->name('education');
    }
});

Route::group(['prefix' => 'testing', 'as' => 'testing.', 'name' => 'testing.'], function () {
    foreach (Page::where('parent_id', Page::where('slug', 'testing')->first()->id)->get() as $page) {
        Route::get($page->slug, [TestingContoller::class, 'index'])->name($page->slug);
    }
});

Route::group(['prefix' => 'technology', 'as' => 'technology.', 'name' => 'technology.'], function () {
    foreach (Page::where('parent_id', Page::where('slug', 'technology')->first()->id)->get() as $page) {
        Route::get($page->slug, [TechnologyContoller::class, 'index'])->name($page->slug);
    }
});

Route::group(['prefix' => 'projects', 'as' => 'projects.', 'name' => 'projects.'], function () {
    foreach (Page::where('parent_id', Page::where('slug', 'projects')->first()->id)->get() as $page) {
        // dd($page->slug);
        Route::get($page->slug, [ProjectController::class, 'index'])->name($page->slug);
    }
});

Route::group(['prefix' => 'doc-validation', 'as' => 'doc-validation.', 'name' => 'doc-validation.'], function () {
    foreach (Page::where('parent_id', Page::where('slug', 'doc-validation')->first()->id)->get() as $page) {
        Route::get($page->slug, [DocValidationController::class, 'index'])->name($page->slug);
    }
});

Route::group(['prefix' => 'find-us', 'as' => 'find-us.', 'name' => 'find-us.'], function () {
    foreach (Page::where('parent_id', Page::where('slug', 'find-us')->first()->id)->get() as $page) {
        Route::get($page->slug, [FindUsController::class, 'index'])->name($page->slug);
        
    }
});
Route::get('find-us/data', [FindUsController::class, 'getData'])->name('find-us.data');
Route::get('resources-data', [ResourceController::class, 'getResources'])->name('resources-data.get');
Route::get('sidebar-resources-upper-data', [SidebarResourceController::class, 'getUpperResources'])->name('sidebar-resources-upper-data.get');
Route::get('sidebar-resources-lower-data', [SidebarResourceController::class, 'getLowerResources'])->name('sidebar-resources-lower-data.get');

//Projects Routes
Route::get('Projects/{slug?}/{id?}', [ProjectController::class, 'index'])->name('projects');
Route::get('contact-us/{param?}', [ContactUsController::class, 'index'])->name('contact-us');
Route::resource('contacts', ContactController::class)->only('store');
Route::get('get-team-members/{id}', [AboutController::class, 'getData'])->name('get-team-members');
Route::get('get-companies/{type}', [AboutController::class, 'getCompanies'])->name('get-companies');
Route::get('blogs', BlogController::class)->name('blogs.index');
Route::get('blogs/details/{blog}', BlogDetailsController::class)->name('blogs.details');
Route::get('/', [HomeController::class, 'getHome'])->name('web.home');

//