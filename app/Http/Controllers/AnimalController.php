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
        $rankings = Ranking::orderBy('time')->paginate(10);
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
            ->route('rankin.main')
            ->with('message', 'Pontuação salva');
    }

    public function dashboard()
    {
        $user = auth()->user();
        $rankings = Ranking::where('user_id',$user->id)->orderBy('time')->get();
        $animals = Animal::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(3);

        //dd($animals);

        return view('telas.dashboard', compact('user', 'rankings', 'animals'));
    }

    public function listAnimals()
    {
        $animals = Animal::orderBy('id', 'DESC')->paginate(10);

        //dd($animals);

        return view('telas.listaAnimals', compact('animals'));
    }

    public function searchAnimal(Request $request)
    {
        $filters = $request->all();

        $animals = Animal::where('name', 'LIKE', "%{$request->search}%")
                        ->orWhere('class', 'LIKE', "%{$request->search}%")
                        ->orWhere('order', 'LIKE', "%{$request->search}%")
                        ->orWhere('habitat', 'LIKE', "%{$request->search}%")
                        ->orWhereHas('user', function($q) use($request){
                            $q->where('name', 'LIKE', "%{$request->search}%");
                        })->paginate(9);

        return view('telas.listaAnimals', compact('animals', 'filters'))
                ->with('message', 'Resultado da busca:');
    }

    public function searchRanking(Request $request)
    {
        $filters = $request->all();

        $rankings = Ranking::where('game_type', 'LIKE', "%{$request->search}%")

                        ->orWhereHas('user', function($q) use($request){
                            $q->where('name', 'LIKE', "%{$request->search}%");
                        })
                        ->orWhereHas('user', function($q) use($request){
                            $q->where('institution', 'LIKE', "%{$request->search}%");
                        })
                        ->paginate(10);

        return view('telas.ranking', compact('rankings', 'filters'))
                ->with('message', 'Resultado da busca:');
    }
}