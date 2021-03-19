@include ('telas.common.header')

<script src="js/jquery.min.js"></script>
<script src="js/jquery-1.12.4.js"></script>
<script src="js/jquery-ui.js"></script>

<link rel="stylesheet" href="{{asset('css/jogo.css')}}">

<section class="container section">

    <body>
        <div class="text-center">
            <h3>
                Agora é a hora de mostrar que você sabe os nomes dos animais em inglês! <br>
                Clique no botão dentro de algum quadro para ouvir o nome do animal em inglês. Arraste o animal para o
                seu quadro correto.
            </h3> <br>

            <button type="button" class="btn botaoComeçar" style="">
                Começar!
            </button>

        </div>
        <div class="row area">

            @foreach ($animals as $animal)
                <div class="col" style="background-color: #eefdff; padding: 1em">
                    <img id="imagem_{{ $animal->id }}" src="{{ url("storage/$animal->image") }}" draggable="true"
                        ondragstart="drag(event)">
                </div>
            @endforeach

        </div>

        <div class="row area ">

            @foreach ($quadros as $quadro)
                <div class="col " style="margin-bottom: 1em">
                    <div class="quadro text-center" id="quadro_{{ $quadro->id }}" ondrop="drop(event)"
                        ondragover="allowDrop(event)">
                        <button type="button" class="btn btn-primary"
                            style="margin-bottom: 1em">{{ $quadro->name }}</button>
                    </div> <br>
                </div>
            @endforeach

        </div>

    </body>

</section>

<script type="text/javascript" src="{{asset('js/drag_drop.js')}}"></script>