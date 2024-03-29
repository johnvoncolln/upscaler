<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\ScaleObjectController;

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
Route::mediaLibrary();

Route::get('/', [ScaleObjectController::class, 'show'])
    ->name('scale.show');

Route::post('/store', [ScaleObjectController::class, 'store'])
    ->name('scale.store');

Route::get('/test', function () {
    return view('test');
});

Route::get('/bg', function () {
    return view('bg');
});
