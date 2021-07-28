<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Dashboard</title>
        <link rel="shortcut icon" href="https://www.pngkit.com/png/full/392-3929588_kawaii-cute-edit-editing-overlay-png-dog-draw.png" type="image/x-icon">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/dash.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <!-- <link rel="stylesheet" href="{{ asset('css/ranking.css') }}">-->

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        @include('telas.common.header')

        @if (session('message'))
        <div class="mt-3 mx-3 alert alert-success fade show" role="alert">
            {{ session('message') }}
        </div>
        @endif

        <div class="d-flex justify-content-center pt-5">
            <h1 class="text-center">Área do usuário</h1>
        </div>
        <div class="container-fluid flex">
            <div class="col-4 pt-5 px-2">
                <div class="card py-3 px-3" style="border: 4px solid #0086c1; border-radius: 10px">
                    <div class="d-flex py-2 justify-content-center">
                        <h1>Meus dados</h1>
                        <button class="btn">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </div>
                    <div class="d-flex py-2 px-4 justify-content-left">
                        <table class="tabela fundo w-100 mb-2">
                            <tbody>
                                <tr>
                                    <td>{{ Auth::user()->name}}</td>
                                </tr>
                                <tr>
                                    <td>{{ Auth::user()->email}}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col pt-5 px-2 pb-3">
                <div class="card py-3 px-3" style="border: 4px solid #0086c1; border-radius: 10px">
                    <div class="d-flex py-2 justify-content-center">
                        <h1>Meus grupos</h1>
                    </div>

                    <div class="d-flex py-2 px-4 justify-content-left">
                        <div class="tabela fundo w-100 mb-2">

                            @foreach ($groups as $group)

                            <a href="{{ route('group.viewGroup', $group->group->id) }}">
                                        <div class="row" style="background-color: #eef8ff; height: 3em;"> <!-- CORRIGIR RESPONSIVIDADE DA LARGURA-->
                                            <div class="col-4">{{$group->group->name}} </div>
                                            <div class="col-8">{{$group->group->about}} </div></div>                                               
                                        </div>
                                    </a>
                                
                            @endforeach
                                
                                    

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>
