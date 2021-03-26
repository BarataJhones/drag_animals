<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAnimal;
use App\Http\Requests\StoreUpdateRanking;
use App\Models\Animal;
use App\Models\Ranking;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        return view('telas.index');
    }

    public function animalsRegister()
    {
        return view('telas.cadastro-animals');
    }

    public function selecaoJogo()
    {
        return view('telas.selecaoJogo');
    }

    public function ranking()
    {
        $rankings = Ranking::orderBy('time')->get();
        return view('telas.ranking', compact('rankings'));
    }

    public function store(StoreUpdateAnimal $request)
    {
        $data = $request->all();

        //Pegar id do usuário
        $user = auth()->user();
        $data['user_id'] = $user->id;

        //Imagem
        if ($request->image->isValid()) {

            $image = $request->image->store('animalsData.image');
            $data['image'] = $image;
        }

        //Audio
        

        if ($request->audio->isValid()) {

            $audio = $request->audio->store('animalsData.audio');
            $data['audio'] = $audio;
        }

        //dd($data['audio']);

        $aula_id = Animal::create($data); //Variável $aula_id Caso precisa usar o id da aula para outra coisa nessa função

        return redirect()
            ->route('return.index')
            ->with('message', 'Animal cadastrado com sucesso');
    }

    public function storeRanking(StoreUpdateRanking $request)
    {
        $data = $request->all();

        //Pegar id do usuário
        $user = auth()->user();
        $data['user_id'] = $user->id;

        Ranking::create($data);

        return redirect()
            ->route('return.index')
            ->with('message', 'Pontuação salva');
    }

    public function listAnimals()
    {
        $user = auth()->user();
        $animals = Animal::where('user_id', $user)->orderBy('id', 'DESC')->paginate();

        //dd($animals);

        return view('telas.index', compact('animals', 'user'));
    }


    //Requisições dos modos de jogo
    public function jogoClassAve()
    {
        $animals = Animal::where('class', "Ave")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        $gameType = "Ave";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoClassAnfibio()
    {
        $animals = Animal::where('class', "Anfíbio")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        $gameType = "Anfíbio";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoClassMamifero()
    {
        $animals = Animal::where('class', "Mamífero")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        $gameType = "Mamífero";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoClassInseto()
    {
        $animals = Animal::where('class', "Inseto")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        $gameType = "Inseto";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoClassPeixe()
    {
        $animals = Animal::where('class', "Peixe")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        $gameType = "Peixe";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoClassReptil()
    {
        $animals = Animal::where('class', "Réptil/Anfíbio")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        $gameType = "Réptil/Anfíbio";

        return view('telas.jogo', compact('animals', 'quadros', 'gameType'));
    }

    public function jogoOrderCarnivoro()
    {
        $animals = Animal::where('order', "Carnívoro")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        $gameType = "Carnívoro";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoOrderHerbivoro()
    {
        $animals = Animal::where('order', "Herbívoro")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        $gameType = "Herbívoro";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoOrderOnivoro()
    {
        $animals = Animal::where('order', "Onívoro")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        $gameType = "Onívoro";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoHabitatAereo()
    {
        $animals = Animal::where('habitat', "Aéreo")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        $gameType = "Aéreo";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoHabitatAquatico()
    {
        $animals = Animal::where('habitat', "Aquático")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        $gameType = "Aquático";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoHabitatTerrestre()
    {
        $animals = Animal::where('habitat', "Terrestre")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        $gameType = "Terrestre";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoBrasileiro()
    {
        $animals = Animal::where('brazilian', "Sim")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        $gameType = "Brasileiros";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }

    public function jogoAleatorio()
    {
        $animals = Animal::inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        $gameType = "Aleatório";

        return view('telas.jogo', compact('animals', 'quadros', "gameType"));
    }
  
}
