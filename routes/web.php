<?php

use App\Http\Middleware\EnsureAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/pages/myphotos', [HomeController::class, 'myPhotos'])->name('pages.myphotos');
Route::get('/pages/trash', [HomeController::class, 'myPhotos'])->name('pages.trash');

Route::middleware('auth')->group(function (){
    Route::post('/upload-image', [ImageController::class, 'uploadImage'])->name('image.upload');
    Route::get('/pages/myphotos', [ImageController::class, 'displayImage'])->name('pages.myphotos');
    Route::get('/pages/trash', [ImageController::class, 'displayTrashed'])->name('pages.trash');
    Route::put('/edit-image/{photo}', [ImageController::class, 'editImage'])->name('image.edit');
    Route::delete('/delete-image/{id}', [ImageController::class, 'deleteImage'])->name('image.destroy');
    Route::delete('/permanently-delete/{id}', [ImageController::class, 'forceDelete'])->name('image.delete');
    Route::delete('/delete-all-image', [ImageController::class, 'deleteAll'])->name('image.deleteAll');
    Route::get('/restore-image/{id}', [ImageController::class, 'restoreImage'])->name('image.restore');
    Route::post('image-download/{id}', [ImageController::class, 'downloadImage'])->name('image.download');
});


// Admin
Route::middleware(['auth', EnsureAdmin::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});