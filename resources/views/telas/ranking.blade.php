<title>Drag Animals - Ranking</title>
<link rel="shortcut icon"
    href="https://www.pngkit.com/png/full/392-3929588_kawaii-cute-edit-editing-overlay-png-dog-draw.png"
    type="image/x-icon">
<link rel="stylesheet" href="{{asset('css/ranking.css')}}">

<body>
    @include ('telas.common.header')

    <section class="container" style="margin-top: 2em">

        <!-- Teste de listar ranking -->
        <table class="table table-striped">
            @php $position = 1 @endphp
            <thead class="fundo">
                <tr>
                    <th scope="col">Posição</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Tempo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rankings as $ranking)
                    <tr>
                        <th scope="row">{{ $position }}</th>
                        <td>{{ $ranking->user->name }}</td>
                        <td>{{ $ranking->game_type }}</td>
                        <td>{{ $ranking->time }}</td>
                        @php $position++ @endphp
                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>
</body>