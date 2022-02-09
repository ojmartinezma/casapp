<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
Route::post('/map/filter','App\Http\Controllers\MapController@filter')->name('filter');
Route::get('/map/detail/{id}','App\Http\Controllers\MapController@detail')->name('detail');


Route::middleware(['auth:sanctum', 'verified'])->get('/create-offer', function () {
    return view('create-offer');
})->name('create-offer');

Route::middleware(['auth:sanctum', 'verified'])->get('/edit-offer', function () {
    return view('edit-offer');
})->name('edit-offer');

Route::middleware(['auth:sanctum', 'verified'])->post('create-offer',  'App\Http\Controllers\OfferController@create');
Route::middleware(['auth:sanctum', 'verified'])->post('edit-offer',  'App\Http\Controllers\OfferController@edit');
Route::middleware(['auth:sanctum', 'verified'])->post('modify-offer',  'App\Http\Controllers\OfferController@modify');

Route::middleware(['auth:sanctum', 'verified'])->get('/modify-offer', function () {
    $offer_id = session('offer_id');
    return view('modify-offer');
})->name('modify-offer');
