<?php
use App\Http\Controllers\Admin\AboutUs\AchievementsController;
use App\Http\Controllers\Admin\AboutUs\AwardsController;
use App\Http\Controllers\Admin\AboutUs\CareersController;
use App\Http\Controllers\Admin\AboutUs\CertificatesController;
use App\Http\Controllers\Admin\AboutUs\ClientsController;
use App\Http\Controllers\Admin\AboutUs\IdentityController;
use App\Http\Controllers\Admin\AboutUs\InvestorsController;
use App\Http\Controllers\Admin\AboutUs\OurTeamController;
use App\Http\Controllers\Admin\AboutUs\PartnersController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Education\EducationController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\profile\AdminController;
use App\Http\Controllers\Admin\profile\RoleController;
use App\Http\Controllers\Admin\profile\UsersController;
use App\Http\Controllers\Admin\Projects\ProjectController;
use App\Http\Controllers\Admin\Projects\Tabs\AboutController;
use App\Http\Controllers\Admin\Projects\Tabs\AboutTabsController;
use App\Http\Controllers\Admin\Projects\Tabs\HelpTabsController;
use App\Http\Controllers\Admin\Projects\Tabs\JoinusTabsController;
use App\Http\Controllers\Admin\Projects\Tabs\ArchiveTabsController;
use App\Http\Controllers\Admin\Projects\Tabs\ProgramTabsController;
use App\Http\Controllers\Admin\Solution\SolutionController;
use App\Http\Controllers\Admin\StaticTableController;
use App\Http\Controllers\Admin\Testing\TestingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\Solution\Tabs\SolutionTabController;

Route::middleware('authAdmin:admin')->group(function () {
    Route::get('/',DashboardController::class)->name('dashboard');
    Route::resource('admins',AdminController::class);
    Route::resource('users',UsersController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('pages', PagesController::class);
    Route::name('about.')->prefix('about')->group(function(){
        Route::resource('identity', IdentityController::class);
        Route::resource('investors', InvestorsController::class);
        Route::get('investors/many/{id?}', [InvestorsController::class,'many'])->name('investors.many');
        Route::put('investors/manypost/{id}', [InvestorsController::class,'manypost'])->name('investors.manypost');
        Route::delete('investors/manydelete/{id}', [InvestorsController::class,'manydelete'])->name('investors.manydelete');
        Route::resource('achievements', AchievementsController::class);
        Route::resource('awards', AwardsController::class);
        Route::resource('certificates', CertificatesController::class);
        Route::resource('our-team', OurTeamController::class);
        Route::resource('careers', CareersController::class);
        Route::resource('partners', PartnersController::class);
        Route::resource('clients', ClientsController::class);
    });
        Route::resource('project', ProjectController::class);
        Route::name('tabproject.')->prefix('tab-project')->group(function(){
        Route::resource('about', AboutTabsController::class);
        Route::get('section-two/create', [AboutTabsController::class,'createSectionTwo'])->name('about_sectionTwo');
        Route::get('section-two/edit', [AboutTabsController::class,'createSectionTwo'])->name('edit_about_sectionTwo');
        Route::resource('program', ProgramTabsController::class);
        Route::resource('archive', ArchiveTabsController::class);
        Route::get('Archive/download/{id}', [ArchiveTabsController::class,'download'])->name('archiveDownload');
        Route::get('program/download/{id}', [ProgramTabsController::class,'download'])->name('programTabDownload');
        Route::get('help/contactus/create', [HelpTabsController::class,'createcontactus'])->name('help_contactus');
        Route::get('help/contactus/edit/{id?}', [HelpTabsController::class,'editcontactus'])->name('edit_help_contactus');
        Route::resource('help', HelpTabsController::class);
        Route::resource('joinus', JoinusTabsController::class);
        });


         // clear route
               // clear route
        Route::get('/route-clear', function () {
            Artisan::call('view:clear');
            Artisan::call('cache:clear');
            Artisan::call('route:clear');
            Artisan::call('config:clear');
            return 'Route cache cleared successfully.';
        });
    // end optimization route
// slider
    Route::prefix('settings')->group(function(){
    Route::resource('slider', SliderController::class)->names('slider');
        });
        Route::resource('education', EducationController::class);
        Route::resource('testing', TestingController::class);
        Route::resource('solution', SolutionController::class);
        Route::name('tabsolution.')->prefix('tab-solution')->group(function(){
            Route::resource("", SolutionTabController::class);
            Route::get('/{solution}', [SolutionTabController::class,'show']);
            Route::get('/{solution}/edit', [SolutionTabController::class,'edit']);


            });
});
