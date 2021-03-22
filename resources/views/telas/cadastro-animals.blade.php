<title>Drag Animals - Cadastro de animais</title>
<link rel="shortcut icon"
    href="https://www.pngkit.com/png/full/392-3929588_kawaii-cute-edit-editing-overlay-png-dog-draw.png"
    type="image/x-icon">

<body>
    @include ('telas.common.header')

    <section class="container" style="margin-top: 2em">

        <!-- Validações do fomulário -->
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        @endif
        <!-- -->

        Acesse o site <b>https://soundoftext.com/</b>, escreva o nome do animal em inglês, escolha a lingúa (recomendamos English (United States),
        clique em <b>submit</b> e depois clique em <b>download</b> para baixar o áudio: <br>
        
        
    <form action="{{ route ('animals.register') }}" method="post" enctype="multipart/form-data">
        @csrf

        
        <label for="">Nome do animal em <b>inglês</b></label> <br>
        <input type="text" name="name" id=""><br>
        
        <label for="">Imagem</label> <br>
        <input type="file" name="image" id=""> <br>

        <label for="">Som da palavra em <b>inglês</b></label> <br>
        <input type="file" name="audio" id=""> <br>

        <label for="">Classe</label> <br>
        <select name="class" class="form-select" aria-label="Default select example" id="">
            <option selected value="Ave">Ave</option>
            <option value="Inseto">Inseto</option>
            <option value="Mamífero">Mamífero</option>
            <option value="Peixe">Peixe</option>
            <option value="Réptil/Anfíbio">Réptil/Anfíbio</option>
        </select><br><br>

        <label for="">Ordem</label> <br>
        <select name="order" class="form-select" aria-label="Default select example" id="">
            <option selected value="Carnívoro">Carnívoro</option>
            <option value="Herbívoro">Herbívoro</option>
            <option value="Onívoro">Onívoro</option>
        </select><br><br>

        <label for="">Habitat</label> <br>
        <select name="habitat" class="form-select" aria-label="Default select example" id="">
            <option selected value="Aéreo">Aéreo</option>
            <option value="Aquático">Aquático</option>
            <option value="Terrestre">Terrestre</option>
        </select><br><br>

        <label for="">É brasileiro?</label> <br>
        <select name="brazilian" class="form-select" aria-label="Default select example" id="">
            <option selected value="Sim">Sim</option>
            <option value="Não">Não</option>
        </select><br><br>

        <div class="text-center col-2">
            <button class="btn botao-del-edit save" type="submit">
                <i class="fas fa-check"></i> Cadastrar animal
            </button>
        </div>

    </form>

    </section>
</body>