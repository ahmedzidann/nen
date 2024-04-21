<?php

use App\Http\Controllers\Admin\profile\AdminController;
use App\Http\Controllers\User\AboutUs\AboutController;
use App\Http\Controllers\User\Projects\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'asd';
});



Route::group(['prefix' => 'about','as'=>'about.', 'name'=>'about.'], function () {
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

    //Projects Routes
    Route::get('Projects/{slug?}/{id?}',[ProjectController::class,'index'])->name('projects');
