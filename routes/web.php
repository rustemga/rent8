<?php

use App\Http\Controllers\CategoriesController;
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
    $categories = \App\Models\Categories::get();
    return view('welcome')->with('categories', $categories);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home-admin', [App\Http\Controllers\HomeController::class, 'indexAdmin'])->name('homeAdmin');
Route::get('/home-rent-service-owner', [App\Http\Controllers\HomeController::class, 'indexRentOwner'])->name('homeRentOwner');
Route::get('/get-categories', [App\Http\Controllers\CategoriesController::class, 'show']);
Route::post('/rent/store', [App\Http\Controllers\RentsController::class, 'store']);
