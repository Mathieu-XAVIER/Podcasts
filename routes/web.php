<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
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

    Route::middleware(['admin'])->name('admin.')->prefix('admin')->group(function (){
        Route::resource('dashboard', AdminController::class)->middleware(['auth', 'admin']);
    });
});

require __DIR__.'/auth.php';

Route::get('/auth/redirect', function () {
    return Socialite::driver('azure')->redirect();
})->name('microsoft');

Route::get('/auth/callback', function () {
    $microsoftUser = Socialite::driver('azure')->user();

    $user = User::updateOrCreate(
        [
            'email' => $microsoftUser->getEmail(),
        ],
        [
            'id' => $microsoftUser->getId(),
            'name' => $microsoftUser->getName(),
            'password' => $microsoftUser->password,
        ]
    );

    Auth::login($user);

    return redirect()->route('dashboard');
});




