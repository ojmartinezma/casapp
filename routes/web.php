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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/map','App\Http\Controllers\MapController@api')->name('map');
Route::get('/map/filter','App\Http\Controllers\MapController@filter')->name('filter');
Route::get('/map/detail/{id}','App\Http\Controllers\MapController@detail')->name('detail');
