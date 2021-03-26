@include ('telas.common.header')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<link rel="stylesheet" href="{{asset('css/selecaoJogo.css')}}">
<title>Escolha de jogo</title>


<section class="container justify-content-center mt-5 section">

    <div class="text-center">
        <h3>
            Escolha o tipo de jogo:
        </h3>

    </div> <br><br>

    <div class="row">
        <div class="btn-group btnPrincipalMarge col">
            <button class="btn shadow-none button-size btn-orange button-orange btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Classe
            </button>
            <ul class="dropdown-menu w-100">
              <li><a class="dropdown-item subClasse" href="{{ route('jogo.class_ave') }}"><i class="fas fa-crow"></i> Aves</a></li>
              <li><a class="dropdown-item subClasse" href="{{ route('jogo.class_mamifero') }}"><i class="fas fa-dog"></i> Mamíferos</a></li>
              <li><a class="dropdown-item subClasse" href="{{ route('jogo.class_inseto') }}"><i class="fas fa-bug"></i> Insetos</a></li>
              <li><a class="dropdown-item subClasse" href="{{ route('jogo.class_peixe') }}"><i class="fas fa-fish"></i> Peixes</a></li>
              <li><a class="dropdown-item subClasse" href="{{ route('jogo.class_reptil') }}"><i class="fas fa-frog"></i> Reptéis e anfíbios</a></li>
            </ul>
        </div>

        <div class="btn-group btnPrincipalMarge col">
            <button class="btn shadow-none button-size btn-orange button-orange btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ordem
            </button>
            <ul class="dropdown-menu w-100">
              <li><a class="dropdown-item subClasse" href="{{ route('jogo.order_carnivoro') }}"><i class="fas fa-drumstick-bite"></i> Carnívoros</a></li>
              <li><a class="dropdown-item subClasse" href="{{ route('jogo.order_herbivoro') }}"><i class="fas fa-seedling"></i> Herbívoros</a></li>
              <li><a class="dropdown-item subClasse" href="{{ route('jogo.order_onivoro') }}"><i class="fas fa-egg"></i> Onívoros</a></li>
            </ul>
        </div>

        <div class="btn-group btnPrincipalMarge col">
            <button class="btn shadow-none button-size btn-orange button-orange btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Habitat
            </button>
            <ul class="dropdown-menu w-100">
              <li><a class="dropdown-item subClasse" href="{{ route('jogo.habitat_aereo') }}"><i class="fas fa-wind"></i> Aéreos</a></li>
              <li><a class="dropdown-item subClasse" href="{{ route('jogo.habitat_aquatico') }}"><i class="fas fa-tint"></i> Aquáticos</a></li>
              <li><a class="dropdown-item subClasse" href="{{ route('jogo.habitat_terrestre') }}"><i class="fas fa-tree"></i> Terrestre</a></li>
            </ul>
        </div>

        <div class="col btnPrincipalMarge">
            <a class="btn shadow-none button-size button-orange px-2" href="{{ route('jogo.brasileiro') }}">Brasileiros</a>
        </div>

        <div class="col btnPrincipalMarge">
            <a class="btn shadow-none button-size button-orange px-2" href="{{ route('jogo.aleatorio') }}">Aleatório</a>
        </div>
    
    </div>

</section>