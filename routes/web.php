<?php

use App\Http\Controllers\PodcastController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/dashboard', [PodcastController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('dashboard/podcasts', PodcastController::class);

Route::get('/Mes-Podcasts', [PodcastController::class,'showUserPodcasts'])->name('mypodcasts');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/auth/redirect', function () {
    return Socialite::driver('microsoft')->redirect();
})->name('microsoft');

Route::get('/auth/callback', function () {
    $user = Socialite::driver('microsoft')->user();

    // $user->token
});



