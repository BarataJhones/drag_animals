
@include('telas.common.header')

<title>Criar grupo</title>

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/grupo.css') }}">

<body>
    <?php
        $avatar = Auth::user()->avatar;
        $userName = Auth::user()->name;    
    ?>
    
    <div class="container-fluid">
        <div class="row">

            <form action="{{ route ('group.register') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="col-3 px-1 position-fixed" id="sticky-sidebar">
                    <div style="padding: 2em;">
                        <span class="groupName">Criar grupo</span>

                        <div class="field">
                            <img src="{{Storage::disk('s3')->url($avatar)  }}" class="userAvatarComment"> @php
                            echo $userName;
                            @endphp
                        </div>
                        
                        <div class="row field">
                            <textarea id="name" type="text" name="name" cols="50" rows="2" required></textarea>
                        </div>
                        
                        <div class="row field">
                            <textarea name="about" id="" cols="50" rows="10" required></textarea>
                        </div>
                        
                        <div class="field">
                            <label for="img">Imagem do grupo</label>
                            <input type="file" id="image" name="image" accept="image/*" required>
                        </div>
                        
                        <button class="btn btn-primary my-2 my-sm-0 field" style="background-color: "
                            type="submit">Criar</button>
                    </div>
                </div>

            </form>


            <div class="col-8 offset-3">

                <div class="groupDetails">

                    <div class="text-center" style="margin-bottom: 1em;">
                        <span class="groupName">Prévia do grupo</span>
                    </div>
                    

                    <div class="groupImage">
                        <img class="img-fluid mx-auto d-block" src="img/grupo.png" alt="">
                    </div>

                    <div class="justify-content-left">
                        <div>
                            <span class="groupName">Nome do grupo</span> · Quantidade de membros
                        </div>
                    </div>

                    <hr>

                    <nav class="navbar navbar-expand-lg navbar-light">

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">
                                        <i class="fas fa-info"></i> Sobre <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="fas fa-trophy"></i> Pontuações
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="fas fa-user"></i> Membros
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" style="color: #50ce37 !important">
                                        <i class="fas fa-gamepad"></i> Jogar
                                    </a>
                                </li>
                            </ul>
                            <button class="btn btn-outline-primary my-2 my-sm-0">
                                <i class="fas fa-plus"></i> Adicionar
                            </button>
                        </div>
                    </nav>
                </div>

            </div>

        </div>
    </div>

</body>