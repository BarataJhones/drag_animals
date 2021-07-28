<title>Drag Animals - Ranking</title>
<link rel="shortcut icon"
    href="https://www.pngkit.com/png/full/392-3929588_kawaii-cute-edit-editing-overlay-png-dog-draw.png"
    type="image/x-icon">

<link rel="stylesheet" href="{{asset('css/main.css')}}">
<link rel="stylesheet" href="{{asset('css/ranking.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<body class="background">
    @include ('telas.common.header')

    <section class="container" style="margin-top: 2em">

        <div class="w-100 mr-2">

            <div class="py-2 text-center">
                <h3>
                     Você pode listar o ranking por uma categoria específica, ou digitar o nome de um usuário, instituição ou série e buscar as pontuações.     
                </h3>
            </div> 

            <label for="classe">Categorias</label> 

            <form action="{{ route ('ranking.search') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-11">
                        <select name="search" class="form-select" id="classe" aria-label="Default select example">
                            <option selected value="Ave">Ave</option>
                            <option value="Inseto">Inseto</option>
                            <option value="Mamífero">Mamífero</option>
                            <option value="Peixe">Peixe</option>
                            <option value="Réptil/Anfíbio">Réptil/Anfíbio</option>
                
                            <option value="Carnívoro">Carnívoro</option>
                            <option value="Herbívoro">Herbívoro</option>
                            <option value="Onívoro">Onívoro</option>
                
                            <option value="Aéreo">Aéreo</option>
                            <option value="Aquático">Aquático</option>
                            <option value="Terrestre">Terrestre</option>
                
                            <option value="Brasileiro">Brasileiro</option>
                            <option value="Aleatório">Aleatório</option>
                        </select>
                    </div>

                    <div class="input-group-append col-1">
                        <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search" style="color:#0086c1;"></i></button>
                    </div>
                </div>

                

            </form>
            
        </div>

        <section class="searchBar">
            <form action="{{ route ('ranking.search') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Pesquisar" aria-label="Pesquisar" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search" style="color:#0086c1"></i></button>
                    </div>
                </div>
            </form>
        </section>

        <!-- Teste de listar ranking -->
        <table class="table table-striped" style="background-color: white">
            @php $position = 1 @endphp
            <thead class="fundo">
                <tr>
                    <th scope="col">Posição</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Tempo</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Instituição</th>
                    <th scope="col">Série</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rankings as $ranking)
                    <tr>
                        <th scope="row">{{ $position }}</th>
                        <td>
                            <?php $avatar = $ranking->user->avatar; ?>
                    
                            <img src="{{ Storage::disk('s3')->url($avatar) }}" class="userAvatar">

                            {{ $ranking->user->name }}</td>

                        <td><b>{{ $ranking->time }}</b></td>
                        <td>{{ $ranking->game_type }}</td>
                        <td>{{ $ranking->user->institution  }}</td>
                        <td>{{ $ranking->user->grade  }}</td>
                        @php $position++ @endphp
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $rankings->links() }}
    </section>
</body>