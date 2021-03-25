<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Editar usuário</title>
  <link rel="stylesheet" href="{{asset('css/avatar-config.css')}}">
  {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
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
<body style="background-color: #f4f4f4">
  @include ('telas.common.header')
  <x-card>
    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
      @csrf

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

      <!-- Image -->
      <div >
        <x-label for="name" :value="__('Avatar')" />
        <img src="{{ url("storage/$user->avatar") }}" id="change" class="avatar">
        <x-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" class="avatarInput" onchange="readURL(this);" />
      </div>

      <!-- Name -->
      <div>
          <x-label for="name" :value="__('Nome')" />
          <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$user->name}}" required autofocus />
      </div>
  
      <!-- Birthday -->
      <div class="mt-4">
          <x-label for="birthday" :value="__('Data de nascimento')" />
          <x-input id="birthday" class="block mt-1 w-full" type="date" name="birthday" value="{{$user->birthday}}" required/>
      </div>
  
      <!-- Gender -->
      <div class="mt-4">
          <x-label for="gender" :value="__('Gênero')" />
          <div class="flex justify-between mt-2 mb- flex-row" >
              <x-input id="gender" type="radio" name="gender" value="female" required/>
              <span class="text-sm">Feminino</span>
  
              <x-input id="gender" type="radio" name="gender" value="male"/>
              <span class="text-sm">Masculino</span>
  
              <x-input id="gender" type="radio" name="gender" value="nonbinary"/>
              <span class="text-sm">Não-binário</span>
  
              <x-input id="gender" type="radio" name="gender" value="other"/>
              <span class="text-sm">Outro</span>
          </div>
      </div>    
      
      <!-- Institution -->
      <div class="mt-4">
        <x-label for="institution" :value="__('Instituição')" />
        <x-input id="institution" class="block mt-1 w-full" type="text" name="institution" value="{{$user->institution}}"/>
      </div>
  
      <!-- Grade -->
      <div class="mt-4">
          <x-label for="grade" :value="__('Série')" />
          <x-input id="grade" class="block mt-1 w-full" type="text" name="grade" value="{{$user->grade}}"/>
      </div>
      
      <div class="flex items-center justify-end mt-4">
        <button class="ml-4">
            {{ __('Salvar') }}
        </button>
      </div>
    </form>
  </x-card>
</body>
</html>