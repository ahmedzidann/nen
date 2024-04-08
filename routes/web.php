<?php

use App\Http\Controllers\Admin\profile\AdminController;
use App\Http\Controllers\User\AboutUs\AboutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'asd';
});



Route::group(['prefix' => 'about','as'=>'about.', 'name'=>'about.'], function () {
    Route::get('identity', [AboutController::class, 'identity'])->name('identity');
    Route::get('award', [AboutController::class, 'award'])->name('award');
    Route::get('certificates', [AboutController::class, 'certificates'])->name('certificates');
    Route::get('partners', [AboutController::class, 'partners'])->name('partners');

});
