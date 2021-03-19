<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{asset('https://www.pngkit.com/png/full/392-3929588_kawaii-cute-edit-editing-overlay-png-dog-draw.png')}}" width="120" alt="Logo">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
        <span class="text-center text-xl flex mb-6 mt-2">
            <a href="/login">
                <img src="{{asset('https://icons-for-free.com/iconfiles/png/512/arrow+left+chevron+chevronleft+left+left+icon+icon-1320185731545502691.png')}}" width="25"  alt="">
            </a>
            <p class="text-center text-xl w-5/6">Cadastro</p>
        </span>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nome')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('E-mail')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Senha')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirme a senha')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <!-- Birthday -->
            <div class="mt-4">
                <x-label for="birthday" :value="__('Data de nascimento')" />
                <x-input id="birthday" class="block mt-1 w-full"
                                    type="date"
                                    name="birthday" required/>
            </div>

            <!-- Gender -->
            <div class="mt-4">
                <x-label for="gender" :value="__('Gênero')" />
                <div class="flex justify-between mt-2 mb-1" >
                    <x-input id="gender"
                            type="radio"
                            name="gender"
                            value="female" required/>
                    <span class="text-sm">Feminino</span>
                    <x-input id="gender"
                            type="radio"
                            name="gender"
                            value="male"/>
                    <span class="text-sm">Masculino</span>
                    <x-input id="gender"
                            type="radio"
                            name="gender"
                            value="nonbinary"/>
                    <span class="text-sm">Não-binário</span>
                    <x-input id="gender"
                            type="radio"
                            name="gender"
                            value="other"/>
                    <span class="text-sm">Outro</span>
            </div>
            
            <!-- Institution -->
            <div class="mt-4">
                <x-label for="institution" :value="__('Instituição')" />
                <x-input id="institution" class="block mt-1 w-full"
                                    type="text"
                                    name="institution"/>
            </div>

            <!-- Grade -->
            <div class="mt-4">
                <x-label for="grade" :value="__('Série')" />
                <x-input id="grade" class="block mt-1 w-full"
                                    type="text"
                                    name="grade"/>
            </div>
                </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Já está cadastrado?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Cadastrar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
