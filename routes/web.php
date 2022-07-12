<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\VioletController;
use App\Http\Controllers\Admin\VioletController as AdminVioletController;
use App\Http\Controllers\Admin\SelectionerController as AdminSelectionerController;
use App\Http\Controllers\Admin\ImageController as AdminImageController;
use App\Http\Controllers\SocialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [VioletController::class, 'index']);

Route::get('/violet/{id}', [VioletController::class, 'show'])
        ->name('violet');

Route::group(['middleware' => 'auth'], function(){
        Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
                Route::get('/', AccountController::class)->name('index');
                Route::get('logout', function(){
                        \Auth::logout();
                        return redirect()->route('login');
                })->name('logout');
        });
        //Admin routes
        Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin.check'], function () {
                Route::get('/', App\Http\Controllers\Admin\IndexController::class)->name('index');
                Route::resource('violets', AdminVioletController::class);
                Route::resource('selectioners', AdminSelectionerController::class);
                Route::resource('images', AdminImageController::class);
        });
});

Auth::routes();
Route::group(['middleware' => 'guest'], function () {
    Route::get('/auth/{network}/redirect', [SocialController::class, 'index'])
    ->where('network', '\w+')
    ->name('auth.redirect');
    Route::get('/auth/{network}/callback', [SocialController::class, 'callback'])
    ->name('auth.callback');
});
Route::get('/home', [VioletController::class, 'index'])->name('home');
