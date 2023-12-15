<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MypetController;
use App\Http\Controllers\PetPhotoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserPhotoController;

use App\Http\Controllers\PetfinderController;

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


Route::get('/mypets', [MypetController::class, 'index'])->name('mypets.index');
Route::get('/mypets/create', [MypetController::class, 'create'])->name('mypets.create');
Route::post('/mypets', [MypetController::class, 'store'])->name('mypets.store');
Route::get('/mypets/{id}', [MypetController::class, 'show'])->name('mypets.show');


Route::get('/pets/{petId}/edit', [MypetController::class, 'edit'])->name('pets.edit');
Route::put('/pets/{petId}', [MypetController::class, 'update'])->name('pets.update');


Route::delete('/delete-photo/{photoId}', [MypetController::class, 'deletePhoto'])->name('delete-photo');

Route::get('/mypets/{petId}/photos/create', [PetPhotoController::class, 'create'])->name('pet_photos.create');
Route::post('/mypets/{petId}/photos', [PetPhotoController::class, 'store'])->name('pet_photos.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::get('/vetdetails/{id}', [App\Http\Controllers\VetofficeController::class, 'show'])->name('vetdetails');
Route::get('/search/{zip}', [App\Http\Controllers\VetofficeController::class, 'searchByRadius'])->name('searchvet');

Route::get('/office-locations', [App\Http\Controllers\OfficeLocationController::class, 'index'])->name('office-locations.index');
Route::get('/office-locations/create', [App\Http\Controllers\OfficeLocationController::class,'create'])->name('office-locations.create');
Route::post('/office-locations', [App\Http\Controllers\OfficeLocationController::class,'store'])->name('office-locations.store');

Route::get('/map',  [App\Http\Controllers\MapController::class, 'index']);


Route::post('/upload-profile-image', [UserPhotoController::class, 'uploadProfileImage'])->name('upload.profile.image');
Route::post('/upload-gallery-photo', [UserPhotoController::class, 'uploadGalleryPhoto'])->name('upload.gallery.photo');








// Example route for obtaining an access token
Route::get('/zzzget-access-token', [PetfinderController::class, 'getAccessToken']);
//Route::get('/petfinder', function () {
//    return view('petfinder.index');
//})->name('petfinder.index');

Route::get('/petfinder', [PetfinderController::class, 'index'])->name('petfinder.index');
Route::get('/petfinder/search', [PetfinderController::class, 'search'])->name('petfinder.search');

Route::get('/petfinder/show/{id}', [PetfinderController::class, 'show'])->name('petfinder.show');

