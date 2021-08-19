<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

use App\Models\Group;
use App\Models\Animal_User;
use App\Models\Ranking;

class GameModesController extends Controller
{
    public function jogoClassAve($id)
    {
        $user = auth()->user();

        $gameType = "Ave";

        if (!$group = Group::find($id)) {
            $group = null;
            $id = 0;
        }

        $animals = Animal::where('class', "Ave")->inRandomOrder()->paginate(3); ////MUDEI A QUANTIDADE DE ANIMAIS
        $quadros = $animals->shuffle();
        $animalSelecs = $animals->shuffle();

        if ($user != null) {
            $histories = Animal_User::where('user_id', $user->id)->get();

            if (Animal_User::exists()) {

                foreach ($animalSelecs as $key => $animalSelec) {
                    foreach ($histories as $historie) {
                        if ($animalSelec->id == $historie->animal_id) {
                            unset($animalSelecs[$key]);
                        }
                    }
                    $animalCard = $animalSelecs->shuffle()->first();
                }
            } else {
                $animalCard = $animalSelecs->shuffle()->first();
            }
        } else {
            $animalCard = null;
        }


        session(['card' => $animalCard]);
        session(['group' => $group]);

        return view('telas.jogo', compact('animals', 'quadros', 'animalCard', "gameType", 'group'));
    }

    public function jogoClassAnfibio($id)
    {
        $user = auth()->user();

        $gameType = "Anfíbio";

        if (!$group = Group::find($id)) {
            $group = null;
            $id = 0;
        }

        $animals = Animal::where('class', "Anfíbio")->inRandomOrder()->paginate(3); ////MUDEI A QUANTIDADE DE ANIMAIS
        $quadros = $animals->shuffle();
        $animalSelecs = $animals->shuffle();

        if ($user != null) {
            $histories = Animal_User::where('user_id', $user->id)->get();

            if (Animal_User::exists()) {

                foreach ($animalSelecs as $key => $animalSelec) {
                    foreach ($histories as $historie) {
                        if ($animalSelec->id == $historie->animal_id) {
                            unset($animalSelecs[$key]);
                        }
                    }
                    $animalCard = $animalSelecs->shuffle()->first();
                }
            } else {
                $animalCard = $animalSelecs->shuffle()->first();
            }
        } else {
            $animalCard = null;
        }


        session(['card' => $animalCard]);
        session(['group' => $group]);

        return view('telas.jogo', compact('animals', 'quadros', 'animalCard', "gameType", 'group'));
    }

    public function jogoClassMamifero($id)
    {
        $user = auth()->user();

        $gameType = "Mamífero";

        if (!$group = Group::find($id)) {
            $group = null;
            $id = 0;
        }

        $animals = Animal::where('class', "Mamífero")->inRandomOrder()->paginate(3); ////MUDEI A QUANTIDADE DE ANIMAIS
        $quadros = $animals->shuffle();
        $animalSelecs = $animals->shuffle();

        if ($user != null) {
            $histories = Animal_User::where('user_id', $user->id)->get();

            if (Animal_User::exists()) {

                foreach ($animalSelecs as $key => $animalSelec) {
                    foreach ($histories as $historie) {
                        if ($animalSelec->id == $historie->animal_id) {
                            unset($animalSelecs[$key]);
                        }
                    }
                    $animalCard = $animalSelecs->shuffle()->first();
                }
            } else {
                $animalCard = $animalSelecs->shuffle()->first();
            }
        }else{
            $animalCard = null;
        }


        session(['card' => $animalCard]);
        session(['group' => $group]);

        return view('telas.jogo', compact('animals', 'quadros', 'animalCard', "gameType", 'group'));
    }

