<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>
    <link rel="shortcut icon"
        href="https://www.pngkit.com/png/full/392-3929588_kawaii-cute-edit-editing-overlay-png-dog-draw.png"
        type="image/x-icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/dash.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/ranking.css') }}">-->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="background">
    @include('telas.common.header')

    @if (session('message'))
    <div class="mt-3 mx-3 alert alert-success fade show" role="alert">
        {{ session('message') }}
    </div>
    @endif

    <div class="container-fluid userData">

        <div class="row">
            <div class="col d-flex justify-content-center"> <!--  style="margin-right: 2.5em" -->
                <!--<button class="btn botaoEdit">
                    <i class="fas fa-pencil-alt"></i>
                </button> -->
                <img src="{{ Storage::disk('s3')->url(Auth::user()->avatar) }}" class="avatarDash">
            </div>
        </div>

        <div class="row text-center">
            <div class="col">
                <h2>{{Auth::user()->name}}</h2>
            </div>
        </div>

    </div>

    <div class="container-fluid flex">

        <div class="col-3 py-3 px-3">

            <div class="sideArea justify-content-left">
                <div class="row d-flex py-2">
                    <div class="col d-flex justify-content-end">
                        <h5>Meus Dados</h5>
                    </div>
                    <div class="col-5 d-flex justify-content-center">
                        <a href="{{ route('edit-user') }}">
                            <i class="fas fa-pencil-alt"></i> Editar
                        </a>
                    </div>
                </div>

                <div style="padding: 1em;">
                    <i class="fas fa-envelope icons"></i>{{Auth::user()->email}}<br>
                    <i class="fas fa-birthday-cake icons"></i>{{Auth::user()->birthday}}<br>
                    <i class="fas fa-genderless icons"></i>

                    @switch($gender = Auth::user()->gender)
                        @case($gender == "female")
                            Feminino
                            @break
                        @case($gender == "male")
                            Masculino
                            @break
                        @case($gender == "nonbinary")
                            Não-binário
                            @break
                        @case($gender == "other")
                            Outro
                            @break
                        @default
                    @endswitch
                    <br>

                    <i class="fas fa-school icons"></i>{{Auth::user()->institution}}<br>
                    <i class="fas fa-graduation-cap icons"></i>{{Auth::user()->grade}}
                </div>

            </div>

            <div class="sideArea">
                <div class="row d-flex py-2">
                    <div class="col d-flex justify-content-end">
                        <h5>Meus Grupos</h5>
                    </div>
                    <div class="col-5 d-flex justify-content-center">
                        <a href="{{ route('group.create') }}"> 
                            <i class="fas fa-plus"></i> Criar grupo
                        </a>
                    </div>
                </div>


                <table class="tabela w-100 mb-2">
                    <tbody>
                        @foreach ($groups as $group)
                        <tr>
                            <td>
                                <a href="{{ route('group.viewGroup', $group->group->id) }}">
                                    <img class="groupImage" src="{{Storage::disk('s3')->url($group->group->image)}}"
                                        alt=""> {{$group->group->name}}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-5 py-3 px-3">
            <div class="sideArea">
                <div class="row d-flex py-2">
                    <div class="col d-flex justify-content-end">
                        <h5>Minhas últimas figurinhas</h5>
                    </div>
                    <div class="col-5 d-flex justify-content-center">
                        <a href="{{ route('album')  }}">
                            <i class="fas fa-book-open"></i> Meu álbum
                        </a>
                    </div>
                </div>

                <div class="container font">
                    <div class="row justify-content-around">

                        @foreach ($animalsCards as $animalsCard)

                            <div class="col">

                                <div class="quadro text-center" style="margin-bottom: 1em">
                                    
                                    <img class="cromoBackground" src="{{ Storage::disk('s3')->url('img-cromo-fundo.png') }}" alt="">
                                    <img class="cromoAnimal"
                                        src="{{ Storage::disk('s3')->url($animalsCard->animal->image) }}" alt="">

                                    <p class="cromoNumber">{{ $animalsCard->animal->id }}</p>

                                    <div class="cromoDetail">
                                        {{$animalsCard->animal->nameEnglish}}<br>
                                        {{$animalsCard->animal->namePort}}<br>
                                        <p class="cronoAnimalNameSci">{{$animalsCard->animal->nameSci}}</p>
                                    </div>

                                    <button type="button" value="PLAY" onclick="play('audio_{{ $animalsCard->animal->id }}')"
                                        class="btn botaoAudio" style="margin-bottom: 1em; font-size: 0.8em"><i class="fas fa-volume-up"></i>
                                    </button>
                                    <audio id="audio_{{ $animalsCard->animal->id }}" src="{{ Storage::disk('s3')->url($animalsCard->animal->audio) }}"></audio> 
                                    
                                </div>

                            </div>
                        
                        @endforeach

                    </div>
                </div>

            </div>
        </div>


        <div class="col-4 py-3 px-3">
            <div class="sideArea">
                <div class="row d-flex py-2">
                    <div class="col d-flex justify-content-end">
                        <h5>Minhas Pontuações</h5>
                    </div>
                    <div class="col-5 d-flex justify-content-center">
                        <a href="{{ route('rankin.main')  }}">
                            <i class="fas fa-trophy"></i> Ranking geral
                        </a>
                    </div>
                </div>

                    <table class="table table-striped" style="background-color: white">
                        @php $position = 1 @endphp
                        <thead class="fundo">
                            <tr>
                                <th scope="col">Posição</th>

                                <th scope="col">Tempo</th>
                                <th scope="col">Categoria</th>
    
                                <th scope="col">Grupo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rankings as $ranking)
                                <tr>
                                    <th scope="row">{{ $position }}</th>

                                    <td><b>{{ $ranking->time }}</b></td>
                                    <td>{{ $ranking->game_type }}</td>
                
                                    @if ($ranking->group_id !=null)
                                        <td>{{ $ranking->groupRank->name  }}</td>
                                    @else
                                        <td></td>
                                    @endif
            
                                    @php $position++ @endphp
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

            </div>
        </div>



















    </div>
</body>

</html>