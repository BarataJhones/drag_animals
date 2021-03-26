
<title>Drag Animals</title>
<link rel="shortcut icon"
    href="https://www.pngkit.com/png/full/392-3929588_kawaii-cute-edit-editing-overlay-png-dog-draw.png"
    type="image/x-icon">
<link rel="stylesheet" href="{{asset('css/main.css')}}">


<body>
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
            <section class="d-flex justify-content-center mb-3">
                <img src="{{asset('https://www.pngkit.com/png/full/392-3929588_kawaii-cute-edit-editing-overlay-png-dog-draw.png')}}"
                    width="300" alt="">
            </section>
            <section class="d-flex justify-content-center mt-5">
                <section class="flex justify-content-between">
                    <a class="btn mrg-l shadow-none button-size button-orange w-100 mb-2" href="">Sobre</a>
                    <a class="btn mrg-l shadow-none button-size button-orange w-100 mb-2" href="{{ route('animals.selecao') }}">Jogar</a>
                    <a class="btn mrg-l shadow-none button-size button-orange w-100 mb-2" href="{{ route('rankin.main') }}">Pontuações</a>
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