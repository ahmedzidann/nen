<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AboutUs\AchievementsController;
use App\Http\Controllers\Admin\AboutUs\AwardsController;
use App\Http\Controllers\Admin\AboutUs\CareersController;
use App\Http\Controllers\Admin\AboutUs\CertificatesController;
use App\Http\Controllers\Admin\AboutUs\ClientsController;
use App\Http\Controllers\Admin\AboutUs\IdentityController;
use App\Http\Controllers\Admin\AboutUs\IdentityStatisticsController;
use App\Http\Controllers\Admin\AboutUs\InvestorsController;
use App\Http\Controllers\Admin\AboutUs\OurTeamController;
use App\Http\Controllers\Admin\AboutUs\PartnersController;
use App\Http\Controllers\Admin\Advertisement\AdvertisementController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Blog\MediaCategoryController;
use App\Http\Controllers\Admin\ContactUs\AuthorizedOfficeController;
use App\Http\Controllers\Admin\ContactUs\RegionalOfficeController;
use App\Http\Controllers\Admin\ContactUs\RegionalRepresentativeController;
use App\Http\Controllers\Admin\ContactUs\ServicesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DocValidation\DocValidationController;
use App\Http\Controllers\Admin\Education\EducationController;
use App\Http\Controllers\Admin\Education\EducationDescriptionController;
use App\Http\Controllers\Admin\FeatureAdvantages\FeatureAdvantagesController;
use App\Http\Controllers\Admin\FindUs\CategoryController;
use App\Http\Controllers\Admin\FindUs\CertificateController;
use App\Http\Controllers\Admin\FindUs\FindUsController;
use App\Http\Controllers\Admin\FindUs\LevelController;
use App\Http\Controllers\Admin\FindUs\SpecializationController;
use App\Http\Controllers\Admin\Footer\FooterController;
use App\Http\Controllers\Admin\InvestorStatisticsController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\Product\OrderController;
use App\Http\Controllers\Admin\Product\ProductCategoryController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\StoreSliderController;
use App\Http\Controllers\Admin\profile\AdminController;
use App\Http\Controllers\Admin\profile\RoleController;
use App\Http\Controllers\Admin\profile\UsersController;
use App\Http\Controllers\Admin\Joinus\JoinusController;
use App\Http\Controllers\Admin\Makeme\MakemeController;
use App\Http\Controllers\Admin\Projects\ProjectController;
use App\Http\Controllers\Admin\Projects\Tabs\AboutTabsController;
use App\Http\Controllers\Admin\Projects\Tabs\ArchiveTabsController;
use App\Http\Controllers\Admin\Projects\Tabs\HelpTabsController;
use App\Http\Controllers\Admin\Projects\Tabs\JoinusTabsController;
use App\Http\Controllers\Admin\Projects\Tabs\ProgramTabsController;
use App\Http\Controllers\Admin\Projects\Tabs\StatisticsTabsController;
use App\Http\Controllers\Admin\Resource\ResourceController;
use App\Http\Controllers\Admin\SidebarResource\SidebarResourceController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\Solution\SolutionController;
use App\Http\Controllers\Admin\Solution\Tabs\SolutionTabController;
use App\Http\Controllers\Admin\Summary\SummaryController;
use App\Http\Controllers\Admin\Technology\TechnologyResourceController;
use App\Http\Controllers\Admin\Testing\TestingController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::middleware('authAdmin:admin')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('admins', AdminController::class);
    Route::resource('users', UsersController::class);
    Route::resource('roles', RoleController::class);
    Route::post('roles-bulck-delete', [RoleController::class, 'bulkDelete'])->name('roles.bulckdelete');
    Route::resource('pages', PagesController::class);
    Route::resource('countries', CountryController::class);
    Route::resource('states', StateController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('levels', LevelController::class);
    Route::resource('certificates', CertificateController::class);
    Route::resource('specializations', SpecializationController::class);
    Route::resource('find-us', FindUsController::class);
    Route::resource('management', ManagementController::class)->except('destroy');
    Route::post('management/management-bulk-delete', [ManagementController::class, 'destroy'])->name('delete.management');
    Route::resource('blogs', BlogController::class)->except('destroy');
    Route::post('blogs/bulk-delete', [BlogController::class, 'bulkDelete'])->name('blogs.delete_bulck');
    Route::resource('advertisements', AdvertisementController::class)->except('destroy');
    Route::post('advertisements/bulk-delete', [AdvertisementController::class, 'bulkDelete'])->name('advertisements.delete_bulck');
    Route::resource('media-categories', MediaCategoryController::class)->except('destroy');
    Route::post('media-categories/bulk-delete', [MediaCategoryController::class, 'bulkDelete'])->name('media-categories.delete_bulck');
    Route::resource('product-categories', ProductCategoryController::class)->except('destroy');
    Route::post('product-categories/bulk-delete', [ProductCategoryController::class, 'bulkDelete'])->name('product-categories.delete_bulck');
    Route::resource('products', ProductController::class)->except('destroy');
    Route::post('products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('products.delete_bulck');
    Route::post('product-image', [ProductController::class, 'deleteImage'])->name('delete-image');

    Route::resource('store_sliders', StoreSliderController::class)->except('destroy');
    Route::post('store_sliders/bulk-delete', [StoreSliderController::class, 'bulkDelete'])->name('store_sliders.delete_bulck');
    Route::resource('orders', OrderController::class)->except('destroy');
    Route::resource('education-descriptions', EducationDescriptionController::class)->except('destroy');
    Route::post('education-descriptions/bulk-delete', [EducationDescriptionController::class, 'bulkDelete'])->name('education-descriptions.delete_bulck');
    Route::resource('resources', ResourceController::class)->except('destroy');
    Route::post('resources/bulk-delete', [ResourceController::class, 'bulkDelete'])->name('resources.delete_bulck');
    Route::resource('feature-advantages', FeatureAdvantagesController::class)->except('destroy');
    Route::post('feature-advantages/bulk-delete', [FeatureAdvantagesController::class, 'bulkDelete'])->name('feature-advantages.delete_bulck');
    Route::delete('resources/delete/{resource_id}', [ResourceController::class, 'deleteResource'])->name('resources.delete.resource');
    Route::resource('sidebar-resources', SidebarResourceController::class)->except('destroy');
    Route::post('sidebar-resources/bulk-delete', [SidebarResourceController::class, 'bulkDelete'])->name('sidebar-resources.delete_bulck');
    Route::delete('sidebar-resources/delete/{resource_id}', [SidebarResourceController::class, 'deleteResource'])->name('sidebar-resources.delete.resource');
    Route::resource('footer', FooterController::class)->except('destroy');
    Route::post('footer/bulk-delete', [FooterController::class, 'bulkDelete'])->name('footer.delete_bulck');
    Route::resource('investor-statistics', InvestorStatisticsController::class)->except('destroy');
    Route::post('investor-statistics/bulk-delete', [InvestorStatisticsController::class, 'bulkDelete'])->name('investor-statistics.delete_bulck');

    Route::name('about.')->prefix('about')->group(function () {
        Route::resource('identity', IdentityController::class);
        Route::resource('statistics', IdentityStatisticsController::class)->except('destroy');
        Route::post('statistics/delete-many', [IdentityStatisticsController::class, 'destroy'])->name('statistics.delete-many');
        Route::resource('investors', InvestorsController::class);
        Route::get('investors/many/{id?}', [InvestorsController::class, 'many'])->name('investors.many');
        Route::put('investors/manypost/{id}', [InvestorsController::class, 'manypost'])->name('investors.manypost');
        Route::delete('investors/manydelete/{id}', [InvestorsController::class, 'manydelete'])->name('investors.manydelete');
        Route::resource('achievements', AchievementsController::class);
        Route::resource('awards', AwardsController::class);
        Route::resource('certificates', CertificatesController::class);
        Route::resource('our-team', OurTeamController::class);
        Route::resource('careers', CareersController::class);
        Route::resource('partners', PartnersController::class);
        Route::resource('clients', ClientsController::class);
    });
    Route::resource('project', ProjectController::class);
    Route::name('tabproject.')->prefix('tab-project')->group(function () {
        Route::resource('about', AboutTabsController::class);
        Route::get('section-two/create', [AboutTabsController::class, 'createSectionTwo'])->name('about_sectionTwo');
        Route::get('section-two/edit', [AboutTabsController::class, 'createSectionTwo'])->name('edit_about_sectionTwo');
        Route::resource('program', ProgramTabsController::class);
        Route::resource('archive', ArchiveTabsController::class);
        Route::get('program/download/{id}', [ProgramTabsController::class, 'download'])->name('programTabDownload');
        Route::get('help/contactus/create', [HelpTabsController::class, 'createcontactus'])->name('help_contactus');
        Route::get('help/contactus/edit/{id?}', [HelpTabsController::class, 'editcontactus'])->name('edit_help_contactus');
        Route::resource('help', HelpTabsController::class);
        Route::resource('joinus', JoinusTabsController::class);
        Route::delete('join-us/{join_id}', [JoinusTabsController::class, 'deleteJoin'])->name('join.delete');
        Route::resource('statistics', StatisticsTabsController::class);
    });
    Route::resource('joinus', JoinusController::class);
    Route::resource('makeme', MakemeController::class);

    // clear route
    // clear route
    Route::get('/route-clear', function () {
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        return 'Route cache cleared successfully.';
    });
     Route::get('/storage-link', function () {
        Artisan::call('storage:link');
      
        return 'storage link cleared successfully.';
    });
    // end optimization route
    // slider
    Route::prefix('settings')->group(function () {
        Route::resource('slider', SliderController::class)->names('slider');
    });
    Route::get('child-pages/{page_id}', [SliderController::class, 'getChildPages'])->name('get-child-pages');
    Route::resource('education', EducationController::class);
    Route::post('education/add_row', [EducationController::class, 'add_row'])->name('education.add_row');

    Route::resource('testing', TestingController::class);
    Route::resource('summary', SummaryController::class);
    Route::delete('summary/link/{link_id}', [SummaryController::class, 'deleteLink'])->name('summary-delete.link');
    Route::delete('testing/link/{link_id}', [SolutionController::class, 'deleteLink'])->name('testing.delete.link');
    Route::resource('solution', SolutionController::class);
    // Route::resource('technology', TechnologyController::class);
    Route::resource('technology', TechnologyResourceController::class);
    Route::name('tabsolution.')->prefix('tab-solution')->group(function () {
        Route::resource("", SolutionTabController::class);
        Route::get('/{solution}', [SolutionTabController::class, 'show']);
        Route::get('/{solution}/edit', [SolutionTabController::class, 'edit']);
        Route::put('/{solution}', [SolutionTabController::class, 'update']);
    });

    #### Elsdodey

    Route::resource('doc-validation', DocValidationController::class);
    Route::delete('admin/doc-validation/bulk-destroy', [DocValidationController::class, 'destroy'])
        ->name('doc-validation.bulk-destroy');

    Route::post(
        'admin/doc-validation/delete_doc_details',
        [DocValidationController::class, 'delete_doc_details']
    )->name('doc-validation.delete_doc_details');




    Route::resource('contct-us-country/services', FindUsController::class);
    Route::resource('contct-us-country/regional-offices', RegionalOfficeController::class)->except('destroy');
    Route::resource('about', AboutController::class);
    Route::post('contct-us-country/regional-offices-bulk-delete', [RegionalOfficeController::class, 'destroy'])->name('delete.regional-offices');
    Route::resource('contct-us-country/authorized-offices', AuthorizedOfficeController::class)->except('destroy');
    Route::post('contct-us-country/authorized-offices-bulk-delete', [AuthorizedOfficeController::class, 'destroy'])->name('delete.authorized-offices');
    Route::resource('contct-us-country/regional-representatives', RegionalRepresentativeController::class)->except('destroy');
    Route::post('contct-us-country/regional-representatives-bulk-delete', [RegionalRepresentativeController::class, 'destroy'])->name('delete.regional-representatives');
    Route::resource('contact-us-services', ServicesController::class)->except('destroy');
    Route::post('contact-us-services-bulk-delete', [ServicesController::class, 'destroy'])->name('delete.contact-us-services');
});

Route::get('Archive/download/{id}', [ArchiveTabsController::class, 'download'])->name('tabproject.archiveDownload');
