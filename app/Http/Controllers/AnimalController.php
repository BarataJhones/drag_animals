<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAnimal;
use App\Http\Requests\StoreUpdateRanking;
use App\Models\Animal;
use App\Models\Ranking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

            $image = $request->image->store(path: 'animalsData.image', options:'s3');
            $data['image'] = $image;
        }

        Storage::disk( name: 's3')->setVisibility($image, visibility: 'public');

        //Audio
        
        if ($request->audio->isValid()) {

            $audio = $request->audio->store(path: 'animalsData.audio', options:'s3');
            $data['audio'] = $audio;
        }

        Storage::disk( name: 's3')->setVisibility($audio, visibility: 'public');

        Animal::create($data);

        return redirect()
            ->route('dashboard')
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
        $rankings = Ranking::where('user_id',$user->id)->orderBy('time')->paginate(3);
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

    public function destroy($id)
    {
        if (!$animal = Animal::find($id))
            return redirect()->back();

        if (Storage::disk('s3')->exists($animal->image))
            Storage::disk('s3')->delete($animal->image);

        if (Storage::disk('s3')->exists($animal->audio))
            Storage::disk('s3')->delete($animal->audio);

        $animal->delete();

        return redirect()
            ->back()
            ->with('message', 'Animal deletado com sucesso.');
    }
}