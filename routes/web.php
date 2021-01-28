<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ImageController;


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
//upload file
Route::get('file-upload', [ FileUploadController::class, 'fileUpload' ])->name('file.upload');
Route::post('file-upload', [ FileUploadController::class, 'fileUploadPost' ])->name('file.upload.post');

//upload img
Route::get('multiple-image-upload', [ImageController::class, 'multipleImage'])->name('multiple.image');
Route::post('multiple-image/store', [ImageController::class, 'multipleImageStore'])->name('multiple.image.store');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');







