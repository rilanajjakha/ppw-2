<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Posts2Controller;
use App\Http\Controllers\BukuController;

Route::get('/buku', [BukuController:: class, 'index']);


Route::get('/posts', [PostController:: class, 'index']);
Route::get('/posts2', [Posts2Controller:: class, 'index']);


Route::get('/', function () {
    return view('pages.home');
});


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about', [
        'name' => 'Rila',
        'email' => 'rila@gmail.com'
    ]);
});

Route::get('/isi', function () {
    return view('isi');
});

