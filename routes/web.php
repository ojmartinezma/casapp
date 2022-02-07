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
Route::get('/create-offer', function () {
    return view('create-offer');
})->name('create-offer');

Route::get('/edit-offer', function () {
    return view('edit-offer');
})->name('edit-offer');

Route::post('create-offer',  'App\Http\Controllers\OfferController@create');
Route::post('edit-offer',  'App\Http\Controllers\OfferController@edit');
Route::post('modify-offer',  'App\Http\Controllers\OfferController@modify');

Route::get('/modify-offer', function () {
    $offer_id = session('offer_id');
    return view('modify-offer');
})->name('modify-offer');