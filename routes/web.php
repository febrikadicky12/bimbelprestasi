<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;


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
// routes/web.php

// file: routes/web.php

use App\Http\Controllers\PostController;

// Rute untuk menampilkan formulir pembuatan post
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// Rute untuk menyimpan post baru ke database
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');


Route::get('/posts', [PostController::class, 'index'])->name('posts.index');


Route::get('/create', function () {
    return view('create');
})->name('create.blade');


use App\Http\Controllers\UploadController;

Route::get('/upload-jadwal', [UploadController::class, 'showForm'])->name('upload.jadwal.form');
Route::post('/upload-jadwal', [UploadController::class, 'uploadFile'])->name('upload.jadwal');
Route::delete('/delete-jadwal', [UploadController::class, 'deleteFile'])->name('delete.jadwal');

// Tambahkan rute untuk halaman upload.blade.php
Route::get('/upload', function () {
    return view('upload');
})->name('upload.blade');

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');