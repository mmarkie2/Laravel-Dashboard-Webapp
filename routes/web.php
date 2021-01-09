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



Route::get('/', "App\Http\Controllers\DashboardController@index") ;;

Route::get("/dashboard/create","App\Http\Controllers\DashboardController@create")
    ->name('dashboardCreate');
Route::post("/dashboard/create","App\Http\Controllers\DashboardController@store")
    ->name('dashboardStore');
Route::get("/dashboard","App\Http\Controllers\DashboardController@index")->name('dashboard');
Route::get('/dashboard/delete/{id}', 'App\Http\Controllers\DashboardController@destroy')->name('dashboardDestroy');




Route::get("/dashboard/chose","App\Http\Controllers\DashboardChoseController@index")
    ->name('dashboardChose');
Route::post("/dashboard/chose","App\Http\Controllers\DashboardChoseController@store")
    ->name('dashboardChoseStore');

Route::get("/dashboard/{id}/task/create","App\Http\Controllers\TaskController@create")
    ->name('taskCreate');
Route::post("/dashboard/{id}/task/create","App\Http\Controllers\TaskController@store")
    ->name('taskStore');
Route::get('/task/delete/{id}', 'App\Http\Controllers\TaskController@destroy')->name('taskDestroy');
Route::get('/task/edit/{id}', 'App\Http\Controllers\TaskController@edit')->name('taskEdit');
Route::put('/task/{id}', 'App\Http\Controllers\TaskController@update')->name('taskUpdate');


Auth::routes();

Route::get('/home',  "App\Http\Controllers\DashboardController@index");


