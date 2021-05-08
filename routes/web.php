<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerView;
use App\Http\Controllers\ControllerApi;

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

Route::get('/', [ControllerView::class, 'home']);

Route::get('/concerts', [ControllerView::class, 'concerts']);

Route::get('/welcome', [ControllerView::class, 'welcome']);

Route::get('/search', [ControllerView::class, 'search']);

Route::get('/results', [ControllerView::class, 'results']);

Route::get('/favorites', [ControllerView::class, 'favorites']);

Route::post('/deleteFav', [ControllerView::class, 'deleteFav']);

Route::post('/search', [ControllerApi::class, 'search']);

Route::post('/resultsArtists', [ControllerView::class, 'resultsArtists']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
