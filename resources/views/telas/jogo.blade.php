@include ('telas.common.header')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<link rel="stylesheet" href="{{asset('css/main.css')}}">
<link rel="stylesheet" href="{{asset('css/jogo.css')}}">
<title>Jogo</title>

<section class="container section ">

    <body class="background">

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
                <i class="fas fa-play"></i> Começar!
            </button>
        </div>

        <div class="collapse" id="collapseExample">

            <!--Timer-->
            <div class="text-center">
                <span id="display" class="timer">00:00:00</span>
            </div> <br>

            <div class="text-center">
                <button type="button" class="btn botaoReiniciar" onClick="window.location.reload();">
                    <i class="fas fa-sync-alt"></i> Reiniciar
                </button>
            </div> <br>
            
            <!--Div que exibe as imagens dos bichos-->
            <div class="row area" style="float: right; width: 30em">
                @foreach ($animals as $animal)
                    <div class="col" style="padding: 1em">
                        <img class="imagem" id="imagem_{{ $animal->id }}" src="{{ Storage::disk('s3')->url($animal->image) }}" draggable="true" ondragstart="drag(event)">
                    </div>
                @endforeach
            </div>
            <!-- -->

            <!--Div que exibe os quadros respostas-->
            <div class="row  ">
                @foreach ($quadros as $quadro)
                    <div class="col " style="margin-bottom: 1em">
                        <div class="quadro text-center" id="quadro_{{ $quadro->id }}" ondrop="drop(event)"
                            ondragover="allowDrop(event)">

                            <button type="button" value="PLAY" onclick="play('audio_{{ $quadro->id }}')"
                                class="btn botaoAudio" style="margin-bottom: 1em; font-size: 0.8em"><i class="fas fa-volume-up"></i> {{ $quadro->nameEnglish }}
                            </button>
                            <audio id="audio_{{ $quadro->id }}" src="{{ Storage::disk('s3')->url($quadro->audio) }}"></audio> 

                        </div> <br>
                    </div>
                @endforeach
            </div>
            <!-- -->

        </div>

        <!--Essa div exibe a mensagem após completar o desafio. Se o user estiver logado, aparece o botão com a opção de salvar a pontuação.-->
    
        <!-- Modal -->
        <div class="modal fade" id="modalFinish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
        
                <div class="text-center modal-content" style="font-size: 2em" id="mensagem" hidden>
                    <p class="mensagem modal-header">
                        <b class="modal-title" id="exampleModalLabel">Congratulations! Você conseguiu completar o desafio!</b>
                    </p>
                    <p class="modal-body">
        
                        Sua pontuação foi: <b id="timerResult"></b><br><br>
        
                        <!--Quando o user estiver logado-->
                        @if ((Auth::id()!=null))
                            @if ($animalCard==null)
                                Você já tem todas as figurinhas desses animais! <br>
                                Recarregue a página ou tente jogar em outra categoria.
                            @else
                                Você ganhou a figurinha do <b>{{$animalCard->nameEnglish}} ({{$animalCard->namePort}})</b>! <br>
                            @endif
                        
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
                        <a href="{{ route('login') }}" class="" style="text-decoration: none;">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                        @endif
                    </p>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: transparent">
                            <i class="fas fa-window-close" style="font-size: 2em; color: #ff4242"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </body>
</section>

<script type="text/javascript" src="{{asset('js/drag_drop.js')}}"></script>