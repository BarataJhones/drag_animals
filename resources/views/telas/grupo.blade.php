<title>{{$group->name}}</title>
<link rel="shortcut icon"
    href="https://www.pngkit.com/png/full/392-3929588_kawaii-cute-edit-editing-overlay-png-dog-draw.png"
    type="image/x-icon">

<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/grupo.css') }}">

<body>
    @include('telas.common.header')

    @if (session('message'))
        <div class="mt-3 mx-3 alert alert-success fade show" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="groupDetails">

        <div class="groupImage">
            <img class="img-fluid mx-auto d-block" src="{{ Storage::disk('s3')->url($group->image) }}" alt="">
        </div>

        <div class="container">

            <div class="justify-content-left">
                <div>
                    <span class="groupName">{{$group->name}}</span> · {{$memberCount}} membros
                </div>
            </div>

            <hr>

            <nav class="navbar navbar-expand-lg navbar-light">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" data-toggle="modal" data-target="#ModalAbout" href="#">
                                <i class="fas fa-info"></i> Sobre <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-comments"></i> Discussão
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('rankin.main') }}">
                                <i class="fas fa-trophy"></i> Pontuações
                            </a>
                        </li>
                        <li class="nav-item" data-toggle="modal" data-target="#modalMember">
                            <a class="nav-link" href="#">
                                <i class="fas fa-user"></i> Membros
                            </a>
                        </li>
                    </ul>
                    @if (Auth::user()->id == $groupAdm['id'])
                        <button class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#modalAdd">
                            <i class="fas fa-plus"></i> Adicionar
                        </button>
                    @endif
                </div>
            </nav>

        </div>
    </div>

    <div class="container">

        <div class="postSection">
            <?php  $avatar = Auth::user()->avatar; ?>

            <div class="row">
                <div class="col">
                    <img src="{{Storage::disk('s3')->url($avatar)  }}" class="userAvatarComment">
                </div>

                <div class="col-10">
                    <textarea class="form-control" id="nome" type="text" name="name"
                        placeholder="Escreva algo..."></textarea>
                </div>

                <div class="col">
                    <button class="btn btn-outline-primary my-2 my-sm-0" style="background-color: "
                        type="submit">Postar</button>
                </div>
            </div>
        </div>


        <!-- Modal -->

        <!-- About -->
        <div class="modal fade" id="ModalAbout" tabindex="-1" role="dialog" aria-labelledby="ModalAbout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sobre o {{$group->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{$group->about}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Members -->
        <div class="modal fade" id="modalMember" tabindex="-1" role="dialog" aria-labelledby="modalMember"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Membros do {{$group->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        @foreach ($members as $member)
                            <img src="{{Storage::disk('s3')->url($member->userGr->avatar)  }}" class="userAvatarComment">
                            {{$member->userGr->name}} <br>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add -->
        <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar membro ao {{$group->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        @foreach ($users as $user)

                            <form action="{{ route ('group.add', $group->id) }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <img src="{{Storage::disk('s3')->url($user->avatar)  }}" class="userAvatarComment">
                                {{$user->id}} {{$user->name}}

                                <input type="text" name="id" hidden value="{{$user->id}}">

                                <button class="btn btn-primary" type="submit">Adicionar</button>    
                            </form>

                        @endforeach

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>



















        <div>
            <div class="commentsSection">

                <div>
                    <img src="{{Storage::disk('s3')->url($avatar)  }}" class="userAvatarComment">
                    <strong class="commentUser">Gustavo</strong> publicou: <br>
                    13/07/2021
                    <p class="commentContent">Bom dia. O desafio da semana é conseguir 10 figurinhas de
                        mamíferos
                        até
                        segunda-feira.</p>
                </div>

            </div>

            <div class="commentsSection">

                <div>
                    <img src="{{Storage::disk('s3')->url($avatar)  }}" class="userAvatarComment">
                    <strong class="commentUser">Gustavo</strong> publicou: <br>
                    13/07/2021
                    <p class="commentContent">adasdasdasdasdasdasdasdsssssssssssssss das dsd asda sas as dsd asda sas as
                        dsd asda sas as
                        dsd asda sas as dsd asda sas as dsd asda sas as dsd asda sas as dsd asda sas as dsd asda sas as
                        dsd asda sas as
                        dsd asda sas as dsd asda sas as dsd asda sas as dsd asda sas as dsd asda sas as dsd asda sas as
                        dsd asda sas as
                        dsd asda sas as dsd asda sas as dsd asda sas as dsd asda sas as dsd asda sas as dsd asda sas as
                        dsd asda sas as
                        dsd asda sas as dsd asda sas as dsd asda sas as dsd asda sas as dsd asda sas as dsd asda sas as
                        dsd asda sas as
                        dsd asda sas as dsd asda sas as dsd asda sas as dsd asda sas as dsd asda sas as dsd asda sas as
                        dsd asda sas as
                        dsd asda sas as dsd asda sas as dsd asda sas as dsd asda sas as dsd asda sas as dsd asda sas
                    </p>
                </div>

            </div>

        </div>

    </div>

</body>