<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAnimal;
use App\Http\Requests\StoreUpdateRanking;
use App\Http\Requests\StoreUpdateGroup;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Animal;
use App\Models\Animal_User;
use App\Models\Ranking;
use App\Models\Group;
use App\Models\User;
use App\Models\Group_User;
use Auth;
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
        $group = null;
        return view('telas.selecaoJogoNormal', compact('group'));
    }

    public function selecaoJogoGrupo($id)
    {
        
        if (!$group = Group::find($id)) {
            $group = 0;
        }

        return view('telas.selecaoJogoGrupo', compact('group'));
    }

    public function ranking()
    {
        $rankings = Ranking::orderBy('time')->paginate(10);
        return view('telas.ranking', compact('rankings'));
    }

    public function rankingGrupo($id)
    {
        if (!$group = Group::find($id)) {
            return redirect()->route('dashboard');
        }

        $rankings = Ranking::where('group_id', $group->id)->orderBy('time')->paginate(10);
        $groupName = $group->name;
        return view('telas.rankingGrupo', compact('rankings', 'groupName'));
    }

    public function album()
    { ////////////////////////////////////////////////////////

        $user = auth()->user();

        $animals = Animal::paginate();

        $animalsCards = Animal_User::where('user_id', $user->id)->get();

        return view('telas.album', compact('animals', 'animalsCards'));
    }

    public function grupo()
    {
        return view('telas.grupo');
    }

    public function grupoCreate()
    {
        return view('telas.grupoCreate');
    }

    public function store(StoreUpdateAnimal $request)
    {
        $data = $request->all();

        //Pegar id do usuário
        $user = auth()->user();
        $data['user_id'] = $user->id;

        //Imagem
        if ($request->image->isValid()) {

            $image = $request->image->store(path: 'animalsData.image', options: 's3');
            $data['image'] = $image;
        }

        Storage::disk(name: 's3')->setVisibility($image, visibility: 'public');

        //Audio

        if ($request->audio->isValid()) {

            $audio = $request->audio->store(path: 'animalsData.audio', options: 's3');
            $data['audio'] = $audio;
        }

        Storage::disk(name: 's3')->setVisibility($audio, visibility: 'public');

        Animal::create($data);

        return redirect()
            ->route('dashboard')
            ->with('message', 'Animal cadastrado com sucesso');
    }

    public function storeRanking(StoreUpdateRanking $request) //MUDAR NOME
    {
        $data = $request->all();

        //Pegar id do usuário
        $user = auth()->user();
        $data['user_id'] = $user->id;

        $group = session('group');

        //($group);

        if ($group == null) {
            $data['group_id'] = null;
        } else{
            $data['group_id'] = $group->id;
        }
        
        //dd($data['group_id']);

        Ranking::create($data);

        $card = session('card');

        $user = auth()->user();
        $user->animalsAlbum()->attach($card->id);
        Animal::findOrFail($card->id);


        return redirect()
            ->route('rankin.main')
            ->with('message', 'Pontuação salva');
    }

    public function dashboard()
    {
        $user = auth()->user();
        $rankings = Ranking::where('user_id', $user->id)->orderBy('time')->paginate(3);
        $animals = Animal::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(3);
        $groups = Group_User::where('user_id', $user->id)->paginate(3);
        $animalsCards = Animal_User::where('user_id', $user->id)->paginate(4);

        return view('telas.dashboard', compact('user', 'rankings', 'animals', 'groups', 'animalsCards'));
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
            ->orWhereHas('user', function ($q) use ($request) {
                $q->where('name', 'LIKE', "%{$request->search}%");
            })->paginate(9);

        return view('telas.listaAnimals', compact('animals', 'filters'))
            ->with('message', 'Resultado da busca:');
    }

    public function searchRanking(Request $request)
    {
        $filters = $request->all();

        $rankings = Ranking::where('game_type', 'LIKE', "%{$request->search}%")

            ->orWhereHas('user', function ($q) use ($request) {
                $q->where('name', 'LIKE', "%{$request->search}%");
            })
            ->orWhereHas('user', function ($q) use ($request) {
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

    public function storeGroup(StoreUpdateGroup $request)
    {

        $data = $request->all();

        //Pegar id do usuário
        $user = auth()->user();
        $data['user_id'] = $user->id;

        //Imagem
        if ($request->image->isValid()) {

            $image = $request->image->store(path: 'groupData.image', options: 's3');
            $data['image'] = $image;
        }

        Storage::disk(name: 's3')->setVisibility($image, visibility: 'public');

        $group_id = Group::create($data);

        //Colocar user criados na lista de membros
        if ((Auth::id() != null)) {
            $user = auth()->user();
            $user->groupUsers()->attach($group_id);
            Group::findOrFail($group_id);
        }

        return redirect()
            ->route('telas.dashboard')
            ->with('message', 'Grupo criado com sucesso');
    }

    public function viewGroup($id, $auth = 0)
    {

        if (!$group = Group::find($id)) {
            return redirect()->route('dashboard');
        }

        $userLog = auth()->user();
        $users = User::get();
        $members = Group_User::where('group_id', $group->id)->get();
        $groupAdm = User::where('id', $group->user_id)->first()->toArray();
        $memberCount = count($members);

        //Verificando se o user logado está no grupo
        foreach ($members as $member) {
            if ($userLog->id == $member->user_id) {
                $auth++;
            }
        }

        if ($auth == 0) {
            return redirect()
                ->back()
                ->with('message', 'Você não tem permissão parar visualizar este grupo.');
        }

        //Verificando e pegando os usuários que não estão no grupo
        foreach ($users as $key => $user) {
            foreach ($members as $member) {
                if ($user->id == $member->user_id) {
                    unset($users[$key]);
                }
            }
        }

        return view('telas.grupo', compact('group', 'groupAdm', 'members', 'memberCount', 'users'));
    }

    public function groupAdd($id, Request $request)
    {

        $idUser = $request->input('id');
        $userAdd = User::find($idUser);

        //dd($user);

        $userAdd->groupUsers()->attach($id);
        Group::findOrFail($id);

        return redirect()
            ->route('group.viewGroup', ['id' => $id])
            ->with('message', 'Usuário adicionado ao grupo');
    }
}
