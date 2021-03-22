@include ('telas.common.header')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<link rel="stylesheet" href="{{asset('css/jogo.css')}}">

<section class="container section">

    <body>

        <!--Área do texto inicial-->
        <div class="text-center">
            <h3>
                Agora é a hora de mostrar que você sabe os nomes dos animais em inglês! <br>
                Clique no botão dentro de algum quadro para ouvir o nome do animal em inglês. Arraste o animal para o
                seu quadro correto.
            </h3> <br>

            <!--Botão collapse-->
            <button type="button" class="btn botaoComeçar" data-toggle="collapse" data-target="#collapseExample"
                aria-controls="collapseExample" id="playButton">
                Começar!
            </button>
        </div>

        <div class="collapse" id="collapseExample">

            <!--Timer-->
            <div class="text-center">
                <span id="display" class="timer">00:00:00</span>
            </div>

            <!--Div que exibe as imagens dos bichos-->
            <div class="row area">
                @foreach ($animals as $animal)
                    <div class="col" style="background-color: #eefdff; padding: 1em">
                        <img id="imagem_{{ $animal->id }}" src="{{ url("storage/$animal->image") }}" draggable="true" ondragstart="drag(event)">
                    </div>
                @endforeach
            </div>
            <!-- -->

            <!--Div que exibe os quadros respostas-->
            <div class="row area ">
                @foreach ($quadros as $quadro)
                    <div class="col " style="margin-bottom: 1em">
                        <div class="quadro text-center" id="quadro_{{ $quadro->id }}" ondrop="drop(event)"
                            ondragover="allowDrop(event)">

                            <button type="button" value="PLAY" onclick="play('audio_{{ $quadro->id }}')"
                                class="btn btn-primary" style="margin-bottom: 1em">{{ $quadro->name }}
                            </button>
                            <audio id="audio_{{ $quadro->id }}" src="{{ url("storage/$quadro->audio") }}"></audio>

                        </div> <br>
                    </div>
                @endforeach
            </div>
            <!-- -->

        </div>

        <!--Essa div exibe a mensagem após completar o desafio. Se o user estiver logado, aparece o botão com a opção de salvar a pontuação.-->
        <div class="text-center" style="font-size: 2em" id="mensagem" hidden>
            <p class="mensagem">
                Congratulations! Você conseguiu completar o desafio!
            </p>
            Sua pontuação foi: <span id="timerResult"></span><br>

            <!--Quando o user estiver logado-->
            @if ((Auth::id()!=null))

                <form action="{{ route ('ranking.register') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="game_type" value="{{$gameType}}" hidden>
                    <input type="text" id="timerResultForm" name="time" value="" hidden>

                    <button type="submit" class="btn botaoComeçar" style="font-size: 1em">
                        Salvar
                    </button>
                </form>

        <!--Não logado-->
            @else
                Faça Login para salvar sua pontuação <br>
                <a href="{{ route('login') }}" class="">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
            @endif
        </div>
        
    </body>
</section>

<script type="text/javascript" src="{{asset('js/drag_drop.js')}}"></script>