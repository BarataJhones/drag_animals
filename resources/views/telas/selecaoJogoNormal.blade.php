@extends('telas.selecaoJogo')

@section('selecaoJogo')
  <div class="quadro-jogar col d-flex justify-content-center zIndex">
    <div>
      <img class="quadro-imagem center-block" src="{{ Storage::disk('s3')->url('selecao-jogo-classe.png') }}" alt="">
      <div class="botao dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Classe</div>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item subClasse" href="{{ route('jogo.class_ave', 0) }}"><i class="fas fa-crow"></i> Aves</a></li>
        <li><a class="dropdown-item subClasse" href="{{ route('jogo.class_mamifero', 0) }}"><i class="fas fa-dog"></i> Mamíferos</a></li>
        <li><a class="dropdown-item subClasse" href="{{ route('jogo.class_inseto', 0) }}"><i class="fas fa-bug"></i> Insetos</a></li>
        <li><a class="dropdown-item subClasse" href="{{ route('jogo.class_peixe', 0) }}"><i class="fas fa-fish"></i> Peixes</a></li>
        <li><a class="dropdown-item subClasse" href="{{ route('jogo.class_reptil', 0) }}"><i class="fas fa-frog"></i> Reptéis e anfíbios</a></li>
      </ul>
    </div>
  </div>

  <div class="quadro-jogar col d-flex justify-content-center zIndex">
    <div>
      <img class="quadro-imagem center-block" src="{{ Storage::disk('s3')->url('selecao-jogo-ordem.png') }}" alt="">
      <div class="botao dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Ordem</div>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item subClasse" href="{{ route('jogo.order_carnivoro', 0) }}"><i class="fas fa-drumstick-bite"></i> Carnívoros</a></li>
        <li><a class="dropdown-item subClasse" href="{{ route('jogo.order_herbivoro', 0) }}"><i class="fas fa-seedling"></i> Herbívoros</a></li>
        <li><a class="dropdown-item subClasse" href="{{ route('jogo.order_onivoro', 0) }}"><i class="fas fa-egg"></i> Onívoros</a></li>
      </ul>
    </div>
  </div>

  <div class="quadro-jogar col d-flex justify-content-center zIndex">
    <div>
      <img class="quadro-imagem center-block" src="{{ Storage::disk('s3')->url('selecao-jogo-habitat.png') }}" alt="">
      <div class="botao dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Habitat</div>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item subClasse" href="{{ route('jogo.habitat_aereo', 0) }}"><i class="fas fa-wind"></i> Aéreos</a></li>
        <li><a class="dropdown-item subClasse" href="{{ route('jogo.habitat_aquatico', 0) }}"><i class="fas fa-tint"></i> Aquáticos</a></li>
        <li><a class="dropdown-item subClasse" href="{{ route('jogo.habitat_terrestre', 0) }}"><i class="fas fa-tree"></i> Terrestre</a></li>
      </ul>
    </div>
  </div>

  <div class="quadro-jogar col d-flex justify-content-center">
    <a href="{{ route('jogo.brasileiro', 0) }}">
      <img class="quadro-imagem center-block" src="{{ Storage::disk('s3')->url('selecao-jogo-brasileiro.png') }}" alt="">
        <div class="botao">Brasileiros</div>
      </a>
  </div>

  <div class="quadro-jogar col d-flex justify-content-center">
    <a href="{{ route('jogo.aleatorio', 0) }}">
      <img class="quadro-imagem center-block" src="{{ Storage::disk('s3')->url('selecao-jogo-aleatorio.png') }}" alt="">
      <div class="botao">Aleatório</div>
      </a>
  </div>
@endsection