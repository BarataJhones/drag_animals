<title>Drag Animals - Lista de animals</title>

<link rel="stylesheet" href="{{asset('css/main.css')}}">

<body>
    @include ('telas.common.header')

    <section class="container" style="margin-top: 2em">

        <section class="searchBar">
            <form action="{{ route ('animal.search') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Pesquisar" aria-label="Pesquisar" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search" style="color:#ef8700"></i></button>
                    </div>
                </div>
            </form>
        </section>

        <h1 class="text-center">Lista de animais cadastrados</h1> <br>

        <!-- Teste de listar ranking -->
        <table class="table table-striped">
            <thead class="fundo">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Classe</th>
                    <th scope="col">Ordem</th>
                    <th scope="col">Habitat</th>
                    <th scope="col">É brasileiro?</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($animals as $animal)
                    <tr>
                        <td>{{ $animal->nameEnglish }}</td>
                        <td>{{ $animal->class }}</td>
                        <td>{{ $animal->order }}</td>
                        <td>{{ $animal->habitat }}</td>
                        <td>{{ $animal->brazilian }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $animals ->links() }}

    </section>
</body>