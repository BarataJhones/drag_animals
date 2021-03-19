<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Drag Animals</title>
    <link rel="shortcut icon" href="https://www.pngkit.com/png/full/392-3929588_kawaii-cute-edit-editing-overlay-png-dog-draw.png" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
    @include ('telas.common.header')

    <article class="container" style="margin-top: 5em">
        <section class="row justify-content-center d-block">
            <section>
                <h1 class="header-frase text-xl">DRAG ANIMALS</h1>
                <p class="header-frase" style="font-size: 2em">Aprenda os animais em inglês brincando!</p>
            </section>
            <section class="d-flex justify-content-center mb-3">
                <img src="{{asset('https://www.pngkit.com/png/full/392-3929588_kawaii-cute-edit-editing-overlay-png-dog-draw.png')}}" width="300" alt="">
            </section>
            {{-- <a class="video-popup" href="video/o-portal-acessivel.mp4">
                <div class="col-2 col-xl-1 col-lg-1 col-md-1 col-sm-2 col-xs-2 icone-video"></div>
            </a> --}}
            <section class="d-flex justify-content-center mt-5">
                <section class="d-flex justify-content-between w-50">
                    <a class="btn btn-selection" href="">Sobre</a>
                    <a class="btn btn-selection" href="">Jogar</a>
                    <a class="btn btn-selection" href="">Pontuações</a>
                </section>
            </section>
        </section>
    </article>

    @if (session('message'))
    <div>
        <h5>
            {{ session('message') }}
        </h5>
    </div>
    @endif
    

</body>
</html>