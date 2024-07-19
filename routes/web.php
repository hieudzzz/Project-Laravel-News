<?php

use Illuminate\Support\Facades\Route;




use App\Http\Controllers\Admin\UserController;

// Các route cho người dùng
Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
Route::get('/admin/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


use App\Http\Controllers\Admin\LoaiTinController;
//loaitin
Route::get('/admin/loaitin', [LoaiTinController::class, 'index'])->name('loaitin.index');
Route::get('/admin/loaitin/create', [LoaiTinController::class, 'create'])->name('loaitin.create');
Route::post('/admin/loaitin/store', [LoaiTinController::class, 'store'])->name('loaitin.store');
Route::get('/admin/loaitin/{id}', [LoaiTinController::class, 'show'])->name('loaitin.show');
Route::get('/admin/loaitin/{id}/edit', [LoaiTinController::class, 'edit'])->name('loaitin.edit');
Route::put('/admin/loaitin/{id}/update', [LoaiTinController::class, 'update'])->name('loaitin.update');
Route::delete('/admin/loaitin/{id}/destroy', [LoaiTinController::class, 'destroy'])->name('loaitin.destroy');










//tin
use App\Http\Controllers\Admin\NewsController;

Route::prefix('admin')->name('news.')->group(function () {
    Route::get('/news', [NewsController::class, 'index'])->name('index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('create');
    Route::post('/news/store', [NewsController::class, 'store'])->name('store');
    Route::get('/news/{id}', [NewsController::class, 'show'])->name('show');
    Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('edit');
    Route::put('/news/{id}/update', [NewsController::class, 'update'])->name('update');
    Route::delete('/news/{id}/destroy', [NewsController::class, 'destroy'])->name('destroy');
});









use App\Http\Controllers\Client\TinController;
// routes/web.php


Route::get('/', [TinController::class, 'index'])->name('client.home');
Route::get('/tin/{id}', [TinController::class, 'chitiet'])->name('client.chitiet');
Route::get('/tintrongloai/{idLT}', [TinController::class, 'tintrongloai'])->name('client.tintrongloai');



use App\Http\Controllers\AuthController;

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
