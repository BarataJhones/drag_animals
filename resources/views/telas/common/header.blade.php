<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/fontawesome.js')}}"></script>
    <script src="{{asset('js/fontawesome.min.js')}}"></script>
    <script src="{{asset('js/all.js')}}"></script>
    
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('https://use.fontawesome.com/releases/v5.0.6/css/all.css')}}">

    @include ('telas.heroku.herokuHeader')

</head>

<body>
    <div class="bs-example">
        <nav class="navbar navbar-expand-md navbar-light">
        
            <button type="button" class="navbar-toggler custom-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="{{ route('return.index') }}" class="headerText nav-item nav-link active"><i class="fas fa-home"></i> Início</a> 
                    <a href="#" class="headerText nav-item nav-link"><i class="fas fa-info-circle"></i> Sobre</a>
                    <a href="#" class="headerText nav-item nav-link"><i class="fas fa-user"></i> Área do usuário</a>
                    <a href="#" class="headerText nav-item nav-link"><i class="fas fa-trophy"></i> Rankings</a>
                </div>
            
                <div class="headerText navbar-nav ml-auto dropdown">
                    @if ((Auth::id()!=null))
                        <a href="#" class="headerText nav-link dropdown-toggle" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                            <?php 
                                list($primeiroNome) = explode(' ', Auth::user()->name); 
                                $avatar = Auth::user()->avatar;
                            ?>
                
                            <img src="{{ url("storage/$avatar") }}" class="userAvatar">
                            Bem vindo, @php echo $primeiroNome; @endphp
                
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                
                            <a class="dropdown-item"
                                href="#">
                                <i class="fas fa-user"></i> Área do usuário
                            </a>
                
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="headerText dropdown-item" :href="route('logout')"
                                    onclick="event.preventDefault();this.closest('form').submit();">
                                    <i class="fas fa-power-off"></i> Sair
                                </a>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="headerText nav-item nav-link">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    @endif
                </div>
            
            </div>
        </nav>

    </div>
</body>

</html>