<?php

use Illuminate\Support\Facades\Route;

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

Route::group([
    'as'     => 'api.',
    'prefix' => 'api/v1',
], function () {
    Route::resource('/statistics', \App\Http\Controllers\api\StatisticsController::class)->only('index', 'store');
    Route::delete('/statistics', [\App\Http\Controllers\api\StatisticsController::class, 'restore'])->name('statistics.restore');
});

