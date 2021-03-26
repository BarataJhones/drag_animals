<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\GameModesController;
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
    Route::get('/dashboard', [AnimalController::class, 'dashboard'])->name('dashboard');
    Route::get('/list-animals', [AnimalController::class, 'listAnimals'])->name('animals.list');
    Route::any('/list-animals/search', [AnimalController::class, 'searchAnimal'])->name('animal.search');
});

Route::get('/home', [AnimalController::class, 'index'])->name('return.index');

Route::get('/animals-rigister', [AnimalController::class, 'animalsRegister'])->name('animals.viewRegister');
Route::post('/animals-rigister', [AnimalController::class, 'store'])->name('animals.register');

Route::get('/home', [AnimalController::class, 'index'])->name('return.index');
Route::get('/selecao-jogo', [AnimalController::class, 'selecaoJogo'])->name('animals.selecao');

Route::get('/ranking', [AnimalController::class, 'ranking'])->name('rankin.main');
Route::any('/ranking/search', [AnimalController::class, 'searchRanking'])->name('ranking.search');

//Rota dos jogos
Route::get('/jogo/class/ave', [GameModesController::class, 'jogoClassAve'])->name('jogo.class_ave');
Route::get('/jogo/class/anfibio', [GameModesController::class, 'jogoClassAnfibio'])->name('jogo.class_anfibio');
Route::get('/jogo/class/mamifero', [GameModesController::class, 'jogoClassMamifero'])->name('jogo.class_mamifero');
Route::get('/jogo/class/inseto', [GameModesController::class, 'jogoClassInseto'])->name('jogo.class_inseto'); 
Route::get('/jogo/class/peixe', [GameModesController::class, 'jogoClassPeixe'])->name('jogo.class_peixe');
Route::get('/jogo/class/reptil', [GameModesController::class, 'jogoClassReptil'])->name('jogo.class_reptil');

Route::get('/jogo/order/carnivoro', [GameModesController::class, 'jogoOrderCarnivoro'])->name('jogo.order_carnivoro');
Route::get('/jogo/order/herbivoro', [GameModesController::class, 'jogoOrderHerbivoro'])->name('jogo.order_herbivoro');
Route::get('/jogo/order/onivoro', [GameModesController::class, 'jogoOrderOnivoro'])->name('jogo.order_onivoro');

Route::get('/jogo/habitat/aereo', [GameModesController::class, 'jogoHabitatAereo'])->name('jogo.habitat_aereo');
Route::get('/jogo/habitat/aquatico', [GameModesController::class, 'jogoHabitatAquatico'])->name('jogo.habitat_aquatico');
Route::get('/jogo/habitat/terrestre', [GameModesController::class, 'jogoHabitatTerrestre'])->name('jogo.habitat_terrestre');

Route::get('/jogo/brasileiro', [GameModesController::class, 'jogoBrasileiro'])->name('jogo.brasileiro');
Route::get('/jogo/aleatorio', [GameModesController::class, 'jogoAleatorio'])->name('jogo.aleatorio');

Route::get('/', function () {
    return view('telas.index');
});

require __DIR__.'/auth.php';