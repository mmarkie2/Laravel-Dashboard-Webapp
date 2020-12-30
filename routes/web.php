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



Route::get('/', "App\Http\Controllers\DashboardController@index") ->name('dashboard');;

Route::get("/dashboard/create","App\Http\Controllers\DashboardController@create")
    ->name('dashboardCreate');
Route::post("/dashboard/create","App\Http\Controllers\DashboardController@store")
    ->name('dashboardStore');
Route::get("/dashboard","App\Http\Controllers\DashboardController@index");



Route::get("/dashboard/chose","App\Http\Controllers\DashboardChoseController@index")
    ->name('dashboardChose');

Route::post("/dashboard/chose","App\Http\Controllers\DashboardChoseController@store")
    ->name('dashboardChoseStore');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
