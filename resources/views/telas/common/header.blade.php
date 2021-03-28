<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="https://www.pngkit.com/png/full/392-3929588_kawaii-cute-edit-editing-overlay-png-dog-draw.png" type="image/x-icon">

    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/fontawesome.js')}}"></script>
    <script src="{{asset('js/fontawesome.min.js')}}"></script>
    <script src="{{asset('js/all.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('https://use.fontawesome.com/releases/v5.0.6/css/all.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body>
    <div class="bs-example">
        <nav class="navbar navbar-expand-md navbar-light">
        
            <button type="button" class="navbar-toggler custom-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="/" class="headerText nav-item nav-link active"><i class="fas fa-home"></i> Início</a> 
                    <a href="{{ route('animals.selecao')  }}" class="headerText nav-item nav-link"><i class="fas fa-gamepad"></i> Jogar</a>
                    <a href="{{ route('dashboard')  }}" class="headerText nav-item nav-link"><i class="fas fa-user"></i> Área do usuário</a>
                    <a href="{{ route('rankin.main') }}" class="headerText nav-item nav-link"><i class="fas fa-trophy"></i> Pontuações</a>
                </div>
            
                <div class="headerText navbar-nav ml-auto flex">
                    @if ((Auth::id()!=null))
                        <div class="btn-group">
                            <button type="button" class="outline-none shadow-none btn btn-size btn-lg headerText nav-link dropdown-toggle" id="navbarDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                
                                <?php 
                                    list($primeiroNome) = explode(' ', Auth::user()->name); 
                                    $avatar = Auth::user()->avatar;
                                ?>
                    
                                <img src="{{ Storage::disk('s3')->url($avatar) }}" class="userAvatar">
                                Bem vindo(a), @php echo $primeiroNome; @endphp
                
                            </button>
                            <ul class="dropdown-menu drop-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item drop-item" href="{{ route('dashboard') }}">
                                        <i class="fas fa-user"></i> Área do usuário
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item drop-item" href="{{ route('edit-user') }}">
                                        <i class="fas fa-edit"></i> Editar usuaŕio
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item drop-item" style="cursor: pointer" :href="route('logout')"
                                            onclick="event.preventDefault();this.closest('form').submit();">
                                            <i class="fas fa-power-off"></i> Sair
                                        </a>
                                    </form>
                                </li>
                            </ul>
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