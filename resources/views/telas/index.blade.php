
<title>Drag Animals</title>
<link rel="shortcut icon"
    href="https://www.pngkit.com/png/full/392-3929588_kawaii-cute-edit-editing-overlay-png-dog-draw.png"
    type="image/x-icon">
<link rel="stylesheet" href="{{asset('css/main.css')}}">
<link rel="stylesheet" href="{{asset('css/index.css')}}">


<body class="background">
    @include ('telas.common.header')

    @if (session('message'))
    <div class="mt-3 mx-3 alert alert-success fade show" role="alert">
        {{ session('message') }}
    </div>
    @endif

    <article class="container" style="margin-top: 5em">

        <section class="row justify-content-center d-block">
            <section>
                <h1 class="header-frase text-xl">DRAG ANIMALS</h1>
                <p class="header-frase" style="font-size: 2em">Aprenda os animais em inglês brincando!</p>
            </section>
            <section class="d-flex justify-content-center mt-5">
                <section class="row flex justify-content-between">

                    <div class="col quadro-jogar d-flex justify-content-center">
                        <a href="{{ route('animals.selecao') }}">
                        <img class="quadro-imagem center-block" src="storage/img-jogar.png" alt="">
                        <div class="botao"><i class="fas fa-gamepad"></i> Jogar</div>
                        </a>
                    </div>

                    <div class="col quadro-jogar d-flex justify-content-center">
                        <a href="{{ route('rankin.main') }}">
                        <img class="quadro-imagem center-block" src="storage/img-ranking.png" alt="">
                        <div class="botao"><i class="fas fa-trophy"></i> Pontuações</div>
                        </a>
                    </div>
                    
                    <div class="col quadro-jogar d-flex justify-content-center">
                        <a href="{{ route('dashboard') }}">
                        <img class="quadro-imagem center-block" src="storage/img-dashboard.png" alt="">
                        <div class="botao"><i class="fas fa-user"></i> Área do usuário</div>
                        </a>
                    </div>

                    <div class="col quadro-jogar d-flex justify-content-center">
                        <a href="{{ route('album') }}">
                        <img class="quadro-imagem center-block" src="storage/img-album.png" alt="">
                        <div class="botao"><i class="fas fa-book-open"></i> Meu álbum</div>
                        </a>
                    </div>

                </section>
            </section>
        </section>
    </article>
</body>
<script type="text/javascript">
    $(".alert").delay(5000).slideUp(200, function () {
        $(this).alert('close');
    });
</script>

</html>