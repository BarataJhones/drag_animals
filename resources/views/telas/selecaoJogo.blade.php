@include ('telas.common.header')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<link rel="stylesheet" href="{{asset('css/selecaoJogo.css')}}">


<section class="container justify-content-center mt-5 section">

    <div class="text-center">
        <h3>
            Escolha o tipo de jogo:
        </h3>

    </div> <br><br>

    <div class="row">
        
        <div class="col btnPrincipalMarge">
            <a class="btn btn-selection" href="" data-toggle="collapse" data-target="#class" aria-controls="class">Classe</a>
            <div class="collapse" id="class">
                <a class="subClasse" href="{{ route('jogo.class_ave') }}"><i class="fas fa-crow"></i> Aves</a> <br>
                <a class="subClasse" href="{{ route('jogo.class_mamifero') }}"><i class="fas fa-dog"></i> Mamíferos</a> <br>
                <a class="subClasse" href="{{ route('jogo.class_inseto') }}"><i class="fas fa-bug"></i> Insetos</a> <br>
                <a class="subClasse" href="{{ route('jogo.class_peixe') }}"><i class="fas fa-fish"></i> Peixes</a> <br>
                <a class="subClasse" href="{{ route('jogo.class_reptil') }}"><i class="fab fa-d-and-d"></i>/<i class="fas fa-frog"></i> Reptéis e anfíbios</a>
            </div>
        </div>

        <div class="col btnPrincipalMarge">
            <a class="btn btn-selection" href="" data-toggle="collapse" data-target="#order" aria-controls="order">Ordem</a>
            <div class="collapse" id="order">
                <a class="subClasse" href="{{ route('jogo.order_carnivoro') }}"><i class="fas fa-drumstick-bite"></i> Carnívoros</a><br>
                <a class="subClasse" href="{{ route('jogo.order_herbivoro') }}"><i class="fas fa-seedling"></i> Herbívoros</a><br>
                <a class="subClasse" href="{{ route('jogo.order_onivoro') }}"><i class="fas fa-egg"></i> Onívoros</a>
            </div>
        </div>

        <div class="col btnPrincipalMarge">
            <a class="btn btn-selection" href="" data-toggle="collapse" data-target="#habitat" aria-controls="habitat">Habitat</a>
            <div class="collapse" id="habitat">
                <a class="subClasse" href="{{ route('jogo.habitat_aereo') }}"><i class="fas fa-wind"></i> Aéreos</a><br>
                <a class="subClasse" href="{{ route('jogo.habitat_aquatico') }}"><i class="fas fa-tint"></i> Aquáticos</a><br>
                <a class="subClasse" href="{{ route('jogo.habitat_terrestre') }}"><i class="fas fa-tree"></i> Terrestre</a>
            </div>
        </div>

        <div class="col btnPrincipalMarge">
            <a class="btn btn-selection" href="{{ route('jogo.brasileiro') }}">Brasileiros</a>
        </div>

        <div class="col btnPrincipalMarge">
            <a class="btn btn-selection" href="{{ route('jogo.aleatorio') }}">Aleatório</a>
        </div>
    
    </div>

</section>