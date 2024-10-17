<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Posts2Controller;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\Auth\LoginRegisterController;

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

// middleware auth untuk halaman dashboard dan route buku
Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [BukuController::class, 'index'])->name('dashboard');
    
    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
});



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





// <?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PostController;
// use App\Http\Controllers\Posts2Controller;
// use App\Http\Controllers\BukuController;
// use App\Http\Controllers\Auth\LoginRegisterController;

// Route::controller(LoginRegisterController::class)->group(function() {
//     Route::get('/register', 'register')->name('register');
//     Route::post('/store', 'store')->name('store');
//     Route::get('/login', 'login')->name('login');
//     Route::post('/authenticate', 'authenticate')->name('authenticate');
//     Route::get('/dashboard', 'dashboard')->name('dashboard');
//     Route::post('/logout', 'logout')->name('logout');
// });

// Route::get('/buku', [BukuController::class, 'index']);
// Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
// Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
// Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

// Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
// Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
