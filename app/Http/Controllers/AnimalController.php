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

        $aula_id = Animal::create($data);

        return redirect()
            ->route('return.index')
            ->with('message', 'Animal cadastrado com sucesso');
    }

    public function listAnimals()
    {
        $user = auth()->user();
        $animals = Animal::where('user_id', $user)->orderBy('id', 'DESC')->paginate();

        //dd($animals);

        return view('telas.index', compact('animals', 'user'));
    }

    public function jogo()
    {
        $animals = Animal::inRandomOrder()->get();

        $quadros = Animal::inRandomOrder()->get();

        return view('telas.jogo', compact('animals', 'quadros'));
    }
}
