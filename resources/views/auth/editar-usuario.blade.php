<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Editar usuário</title>
  <link rel="stylesheet" href="{{asset('css/avatar-config.css')}}">
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <link class="jsbin" href="{{asset('css/jquery-ui.css')}}" rel="stylesheet" type="text/css" />
  <script class="jsbin" src="{{asset('js/jquery.min.js')}}"></script>
  <script class="jsbin" src="{{asset('js/jquery-ui.min.js')}}"></script>
  <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#change')
                    .attr('src', e.target.result)
                    .width(128)
                    .height(128);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</head>
<body>
  @include ('telas.common.header')
  <div class="d-flex justify-content-center pt-5">
    <h1>Editar usuário</h1>
  </div>

  <div class="container" style="margin-top: 2em">
    <div class="py-3 px-5 col">
      <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
        @csrf

        <div class="py-2">
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
        </div>

        <!-- Image -->
        <div class="pb-4">
          <h6 class="text-center" for="name">Avatar</h6>
          <img src="{{ url("storage/$user->avatar") }}" id="change" class="avatar">
          <input id="avatar" class="form-control" type="file" name="avatar" class="avatarInput" onchange="readURL(this);" />
        </div>

        <!-- Name -->
        <div class="pb-4">
            <label for="name">Nome</label>
            <input id="name" class="form-control" type="text" name="name" value="{{$user->name}}" required autofocus />
        </div>

        <!-- Birthday -->
        <div class="pb-4">
            <label for="birthday">Data de nascimento</label>
            <input id="birthday" class="form-control" type="date" name="birthday" value="{{$user->birthday}}" required/>
        </div>

        <!-- Gender -->
        <div class="pb-4">
            <label for="gender">Gênero</label>
            <div class="flex mt-2 mb- flex-row" >
                <div class="form-check mr-4">
                  <input class="form-check-input" id="gender" type="radio" name="gender" value="female"/>
                  <label class="form-check-label text-sm">Feminino</label>
                </div>
                <div class="form-check mr-4">
                  <input class="form-check-input" id="gender" type="radio" name="gender" value="male"/>
                  <label class="form-check-label text-sm">Masculino</label>
                </div>
                <div class="form-check mr-4">
                  <input class="form-check-input" id="gender" type="radio" name="gender" value="nonbinary"/>
                  <label class="form-check-label text-sm">Não-binário</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" id="gender" type="radio" name="gender" value="other"/>
                  <label class="form-check-label text-sm">Outro</label>
                </div>
            </div>
        </div>    
        
        <!-- Institution -->
        <div class="pb-4">
          <label for="institution">Instituição</label>
          <input id="institution" class="form-control" type="text" name="institution" value="{{$user->institution}}"/>
        </div>

        <!-- Grade -->
        <div class="pb-4">
            <label for="grade">Série</label>
            <input id="grade" class="form-control" type="text" name="grade" value="{{$user->grade}}"/>
        </div>
        
        <div class="flex">
          <button class="btn button-orange">
              {{ __('Salvar') }}
          </button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>