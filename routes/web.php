<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PerguntaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//Route::get('/question', function () {
//    return Inertia::render('Frontend/Question');
//});
Route::get('/question', [PerguntaController::class, 'csvArray']);

Route::get('/email', [PerguntaController::class, 'answer']);

Route::get('/start', function () {
    return Inertia::render('Frontend/StartTest');
})->middleware('auth');


Route::get('/users', 'UserController@readCsv');
Route::get('/reading', [PerguntaController::class, 'interpretation'])->name('reading')->middleware('auth');

Route::post('/answer', [AnswerController::class, 'store'])->name('answer')->middleware('auth');
Route::post('/emailanswer', [ChatController::class, 'chat'])->name('emailanswer');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
