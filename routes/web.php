<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizAnswerController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LeagueController;
use Illuminate\Support\Facades\Auth;

use App\Models\League;


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
        // if (Auth::user()->leagues > 0 && Auth::user()->last_league_id != null) {
        //     //todo: return view('leagues.show', id);
        // }
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::get('/picks', [WeeklyQuizAnswerController::class, 'show'])->middleware(['auth'])->name('picks');
    
    Route::get('/leagues/create', [LeagueController::class, 'create'])->middleware(['auth'])->name('leagues.create');
    
    Route::post('/leagues/store', [LeagueController::class, 'store'])->middleware(['auth'])->name('leagues.store');
    
    Route::get('/leagues/{league}', function (League $league) {
        Auth::user()->last_league_id = $league->id;
        return view('leagues.show', ['league' => $league]);
    })->middleware(['auth'])->name('leagues.show');
});

require __DIR__.'/auth.php';