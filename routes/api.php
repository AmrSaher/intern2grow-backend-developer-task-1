<?php

use App\Http\Controllers\ArticlesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(ArticlesController::class)->prefix('articles')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{article}', 'show');
    Route::put('/{article}', 'update');
    Route::delete('/{article}', 'destroy');
});