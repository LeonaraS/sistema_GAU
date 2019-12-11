<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="./node_modules/mdbootstrap/css/mdb.min.css">

    <!--  Css -->
    <link rel="stylesheet" href="./assets/css/app.css">

    <title>GAU</title>

</head>

<body>

    <!--Main Navigation-->
    <header>

        <!--Navbar-->
        <nav class="nav-menu-fixo navbar blog-nav shadow navbar-expand-lg navbar-dark fixed-top scrolling-navbar">

            <div class="container">

                <!-- Navbar brand -->
                <a class="navbar-brand gau" href="#">GAU</a>

                <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible content -->
                <div class="collapse navbar-collapse" id="basicExampleNav">

                    <!-- Links -->
                    <ul class="navbar-nav mr-auto smooth-scroll">
                        <li class="nav-item">
                            <a class="nav-link" href="#intro">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Finalidades">Finalidades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#QuemSomos">Quem Somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Contato">Contato</a>
                        </li>
                    </ul>
                    <!-- Links -->

                    <!-- Social Icon  -->
                    <ul class="navbar-nav nav-flex-icons">
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-default"
                                aria-labelledby="navbarDropdownMenuLink-333">
                                <a  class="dropdown-item" href="./views/login/login.php">Entrar</a>
                                <a class="dropdown-item" href="./views/cadastrar/cadastro.php">Cadastrar</a>
                
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Collapsible content -->

            </div>

        </nav>
        <!--/.Navbar-->

        <!--Mask-->
        <div id="intro" class="view">

            <div class="mask rgba-black-light">

                <div class="container-fluid d-flex align-items-center justify-content-center h-100">

                    <div class="row d-flex justify-content-center text-center">

                        <div class="col-md-12">

                            <!-- Heading -->
                            <h2 class="display-4  white-text pt-5 mb-2">
                                Gerenciamento de Arborização
                                <span class="font-weight-bold"> <br /> Urbana</span>
                            </h2>

                            <a href="./views/saiba_mais/blog.php" class="btn btn-outline-white "><i class="fas fa-clone left"></i> Saiba mais</a>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <!--/.Mask-->

    </header>
    <!--Main Navigation-->



