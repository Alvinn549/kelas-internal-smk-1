<?php

use App\Http\Controllers\KomentarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'dataPost']);

Route::get('/tambah-post', [PostController::class, 'create']);
Route::post('/store', [PostController::class, 'store']);

Route::get('/edit-post/{id}', [PostController::class, 'edit']);
Route::put('/update/{id}', [PostController::class, 'update']);

Route::get('/detail-post/{id}', [PostController::class, 'show']);

Route::delete('/delete-post/{postingan_id}', [PostController::class, 'destroy']);

Route::resource('post', PostController::class);

Route::resource('user', UserController::class);

Route::resource('komentar', KomentarController::class);
