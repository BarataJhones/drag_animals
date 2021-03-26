<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Ranking;

class GameModesController extends Controller
{
    public function jogoClassAve()
    {
        $animals = Animal::where('class', "Ave")->inRandomOrder()->paginate(5);

        $quadros = $animals->shuffle();

        $gameType = "Ave";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoClassAnfibio()
    {
        $animals = Animal::where('class', "Anfíbio")->inRandomOrder()->paginate(5);

        $quadros = $animals->shuffle();

        $gameType = "Anfíbio";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoClassMamifero()
    {
        $animals = Animal::where('class', "Mamífero")->inRandomOrder()->paginate(5);

        $quadros = $animals->shuffle();

        $gameType = "Mamífero";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoClassInseto()
    {
        $animals = Animal::where('class', "Inseto")->inRandomOrder()->paginate(5);

        $quadros = $animals->shuffle();

        $gameType = "Inseto";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoClassPeixe()
    {
        $animals = Animal::where('class', "Peixe")->inRandomOrder()->paginate(5);

        $quadros = $animals->shuffle();

        $gameType = "Peixe";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoClassReptil()
    {
        $animals = Animal::where('class', "Réptil/Anfíbio")->inRandomOrder()->paginate(5);

        $quadros = $animals->shuffle();

        $gameType = "Réptil/Anfíbio";

        return view('telas.jogo', compact('animals', 'quadros', 'gameType'));
    }

    public function jogoOrderCarnivoro()
    {
        $animals = Animal::where('order', "Carnívoro")->inRandomOrder()->paginate(5);

        $quadros = $animals->shuffle();

        $gameType = "Carnívoro";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoOrderHerbivoro()
    {
        $animals = Animal::where('order', "Herbívoro")->inRandomOrder()->paginate(5);

        $quadros = $animals->shuffle();

        $gameType = "Herbívoro";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoOrderOnivoro()
    {
        $animals = Animal::where('order', "Onívoro")->inRandomOrder()->paginate(5);

        $quadros = $animals->shuffle();

        $gameType = "Onívoro";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoHabitatAereo()
    {
        $animals = Animal::where('habitat', "Aéreo")->inRandomOrder()->paginate(5);

        $quadros = $animals->shuffle();

        $gameType = "Aéreo";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoHabitatAquatico()
    {
        $animals = Animal::where('habitat', "Aquático")->inRandomOrder()->paginate(5);

        $quadros = $animals->shuffle();

        $gameType = "Aquático";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoHabitatTerrestre()
    {
        $animals = Animal::where('habitat', "Terrestre")->inRandomOrder()->paginate(5);

        $quadros = $animals->shuffle();

        $gameType = "Terrestre";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoBrasileiro()
    {
        $animals = Animal::where('brazilian', "Sim")->inRandomOrder()->paginate(5);

        $quadros = $animals->shuffle();

        $gameType = "Brasileiros";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoAleatorio()
    {
        $animals = Animal::inRandomOrder()->paginate(5);

        $quadros = $animals->shuffle();

        $gameType = "Aleatório";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }
}
