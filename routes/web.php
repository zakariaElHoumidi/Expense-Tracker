<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
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

Auth::routes(['verify' => true]);

Route::get('/', function () {
    $isauth = auth()->check();

    if ($isauth) {
        return redirect()->route('home');
    }

    return redirect()->route('login');
});


Route::middleware('auth')->group(function () {
    Route::get('/', [PageController::class, 'home'])
        ->name('home');

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'profile'])->name('index');
        Route::get('/delete-account', [ProfileController::class, 'deleteAccount'])->name('delete-account');
    });
});
