<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include ('telas.common.header')

    <form action="{{ route ('animals.register') }}" method="post" enctype="multipart/form-data">
        @csrf

    <section class="container" style="margin-top: 2em">
        <label for="">Nome do animal em <b>inglês</b></label> <br>
        <input type="text" name="name" id=""><br>
        
        <label for="">Imagem</label> <br>
        <input type="file" name="image" id=""> <br>

        <label for="">Classe</label> <br>
        <select name="class" class="form-select" aria-label="Default select example" id="">
            <option selected value="Ave">Ave</option>
            <option value="Inseto">Inseto</option>
            <option value="Mamífero">Mamífero</option>
            <option value="Peixe">Peixe</option>
            <option value="Réptil">Réptil</option>
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
</html>