<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;

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
Route::get('/home', [AnimalController::class, 'index'])->name('return.index');

Route::get('/animals-rigister', [AnimalController::class, 'animalsRegister'])->name('animals.viewRegister');

Route::post('/animals-rigister', [AnimalController::class, 'store'])->name('animals.register');

Route::get('/jogo', [AnimalController::class, 'jogo'])->name('animals.jogo');

Route::get('/', function () {
    return view('telas.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';