    public function jogoClassInseto($id)
    {
        $user = auth()->user();

        $gameType = "Inseto";

        if (!$group = Group::find($id)) {
            $group = null;
            $id = 0;
        }

        $animals = Animal::where('class', "Inseto")->inRandomOrder()->paginate(3); ////MUDEI A QUANTIDADE DE ANIMAIS
        $quadros = $animals->shuffle();
        $animalSelecs = $animals->shuffle();

        if ($user != null) {
            $histories = Animal_User::where('user_id', $user->id)->get();

            if (Animal_User::exists()) {

                foreach ($animalSelecs as $key => $animalSelec) {
                    foreach ($histories as $historie) {
                        if ($animalSelec->id == $historie->animal_id) {
                            unset($animalSelecs[$key]);
                        }
                    }
                    $animalCard = $animalSelecs->shuffle()->first();
                }
            } else {
                $animalCard = $animalSelecs->shuffle()->first();
            }
        }else{
            $animalCard = null;
        }


        session(['card' => $animalCard]);
        session(['group' => $group]);

        return view('telas.jogo', compact('animals', 'quadros', 'animalCard', "gameType", 'group'));
    }

    public function jogoClassPeixe($id)
    {
        $user = auth()->user();

        $gameType = "Peixe";

        if (!$group = Group::find($id)) {
            $group = null;
            $id = 0;
        }

        $animals = Animal::where('class', "Peixe")->inRandomOrder()->paginate(3); ////MUDEI A QUANTIDADE DE ANIMAIS
        $quadros = $animals->shuffle();
        $animalSelecs = $animals->shuffle();

        if ($user != null) {
            $histories = Animal_User::where('user_id', $user->id)->get();

            if (Animal_User::exists()) {

                foreach ($animalSelecs as $key => $animalSelec) {
                    foreach ($histories as $historie) {
                        if ($animalSelec->id == $historie->animal_id) {
                            unset($animalSelecs[$key]);
                        }
                    }
                    $animalCard = $animalSelecs->shuffle()->first();
                }
            } else {
                $animalCard = $animalSelecs->shuffle()->first();
            }
        }else{
            $animalCard = null;
        }


        session(['card' => $animalCard]);
        session(['group' => $group]);

        return view('telas.jogo', compact('animals', 'quadros', 'animalCard', "gameType", 'group'));
    }

    public function jogoClassReptil($id)
    {
        $user = auth()->user();

        $gameType = "Réptil/Anfíbio";

        if (!$group = Group::find($id)) {
            $group = null;
            $id = 0;
        }

        $animals = Animal::where('class', "Réptil/Anfíbio")->inRandomOrder()->paginate(3); ////MUDEI A QUANTIDADE DE ANIMAIS
        $quadros = $animals->shuffle();
        $animalSelecs = $animals->shuffle();

        if ($user != null) {
            $histories = Animal_User::where('user_id', $user->id)->get();

            if (Animal_User::exists()) {

                foreach ($animalSelecs as $key => $animalSelec) {
                    foreach ($histories as $historie) {
                        if ($animalSelec->id == $historie->animal_id) {
                            unset($animalSelecs[$key]);
                        }
                    }
                    $animalCard = $animalSelecs->shuffle()->first();
                }
            } else {
                $animalCard = $animalSelecs->shuffle()->first();
            }
        }else{
            $animalCard = null;
        }


        session(['card' => $animalCard]);
        session(['group' => $group]);

        return view('telas.jogo', compact('animals', 'quadros', 'animalCard', "gameType", 'group'));
    }

    public function jogoOrderCarnivoro($id)
    {
        $user = auth()->user();

        $gameType = "Carnívoro";

        if (!$group = Group::find($id)) {
            $group = null;
            $id = 0;
        }

        $animals = Animal::where('order', "Carnívoro")->inRandomOrder()->paginate(3); ////MUDEI A QUANTIDADE DE ANIMAIS
        $quadros = $animals->shuffle();
        $animalSelecs = $animals->shuffle();

        if ($user != null) {
            $histories = Animal_User::where('user_id', $user->id)->get();

            if (Animal_User::exists()) {

                foreach ($animalSelecs as $key => $animalSelec) {
                    foreach ($histories as $historie) {
                        if ($animalSelec->id == $historie->animal_id) {
                            unset($animalSelecs[$key]);
                        }
                    }
                    $animalCard = $animalSelecs->shuffle()->first();
                }
            } else {
                $animalCard = $animalSelecs->shuffle()->first();
            }
        }else{
            $animalCard = null;
        }


        session(['card' => $animalCard]);
        session(['group' => $group]);

        return view('telas.jogo', compact('animals', 'quadros', 'animalCard', "gameType", 'group'));
    }

