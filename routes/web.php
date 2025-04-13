<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;

// Bosh sahifa -> Dashboard-ga yo‘naltirish
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Dashboard sahifasi
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Post CRUD
Route::resource('posts', PostController::class);

// Video CRUD
Route::resource('videos', VideoController::class);

// Comment routes
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
// Комментарии
Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');