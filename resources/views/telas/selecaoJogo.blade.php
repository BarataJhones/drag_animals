<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<link rel="stylesheet" href="{{asset('css/selecaoJogo.css')}}">
<link rel="stylesheet" href="{{asset('css/main.css')}}">
<title>Drag Animals - Seleção de jogo</title>

<body class="background">
  @include ('telas.common.header')
  
  <section class="container justify-content-center mt-5 section">

    <div class="text-center">
        <h3 class="titulo">
            Escolha o tipo de jogo:
        </h3>

    </div> <br><br>

    <div class="row">

      @yield('selecaoJogo')
  
    </div>

  </section>
</body>

