<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Esqueci minha senha</title>
        <link rel="shortcut icon" href="https://www.pngkit.com/png/full/392-3929588_kawaii-cute-edit-editing-overlay-png-dog-draw.png" type="image/x-icon">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            <x-auth-card>
                <x-slot name="logo">
                    <a href="/">
                        <img class="logoDragAnimals" src="{{asset('https://www.pngkit.com/png/full/392-3929588_kawaii-cute-edit-editing-overlay-png-dog-draw.png')}}" width="120" alt="Logo">
                    </a>
                </x-slot>
        
                <span class="text-center text-xl flex mb-6 mt-2">
                    <a href="/login">
                        <img src="{{asset('https://icons-for-free.com/iconfiles/png/512/arrow+left+chevron+chevronleft+left+left+icon+icon-1320185731545502691.png')}}" width="25"  alt="">
                    </a>
                    <p class="text-center text-xl w-5/6">Esqueci minha senha</p>
                </span>
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Esqueceu sua senha? Não tem problema. Apenas nos informe seu endereço de e-mail e nós enviaremos um e-mail para você com um link de alteração de senha que permitirá que você insira uma nova senha.') }}
                </div>
        
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
        
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
        
                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="__('E-mail')" />
        
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        <x-button>
                            {{ __('Enviar e-mail') }}
                        </x-button>
                    </div>
                </form>
            </x-auth-card>
        </div>
    </body>
</html>