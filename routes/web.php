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
    Route::get('/animals-register', [AnimalController::class, 'animalsRegister'])->name('animals.viewRegister');
    Route::post('/animals-register', [AnimalController::class, 'store'])->name('animals.register'); 
    Route::post('/jogo/save', [AnimalController::class, 'saveGame'])->name('game.save');
    Route::get('/dashboard', [AnimalController::class, 'dashboard'])->name('dashboard');
    Route::delete('/dashboard/animal/{id}', [AnimalController::class, 'destroy'])->name('animal.destroy');
    Route::get('/list-animals', [AnimalController::class, 'listAnimals'])->name('animals.list');
    Route::any('/list-animals/search', [AnimalController::class, 'searchAnimal'])->name('animal.search');
    Route::get('/album', [AnimalController::class, 'album'])->name('album');

    Route::get('/grupo', [AnimalController::class, 'grupo'])->name('grupo');
    Route::get('/grupoCriar', [AnimalController::class, 'grupoCreate'])->name('group.create');
    Route::post('/grupoCriar', [AnimalController::class, 'storeGroup'])->name('group.register');

    Route::get('/grupo/{id}', [AnimalController::class, 'viewGroup'])->name('group.viewGroup');
    Route::any('/grupo/{id}/add', [AnimalController::class, 'groupAdd'])->name('group.add');
    Route::get('selecao-jogo/{id}', [AnimalController::class, 'selecaoJogoGrupo'])->name('animals.selecaoGrupo');
    Route::get('/ranking/{id}', [AnimalController::class, 'rankingGrupo'])->name('ranking.grupo');
});

Route::get('/home', [AnimalController::class, 'index'])->name('return.index');

Route::get('/home', [AnimalController::class, 'index'])->name('return.index');
Route::get('/home', [AnimalController::class, 'index'])->name('return.index');
Route::get('/selecao-jogo', [AnimalController::class, 'selecaoJogo'])->name('animals.selecao');

Route::get('/ranking', [AnimalController::class, 'ranking'])->name('rankin.main');
Route::any('/ranking/search', [AnimalController::class, 'searchRanking'])->name('ranking.search');

//Rota dos jogos
Route::get('/jogo/class/ave/{id}', [GameModesController::class, 'jogoClassAve'])->name('jogo.class_ave');
Route::get('/jogo/class/anfibio/{id}', [GameModesController::class, 'jogoClassAnfibio'])->name('jogo.class_anfibio');
Route::get('/jogo/class/mamifero/{id}', [GameModesController::class, 'jogoClassMamifero'])->name('jogo.class_mamifero');
Route::get('/jogo/class/inseto/{id}', [GameModesController::class, 'jogoClassInseto'])->name('jogo.class_inseto'); 
Route::get('/jogo/class/peixe/{id}', [GameModesController::class, 'jogoClassPeixe'])->name('jogo.class_peixe');
Route::get('/jogo/class/reptil/{id}', [GameModesController::class, 'jogoClassReptil'])->name('jogo.class_reptil');

Route::get('/jogo/order/carnivoro/{id}', [GameModesController::class, 'jogoOrderCarnivoro'])->name('jogo.order_carnivoro');
Route::get('/jogo/order/herbivoro/{id}', [GameModesController::class, 'jogoOrderHerbivoro'])->name('jogo.order_herbivoro');
Route::get('/jogo/order/onivoro/{id}', [GameModesController::class, 'jogoOrderOnivoro'])->name('jogo.order_onivoro');

Route::get('/jogo/habitat/aereo/{id}', [GameModesController::class, 'jogoHabitatAereo'])->name('jogo.habitat_aereo');
Route::get('/jogo/habitat/aquatico/{id}', [GameModesController::class, 'jogoHabitatAquatico'])->name('jogo.habitat_aquatico');
Route::get('/jogo/habitat/terrestre/{id}', [GameModesController::class, 'jogoHabitatTerrestre'])->name('jogo.habitat_terrestre');

Route::get('/jogo/brasileiro/{id}', [GameModesController::class, 'jogoBrasileiro'])->name('jogo.brasileiro');
Route::get('/jogo/aleatorio/{id}', [GameModesController::class, 'jogoAleatorio'])->name('jogo.aleatorio');

Route::get('/', function () {
    return view('telas.index');
});

require __DIR__.'/auth.php';