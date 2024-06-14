<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebVideosController;
use App\Http\Controllers\WebNewsController;
use App\Http\Controllers\WebTrickController;
use App\Http\Controllers\WebProfileGameController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\TrickController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileGameController;
use Illuminate\Support\Facades\Route;



// Route for the main page using WebVideosController
Route::get('', function () {
    // Get data from the controllers
    $videos = app(WebVideosController::class)->index();
    $news = app(WebNewsController::class)->index();
    $trick = app(WebTrickController::class)->index();
    $profile = app(WebProfileGameController::class)->index();
    // Return the welcome view with data from the controllers
    return view('welcome', ['videos' => $videos, 'trick' => $trick, 'news' => $news, 'profile' => $profile]);
});
// Route for the dashboard protected by auth and verified middleware
Route::get('/dashboard', function () {
    $videos = app(VideosController::class)->index();
    $trick = app(TrickController::class)->index();
    $news = app(NewsController::class)->index();
    $profile = app(ProfileGameController::class)->index();
    return view('dashboard', ['videos' => $videos], ['news' => $news], ['trick' => $trick], ['profile' => $profile]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/videos', [VideosController::class, 'index'])->name('videos.index');
    Route::post('videos/tambah', [VideosController::class, 'tambah']);
    Route::post('videos/hapus', [VideosController::class, 'hapus']);
    Route::post('videos/edit', [VideosController::class, 'edit']);
});
Route::middleware('auth')->group(function () {
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::post('news/tambah', [NewsController::class, 'tambah']);
    Route::post('news/hapus', [NewsController::class, 'hapus']);
    Route::post('news/edit', [NewsController::class, 'edit']);
});
Route::middleware('auth')->group(function () {
    Route::get('/trick', [TrickController::class, 'index'])->name('trick.index');
    Route::post('trick/tambah', [TrickController::class, 'tambah']);
    Route::post('trick/hapus', [TrickController::class, 'hapus']);
    Route::post('trick/edit', [TrickController::class, 'edit']);
});
Route::middleware('auth')->group(function () {
    Route::get('/profilegame', [ProfileGameController::class, 'index'])->name('profilegame.index');
    Route::post('profilegame/tambah', [ProfileGameController::class, 'tambah']);
    Route::post('profilegame/hapus', [ProfileGameController::class, 'hapus']);
    Route::post('profilegame/edit', [ProfileGameController::class, 'edit']);
});

require __DIR__ . '/auth.php';
