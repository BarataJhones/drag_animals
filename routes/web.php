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
Route::middleware(['auth'])->group(function (){
    Route::get('/animals-rigister', [AnimalController::class, 'animalsRegister'])->name('animals.viewRegister');
    Route::post('/animals-rigister', [AnimalController::class, 'store'])->name('animals.register'); 
    Route::post('/jogo/ranking-register', [AnimalController::class, 'storeRanking'])->name('ranking.register');
    Route::get('/dashboard', [AnimalController::class, 'listAnimals'])->name('dashboard');
});

Route::get('/home', [AnimalController::class, 'index'])->name('return.index');

Route::get('/animals-rigister', [AnimalController::class, 'animalsRegister'])->name('animals.viewRegister');

Route::post('/animals-rigister', [AnimalController::class, 'store'])->name('animals.register');

Route::get('/home', [AnimalController::class, 'index'])->name('return.index');
Route::get('/selecao-jogo', [AnimalController::class, 'selecaoJogo'])->name('animals.selecao');
Route::get('/ranking', [AnimalController::class, 'ranking'])->name('rankin.main');

//Rota dos jogos
Route::get('/jogo/class/ave', [AnimalController::class, 'jogoClassAve'])->name('jogo.class_ave');
Route::get('/jogo/class/anfibio', [AnimalController::class, 'jogoClassAnfibio'])->name('jogo.class_anfibio');
Route::get('/jogo/class/mamifero', [AnimalController::class, 'jogoClassMamifero'])->name('jogo.class_mamifero');
Route::get('/jogo/class/inseto', [AnimalController::class, 'jogoClassInseto'])->name('jogo.class_inseto'); 
Route::get('/jogo/class/peixe', [AnimalController::class, 'jogoClassPeixe'])->name('jogo.class_peixe');
Route::get('/jogo/class/reptil', [AnimalController::class, 'jogoClassReptil'])->name('jogo.class_reptil');

Route::get('/jogo/order/carnivoro', [AnimalController::class, 'jogoOrderCarnivoro'])->name('jogo.order_carnivoro');
Route::get('/jogo/order/herbivoro', [AnimalController::class, 'jogoOrderHerbivoro'])->name('jogo.order_herbivoro');
Route::get('/jogo/order/onivoro', [AnimalController::class, 'jogoOrderOnivoro'])->name('jogo.order_onivoro');

Route::get('/jogo/habitat/aereo', [AnimalController::class, 'jogoHabitatAereo'])->name('jogo.habitat_aereo');
Route::get('/jogo/habitat/aquatico', [AnimalController::class, 'jogoHabitatAquatico'])->name('jogo.habitat_aquatico');
Route::get('/jogo/habitat/terrestre', [AnimalController::class, 'jogoHabitatTerrestre'])->name('jogo.habitat_terrestre');

Route::get('/jogo/brasileiro', [AnimalController::class, 'jogoBrasileiro'])->name('jogo.brasileiro');
Route::get('/jogo/aleatorio', [AnimalController::class, 'jogoAleatorio'])->name('jogo.aleatorio');

Route::get('/', function () {
    return view('telas.index');
});

require __DIR__.'/auth.php';