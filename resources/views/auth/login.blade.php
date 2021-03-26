<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Login</title>
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
        
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
        
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
         
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="text-center text-xl flex">
                        <a href="/">
                            <img src="{{asset('https://icons-for-free.com/iconfiles/png/512/arrow+left+chevron+chevronleft+left+left+icon+icon-1320185731545502691.png')}}" width="25"  alt="">
                        </a>
                        <p class="text-center text-xl w-4/5">Login</p>
                    </span>
                    <h2 class="mb-4 mt-2 text-sm text-center">
                        Novo usuário? 
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                            {{ __('Cadastre-se') }}
                        </a>
                    </h2>
                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="__('E-mail')" />
        
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
        
                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Senha')" />
        
                        <x-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                    </div>
        
                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-yellow-800 shadow-sm focus:border-yellow-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Esqueceu sua senha?') }}
                            </a>
                        @endif
        
                        <x-button class="ml-3">
                            {{ __('Entrar') }}
                        </x-button>
                    </div>
                </form>
            </x-auth-card>
        </div>
    </body>
</html>
