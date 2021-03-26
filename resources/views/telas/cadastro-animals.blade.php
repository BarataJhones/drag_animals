<title>Drag Animals - Cadastro de animais</title>
<link rel="shortcut icon"
    href="https://www.pngkit.com/png/full/392-3929588_kawaii-cute-edit-editing-overlay-png-dog-draw.png"
    type="image/x-icon">

<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<body>
    @include ('telas.common.header')
    <div class="d-flex justify-content-center pt-5">
        <h1>Cadastro de animais</h1>
    </div>

    <div class="container" style="margin-top: 2em">

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

        <div class="py-2 text-center">
            <h5>
                <strong>Instruções para envio do áudio:</strong> Acesse o site <a class="links" href="https://soundoftext.com/"><strong>Sound Of Text</strong></a>, escreva o nome do animal em inglês, escolha a lingúa (recomendamos English (United States),
                clique em <strong>submit</strong> e depois clique em <b>download</b> para baixar o áudio:
            </h5>
        </div> 
        
        <div class="py-3 px-5 col">
            <form action="{{ route ('animals.register') }}" method="post" enctype="multipart/form-data">
                @csrf
        
                <div class="pb-4">
                    <label for="nome">Nome do animal em <b>inglês</b></label> 
                    <input class="form-control" id="nome" type="text" name="name">
                </div>
                <div class="flex pb-4">
                    <div class="w-100 mr-2">
                        <label for="imagem">Imagem</label> 
                        <input class="form-control outline-none shadow-none" id="imagem" type="file" name="image">
                    </div>
            
                    <div class="w-100 mrg-l">
                        <label for="som">Som da palavra em <b>inglês</b></label> 
                        <input class="form-control" id="som" type="file" name="audio">
                    </div>
                </div>
                <div class="flex pb-4">
                    <div class="w-100 mr-2">
                        <label for="classe">Classe</label> 
                        <select name="class" class="form-select" id="classe" aria-label="Default select example">
                            <option selected value="Ave">Ave</option>
                            <option value="Inseto">Inseto</option>
                            <option value="Mamífero">Mamífero</option>
                            <option value="Peixe">Peixe</option>
                            <option value="Réptil/Anfíbio">Réptil/Anfíbio</option>
                        </select>
                    </div>
                    <div class="w-100 mrg-l">
                        <label for="ordem">Ordem</label> 
                        <select name="order" class="form-select" aria-label="Default select example" id="ordem">
                            <option selected value="Carnívoro">Carnívoro</option>
                            <option value="Herbívoro">Herbívoro</option>
                            <option value="Onívoro">Onívoro</option>
                        </select>
                    </div>
                </div>
                <div class="flex pb-4">
                    <div class="w-100 mr-2">
                        <label for="habitat">Habitat</label> 
                        <select name="habitat" class="form-select" aria-label="Default select example" id="habitat">
                            <option selected value="Aéreo">Aéreo</option>
                            <option value="Aquático">Aquático</option>
                            <option value="Terrestre">Terrestre</option>
                        </select>
                    </div>
                    <div class="w-100 mrg-l">
                        <label for="animalbr">É brasileiro?</label> 
                        <select name="brazilian" class="form-select" aria-label="Default select example" id="animalbr">
                            <option selected value="Sim">Sim</option>
                            <option value="Não">Não</option>
                        </select>
                    </div>
                </div>
        
                <div>
                    <button class="btn button-orange" type="submit">
                        <i class="fas fa-check"></i> Cadastrar animal
                    </button>
                </div>
        
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>