    public function jogoOrderHerbivoro($id)
    {
        $user = auth()->user();

        $gameType = "Herbívoro";

        if (!$group = Group::find($id)) {
            $group = null;
            $id = 0;
        }

        $animals = Animal::where('order', "Herbívoro")->inRandomOrder()->paginate(3); ////MUDEI A QUANTIDADE DE ANIMAIS
        $quadros = $animals->shuffle();
        $animalSelecs = $animals->shuffle();

        if ($user != null) {
            $histories = Animal_User::where('user_id', $user->id)->get();

            if (Animal_User::exists()) {

                foreach ($animalSelecs as $key => $animalSelec) {
                    foreach ($histories as $historie) {
                        if ($animalSelec->id == $historie->animal_id) {
                            unset($animalSelecs[$key]);
                        }
                    }
                    $animalCard = $animalSelecs->shuffle()->first();
                }
            } else {
                $animalCard = $animalSelecs->shuffle()->first();
            }
        }else{
            $animalCard = null;
        }


        session(['card' => $animalCard]);
        session(['group' => $group]);

        return view('telas.jogo', compact('animals', 'quadros', 'animalCard', "gameType", 'group'));
    }

    public function jogoOrderOnivoro($id)
    {
        $user = auth()->user();

        $gameType = "Onívoro";

        if (!$group = Group::find($id)) {
            $group = null;
            $id = 0;
        }

        $animals = Animal::where('order', "Onívoro")->inRandomOrder()->paginate(3); ////MUDEI A QUANTIDADE DE ANIMAIS
        $quadros = $animals->shuffle();
        $animalSelecs = $animals->shuffle();

        if ($user != null) {
            $histories = Animal_User::where('user_id', $user->id)->get();

            if (Animal_User::exists()) {

                foreach ($animalSelecs as $key => $animalSelec) {
                    foreach ($histories as $historie) {
                        if ($animalSelec->id == $historie->animal_id) {
                            unset($animalSelecs[$key]);
                        }
                    }
                    $animalCard = $animalSelecs->shuffle()->first();
                }
            } else {
                $animalCard = $animalSelecs->shuffle()->first();
            }
        }else{
            $animalCard = null;
        }


        session(['card' => $animalCard]);
        session(['group' => $group]);

        return view('telas.jogo', compact('animals', 'quadros', 'animalCard', "gameType", 'group'));
    }

    public function jogoHabitatAereo($id)
    {
        $user = auth()->user();

        $gameType = "Aéreo";

        if (!$group = Group::find($id)) {
            $group = null;
            $id = 0;
        }

        $animals = Animal::where('habitat', "Aéreo")->inRandomOrder()->paginate(3); ////MUDEI A QUANTIDADE DE ANIMAIS
        $quadros = $animals->shuffle();
        $animalSelecs = $animals->shuffle();

        if ($user != null) {
            $histories = Animal_User::where('user_id', $user->id)->get();

            if (Animal_User::exists()) {

                foreach ($animalSelecs as $key => $animalSelec) {
                    foreach ($histories as $historie) {
                        if ($animalSelec->id == $historie->animal_id) {
                            unset($animalSelecs[$key]);
                        }
                    }
                    $animalCard = $animalSelecs->shuffle()->first();
                }
            } else {
                $animalCard = $animalSelecs->shuffle()->first();
            }
        }else{
            $animalCard = null;
        }


        session(['card' => $animalCard]);
        session(['group' => $group]);

        return view('telas.jogo', compact('animals', 'quadros', 'animalCard', "gameType", 'group'));
    }

