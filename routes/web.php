<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DataBeasiswaController;
use App\Http\Controllers\EksternalBeasiswaController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DaftarBeasiswaController;
use App\Http\Controllers\TestimoniController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login
Route::middleware('guest')->group(function () {
    // Login
    Route::post('/login/auth', [LoginController::class, 'store'])->name('login');
    Route::get('/login/auth', [LoginController::class, 'create']);
});

// Log out
Route::post('logout', LogoutController::class)->name('logout');

Route::middleware('auth')->group(function () {
    // Daftar Beasiswa
    Route::get('/daftar-beasiswa', [DaftarBeasiswaController::class, 'create'])->name('daftar-beasiswa');
    Route::post('/daftar-beasiswa', [DaftarBeasiswaController::class, 'store'])->name('store-daftar-beasiswa');
});

Route::middleware(['auth', 'role'])->group(function () {
    // Create Data Beasiswa
    Route::get('/create-data-beasiswa/{tahun}', [DataBeasiswaController::class, 'create'])->name('create-data-beasiswa');
    Route::post('/create-data-beasiswa/{tahun}', [DataBeasiswaController::class, 'store'])->name('store-data-beasiswa');
    // Delete Data Beasiswa
    Route::delete('/hapus-data-beasiswa/{id}/{tahun}', [DataBeasiswaController::class, 'destroy'])->name('hapus-data-beasiswa');

    // Blog admin
    Route::get('/create-blog/{types}', [BlogController::class, 'create'])->name('create-blog');
    Route::post('/create-blog', [BlogController::class, 'store'])->name('store-blog');
    Route::get('/edit-blog/{id}', [BlogController::class, 'edit'])->name('edit-blog');
    Route::put('/update-blog/{id}', [BlogController::class, 'update'])->name('update-blog');
    Route::delete('/hapus-blog/{id}', [BlogController::class, 'destroy'])->name('hapus-blog');

    // Upload an image
    Route::post('/upload', function (Request $request) {
        $path = $request->file('file')->store('thumbnails', 'public');
        $url = Storage::url($path);
        return response()->json(['location' => $url]);
    })->name('upload');

    // Testimoni
    Route::get('/testimoni', [TestimoniController::class, 'index'])->name('testimoni');
    Route::get('/create-testimoni', [TestimoniController::class, 'create'])->name('create-testimoni');
    Route::post('/create-testimoni', [TestimoniController::class, 'store'])->name('store-testimoni');
    Route::get('/edit-testimoni/{id}', [TestimoniController::class, 'edit'])->name('edit-testimoni');
    Route::put('/update-testimoni/{id}', [TestimoniController::class, 'update'])->name('update-testimoni');
    Route::delete('/hapus-testimoni/{id}', [TestimoniController::class, 'destroy'])->name('hapus-testimoni');

    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Edit Data Beasiswa
    Route::get('/edit-data-beasiswa/{id}/{year}', [DataBeasiswaController::class, 'edit'])->name('edit-data-beasiswa');
    Route::put('/update-data-beasiswa/{id}/{year}', [DataBeasiswaController::class, 'update'])->name('update-data-beasiswa');

    // Edit Article
    Route::get('/edit-article/{id_article}', [BlogController::class, 'edit'])->name('edit-article');
    Route::put('/update-article/{id_article}', [BlogController::class, 'update'])->name('update-article');
    // Delete Article
    Route::delete('/delete-article/{id_article}', [BlogController::class, 'delete'])->name('delete-article');
});

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// About
Route::get('/about', function () {
    return view('about');
})->name('about');

// Jenis Beasiswa
Route::get('/beasiswaInternal', function () {
    return view('jenisbeasiswa.internal');
})->name('beasiswaInternal');
Route::get('/beasiswaEksternal', [EksternalBeasiswaController::class, 'index'])->name('beasiswaEksternal');

// Seleksi Beasiswa
Route::get('/seleksi', [DaftarBeasiswaController::class, 'show'])->name('seleksi');
Route::post('/detail/{nim}', [DaftarBeasiswaController::class, 'update'])->name('detail.update');
Route::get('/detail/{nim}', [DaftarBeasiswaController::class, 'detail'])->name('detail');

// Data Beasiswa
Route::get('/dataBeasiswa/{tahun}', [DataBeasiswaController::class, 'index'])->name('dataBeasiswa');

// News
Route::get('/article/{id}', [BlogController::class, 'show'])->name('article');

// INTERNAL
Route::prefix('postsbeasiswainternal')->middleware(['auth'])->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('postsbeasiswainternal.index');
    Route::get('/create', [PostController::class, 'create'])->name('postsbeasiswainternal.create');
    Route::post('/', [PostController::class, 'store'])->name('postsbeasiswainternal.store');
    Route::get('/{postsbeasiswainternal}', [PostController::class, 'show'])->name('postsbeasiswainternal.show');
    Route::get('/{postsbeasiswainternal}/edit', [PostController::class, 'edit'])->name('postsbeasiswainternal.edit');
    Route::put('/{postsbeasiswainternal}', [PostController::class, 'update'])->name('postsbeasiswainternal.update');
    Route::delete('/{postsbeasiswainternal}', [PostController::class, 'destroy'])->name('postsbeasiswainternal.destroy');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
});