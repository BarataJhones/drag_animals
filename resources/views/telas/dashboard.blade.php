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
        <link rel="stylesheet" href="{{ asset('css/ranking.css') }}">

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
            <h1 class="text-center">Dashboard</h1>
        </div>
        <div class="container-fluid flex">
            <div class="col pt-5 px-2">
                <div class="card py-3 px-3" style="border: 4px solid #fcd7a4; border-radius: 10px">
                    <div class="d-flex py-2 justify-content-center">
                        <h1>Minhas pontuações</h1>
                    </div>
                    <div class="d-flex py-2 px-4 justify-content-center">
                        <table class="tabela fundo w-100 mb-2">
                            <tbody>
                                @foreach ($rankings as $ranking)
                                <tr>
                                    <td>{{ $ranking->user->name }}</td>
                                    <td>{{ $ranking->time }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        {{ $rankings->links() }}
                    </div>

                    <div class="w-100 pt-1 px-4 pb-2">
                        <a class="button-orange btn btn-lg w-100" href="{{ route('rankin.main') }}" style="border-radius: 40px;">
                            Ver todas as pontuações
                        </a>
                    </div>
                </div>
            </div>
            <div class="col pt-5 px-2 pb-3">
                <div class="w-100 pb-4">
                    <button class="button-orange btn btn-lg w-100" type="button" style="border-radius: 40px;">
                        Jogar
                    </button>
                </div>
                <div class="card py-3 px-3" style="border: 4px solid #fcd7a4; border-radius: 10px">
                    <div class="d-flex py-2 justify-content-center">
                        <h1>Meus animais</h1>
                    </div>
                    <div style="background-color: rgb(252, 227, 191); border-radius: 10px">
                        <div class="font-sans d-flex antialiased py-4 px-2 flex-wrap justify-content-center">
                            @foreach ( $animals as $animal)
                                <section class="d-flex flex-column px-4 justify-content-center text-center">
                                    <div class="card justify-content-center d-block my-2" style="width: 12rem">
                                        <img class="px-2 py-2" src="{{ Storage::disk('s3')->url($animal->image) }}" width="120" alt="">

                                        <div class="card-body">
                                        <h5 style="margin-bottom: 0!important">
                                            <strong>{{ $animal->name }}</strong>
                                        </h5>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">{{ $animal->class }}</li>
                                            <li class="list-group-item">{{ $animal->order }}</li>
                                            <li class="list-group-item">{{ $animal->habitat }}</li>
                                        </ul>

                                        <form action="{{ route('animal.destroy', $animal->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn" style="color: red">
                                                Deletar <i class="fas fa-trash" ></i>
                                            </button>
                                        </form>
                                        
                                    </div>
                                    
                                </section>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center">
                            {{ $animals->links() }}
                        </div>
                    </div>
                    <div class="w-100 pt-4 pb-2">
                        <a class="btn button-orange btn-lg w-100" href="{{ route('animals.register') }}" style="border-radius: 40px">
                            Adicionar novo animal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
