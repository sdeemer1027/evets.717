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
});

Route::get('/about', function () {    return view('about');})->name('about');
Route::get('/service', function () {    return view('service');})->name('service');
Route::get('/price', function () {    return view('price');})->name('price');
Route::get('/booking', function () {    return view('booking');})->name('booking');
Route::get('/blog', function () {    return view('blog');})->name('blog');
Route::get('/contact', function () {    return view('contact');})->name('contact');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/office-locations', [App\Http\Controllers\OfficeLocationController::class, 'index'])->name('office-locations.index');
Route::get('/office-locations/create', [App\Http\Controllers\OfficeLocationController::class,'create'])->name('office-locations.create');
Route::post('/office-locations', [App\Http\Controllers\OfficeLocationController::class,'store'])->name('office-locations.store');

Route::get('/map',  [App\Http\Controllers\MapController::class, 'index']);

Route::get('search', [App\Http\Controllers\VetofficeController::class, 'searchByRadius']);
