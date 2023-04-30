<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//social media
Route::get('github_signin', [AuthController::class, 'loginWithGithub'])->name('github_login');
Route::get('auth/github/callback',  [AuthController::class, 'githubCallback']);
Route::get('google_signin', [AuthController::class, 'loginWithGoogle'])->name('google_login');
Route::get('auth/google/callback',  [AuthController::class, 'googleCallback']);

require __DIR__.'/auth.php';
