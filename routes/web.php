<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\VioletController;
use App\Http\Controllers\Admin\VioletController as AdminVioletController;
use App\Http\Controllers\Admin\SelectionerController as AdminSelectionerController;


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


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', App\Http\Controllers\Admin\IndexController::class)->name('index');
        Route::resource('violets', AdminVioletController::class);
        Route::resource('selectioners', AdminSelectionerController::class);
    }); 