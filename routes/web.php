<?php

use Illuminate\Support\Facades\Route;

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

/**pertemuan ke4 controller dan migration */
Route::get('/posts', [PostController:: class, 'index']);