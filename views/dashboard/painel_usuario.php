<?php

    session_start () ;

    if ( ! $_SESSION ["id_usuario"] )
    {
        header ('Location: ./../login/login.php') ;
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./../../node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="./../../node_modules/mdbootstrap/css/mdb.min.css">

    <!--  Css -->
    <link rel="stylesheet" href="./../../assets/css/painel.css">

    <title>Painel</title>

</head>

<body>


    <nav class="navbar navbar-expand navbar-dark bg-primary">
        <a class="sidebar-toggle text-light mr-3">
            <span class="navbar-toggler-icon"></span>
        </a>
        <a class="navbar-brand" href="#">GAU</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle menu-header" href="#" id="navbarDropdownMenuLink"
                        data-toggle="dropdown">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#"><i class="fas fa-user"></i> <?= $_SESSION ["nome_usuario"] ?></a>
                        <a class="dropdown-item" href="./logout"><i class="fas fa-sign-out-alt"></i> Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-flex">
        <nav class="sidebar">
            <ul class="list-unstyled">
                <li><a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li>
                    <a href="#submenu1" data-toggle="collapse"><i class="fas fa-plus"></i> Adicionar</a>
                    <ul id="submenu1" class="list-unstyled collapse">
                        <li><a href="./usuario/requerimento/adicionar.php">Requerimento</a></li>

                    </ul>
                </li>
               
                <li>
                    <a href="#submenu3" data-toggle="collapse"><i class="fas fa-list-ul"></i> Relatorios</a>
                    <ul id="submenu3" class="list-unstyled collapse">
                        <li>
                            <a target="_blank" href="./relatorios/arvores-do-municipio.php">Relatório de requerimento</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>


      
        <div class="content p-1">
                <div class="list-group-item">
                    <div class="d-flex">
                        <div class="mr-auto p-2">
                            <h2 class="display-4 titulo">Dashboard</h2>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3 col-sm-6">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <i class="fas fa-users fa-3x"></i>
                                    <h6 class="card-title">Usuários</h6>
                                    <h2 class="lead">147</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card bg-danger text-white">
                                <div class="card-body">
                                    <i class="fas fa-file fa-3x"></i>
                                    <h6 class="card-title">Artigos</h6>
                                    <h2 class="lead">63</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <i class="fas fa-eye fa-3x"></i>
                                    <h6 class="card-title">Visitas</h6>
                                    <h2 class="lead">648</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <i class="fas fa-comments fa-3x"></i>
                                    <h6 class="card-title">Comentários</h6>
                                    <h2 class="lead">17</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- JQuery MDB -->
        <script type="text/javascript" src="./../../node_modules/mdbootstrap/js/jquery-3.4.1.min.js"></script>

        <!-- MDB   -->
        <script type="text/javascript" src="./../../node_modules/mdbootstrap/js/popper.min.js"></script>

        <!-- Bootstrap  -->
        <script type="text/javascript" src="./../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- MDB  -->
        <script type="text/javascript" src="./../../node_modules/mdbootstrap/js/mdb.min.js"></script>

        <script src="./../../node_modules/jquery/dist/jquery.min.js"></script>

        <script src="./../../"></script>

        <!-- JAVASCRIPT -->
        <script>
        $(document).ready(function() {
            //Apresentar ou ocultar o menu
            $('.sidebar-toggle').on('click', function() {
                $('.sidebar').toggleClass('toggled');
            });

            //carregar aberto o submenu
            var active = $('.sidebar .active');
            if (active.length && active.parent('.collapse').length) {
                var parent = active.parent('.collapse');

                parent.prev('a').attr('aria-expanded', true);
                parent.addClass('show');
            }
        });
        </script>

</body>

</html>