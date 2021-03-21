<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAnimal;
use App\Models\Animal;
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

    public function listAnimals()
    {
        $animals = Animal::orderBy('id', 'DESC')->get();

        //dd($animals);

        return view('telas.index', compact('animals'));
    }


    //Requisições dos modos de jogo
    public function jogoClassMamifero()
    {
        $animals = Animal::where('class', "Mamífero")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        return view('telas.jogo', compact('animals', 'quadros'));
    }

    public function jogoClassAve()
    {
        $animals = Animal::where('class', "Ave")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        return view('telas.jogo', compact('animals', 'quadros'));
    }

    public function jogoClassInseto()
    {
        $animals = Animal::where('class', "Inseto")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        return view('telas.jogo', compact('animals', 'quadros'));
    }

    public function jogoClassPeixe()
    {
        $animals = Animal::where('class', "Peixe")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        return view('telas.jogo', compact('animals', 'quadros'));
    }

    public function jogoClassReptil()
    {
        $animals = Animal::where('class', "Réptil")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        return view('telas.jogo', compact('animals', 'quadros'));
    }

    public function jogoOrderCarnivoro()
    {
        $animals = Animal::where('order', "Carnívoro")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        return view('telas.jogo', compact('animals', 'quadros'));
    }

    public function jogoOrderHerbivoro()
    {
        $animals = Animal::where('order', "Herbívoro")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        return view('telas.jogo', compact('animals', 'quadros'));
    }

    public function jogoOrderOnivoro()
    {
        $animals = Animal::where('order', "Onívoro")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        return view('telas.jogo', compact('animals', 'quadros'));
    }

    public function jogoHabitatAereo()
    {
        $animals = Animal::where('habitat', "Aéreo")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        return view('telas.jogo', compact('animals', 'quadros'));
    }

    public function jogoHabitatAquatico()
    {
        $animals = Animal::where('habitat', "Aquático")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        return view('telas.jogo', compact('animals', 'quadros'));
    }

    public function jogoHabitatTerrestre()
    {
        $animals = Animal::where('habitat', "Terrestre")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        return view('telas.jogo', compact('animals', 'quadros'));
    }

    public function jogoBrasileiro()
    {
        $animals = Animal::where('brazilian', "Sim")->inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        return view('telas.jogo', compact('animals', 'quadros'));
    }

    public function jogoAleatorio()
    {
        $animals = Animal::inRandomOrder()->paginate(3);

        $quadros = $animals->shuffle();

        return view('telas.jogo', compact('animals', 'quadros'));
    }
  
}