    public function jogoHabitatAquatico($id)
    {
        $user = auth()->user();

        $gameType = "Aquático";

        if (!$group = Group::find($id)) {
            $group = null;
            $id = 0;
        }

        $animals = Animal::where('habitat', "Aquático")->inRandomOrder()->paginate(3); ////MUDEI A QUANTIDADE DE ANIMAIS
        $quadros = $animals->shuffle();
        $animalSelecs = $animals->shuffle();

        if ($user != null) {
            $histories = Animal_User::where('user_id', $user->id)->get();

            if (Animal_User::exists()) {

                foreach ($animalSelecs as $key => $animalSelec) {
                    foreach ($histories as $historie) {
                        if ($animalSelec->id == $historie->animal_id) {
                            unset($animalSelecs[$key]);
                        }
                    }
                    $animalCard = $animalSelecs->shuffle()->first();
                }
            } else {
                $animalCard = $animalSelecs->shuffle()->first();
            }
        }else{
            $animalCard = null;
        }


        session(['card' => $animalCard]);
        session(['group' => $group]);

        return view('telas.jogo', compact('animals', 'quadros', 'animalCard', "gameType", 'group'));
    }

    public function jogoHabitatTerrestre($id)
    {
        $user = auth()->user();

        $gameType = "Terrestre";

        if (!$group = Group::find($id)) {
            $group = null;
            $id = 0;
        }

        $animals = Animal::where('habitat', "Terrestre")->inRandomOrder()->paginate(3); ////MUDEI A QUANTIDADE DE ANIMAIS
        $quadros = $animals->shuffle();
        $animalSelecs = $animals->shuffle();

        if ($user != null) {
            $histories = Animal_User::where('user_id', $user->id)->get();

            if (Animal_User::exists()) {

                foreach ($animalSelecs as $key => $animalSelec) {
                    foreach ($histories as $historie) {
                        if ($animalSelec->id == $historie->animal_id) {
                            unset($animalSelecs[$key]);
                        }
                    }
                    $animalCard = $animalSelecs->shuffle()->first();
                }
            } else {
                $animalCard = $animalSelecs->shuffle()->first();
            }
        }else{
            $animalCard = null;
        }


        session(['card' => $animalCard]);
        session(['group' => $group]);

        return view('telas.jogo', compact('animals', 'quadros', 'animalCard', "gameType", 'group'));
    }

    public function jogoBrasileiro($id)
    {
        $user = auth()->user();

        $gameType = "Brasileiros";

        if (!$group = Group::find($id)) {
            $group = null;
            $id = 0;
        }

        $animals = Animal::where('brazilian', "Sim")->inRandomOrder()->paginate(3); ////MUDEI A QUANTIDADE DE ANIMAIS
        $quadros = $animals->shuffle();
        $animalSelecs = $animals->shuffle();

        if ($user != null) {
            $histories = Animal_User::where('user_id', $user->id)->get();

            if (Animal_User::exists()) {

                foreach ($animalSelecs as $key => $animalSelec) {
                    foreach ($histories as $historie) {
                        if ($animalSelec->id == $historie->animal_id) {
                            unset($animalSelecs[$key]);
                        }
                    }
                    $animalCard = $animalSelecs->shuffle()->first();
                }
            } else {
                $animalCard = $animalSelecs->shuffle()->first();
            }
        }else{
            $animalCard = null;
        }


        session(['card' => $animalCard]);
        session(['group' => $group]);

        return view('telas.jogo', compact('animals', 'quadros', 'animalCard', "gameType", 'group'));
    }

    public function jogoAleatorio($id)
    {
        $user = auth()->user();

        $gameType = "Aleatório";

        if (!$group = Group::find($id)) {
            $group = null;
            $id = 0;
        }

        $animals = Animal::inRandomOrder()->paginate(3); ////MUDEI A QUANTIDADE DE ANIMAIS
        $quadros = $animals->shuffle();
        $animalSelecs = $animals->shuffle();

        if ($user != null) {
            $histories = Animal_User::where('user_id', $user->id)->get();

            if (Animal_User::exists()) {

                foreach ($animalSelecs as $key => $animalSelec) {
                    foreach ($histories as $historie) {
                        if ($animalSelec->id == $historie->animal_id) {
                            unset($animalSelecs[$key]);
                        }
                    }
                    $animalCard = $animalSelecs->shuffle()->first();
                }
            } else {
                $animalCard = $animalSelecs->shuffle()->first();
            }
        } else {
            $animalCard = null;
        }


        session(['card' => $animalCard]);
        session(['group' => $group]);

        return view('telas.jogo', compact('animals', 'quadros', 'animalCard', "gameType", 'group'));
    }
}
