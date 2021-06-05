<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizAnswerController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LeagueController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::get('/picks', [WeeklyQuizAnswerController::class, 'show'])->middleware(['auth'])->name('picks');
    
    Route::get('/leagues/create', [LeagueController::class, 'create'])->middleware(['auth'])->name('leagues.create');
    
    Route::post('/leagues/store', [LeagueController::class, 'store'])->middleware(['auth'])->name('leagues.store');

    // Route::get('users', function ()    {
    //     // Matches The "/dashboard/users" URL
    // })->middleware(['auth'])->name('dashboard');
});

require __DIR__.'/auth.php';