<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./../../../../node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="./../../../../node_modules/mdbootstrap/css/mdb.min.css">

    <!--  Css -->
    <link rel="stylesheet" href="./../../../../assets/css/painel.css">

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
                       <span
                            class="d-none d-sm-inline">Usuário</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="./../../logout"><i class="fas fa-sign-out-alt"></i> Sair</a>
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
                        <li><a href="./../areaverde/adicionar.php">Área Verde</a>
                        <li><a href="./../arvore/adicionar.php">Árvore</a></li>
                        <li><a href="./../bairro/adicionar.php">Bairro</a></li>
                        <li><a href="./../cargo/adicionar.php">Cargo</a></li>
                        <!-- <li><a href="./../cidadao/adicionar.php">Cidadão</a></li> -->
                        <li><a href="./adicionar.php">Funcionário</a></li>
                        <li><a href="./../infracao/adicionar.php">Infração</a></li>
                        <li><a href="./../muda/adicionar.php">Muda</a></li>
                        <li><a href="./../projeto/adicionar.php">Projeto</a></li>
                        <!-- <li><a href="./../requerimento/adicionar.php">Requerimento</a></li> -->
                        <li><a href="./../tipo_areaverde/adicionar.php">Tipo de Área Verde</a></li>
                    </ul>
                </li>
               
                <li>
                    <a href="#submenu3" data-toggle="collapse"><i class="fas fa-list-ul"></i> Relatorios</a>
                    <ul id="submenu3" class="list-unstyled collapse">
                    <li>
                            <a target="_blank" href="./../../relatorios/arvores-do-municipio.php">Arvores municipio </a>
                        </li>
                        <li>
                            <a target="_blank" href="./../../relatorios/arvores-por-bairro.php">Arvores bairro</a>
                        </li>
                        <!-- <li><a href="?modulo=arvore&acao=listar">Árvore</a></li>
                        <li><a href="?modulo=bairro&acao=listar">Bairro</a></li>
                        <li><a href="?modulo=cargo&acao=listar">Cargo</a></li>
                        <li><a href="?modulo=cidadao&acao=listar">Cidadão</a></li>
                        <li><a href="?modulo=funcionario&acao=listar">Funcionário</a></li>
                        <li><a href="?modulo=infracao&acao=listar">Infração</a></li>
                        <li><a href="?modulo=muda&acao=listar">Muda</a></li>
                        <li><a href="?modulo=projeto&acao=listar">Projeto</a></li>
                        <li><a href="?modulo=requerimento&acao=listar">Requerimento</a></li>
                        <li><a href="?modulo=tipo_areaverde&acao=listar">Tipo de Área Verde</a></li> -->
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="content p-1">
            <div class="list-group-item">
                <div class="d-flex">
                    <div class="mr-auto p-2">
                        <h2 class="display-4 titulo">Cadastrar Funcionário </h2>
                    </div>

                    <a href="./listar.php">
                        <div class="p-2">
                            <button class="btn btn-outline-info btn-sm">
                                Listar
                            </button>
                        </div>
                    </a>
                </div>

                <div class="alert " role="alert">
                    <?php  
                        require './../../../../source/Controllers/class.db.php';
                        require './../../../../source/Controllers/class.funcionario.php';
                        require './../../../../source/Controllers/class.cargo.php';

                        if(isset($_POST['Cadastrar']) && $_POST['Cadastrar'] === 'Cadastrar'){
                            
                            try {
                                $funcionario = new Funcionario();
                                $funcionario->setCargoIdcargo($_POST['cargo_idcargo']);
                                $funcionario->setNome($_POST['nome']);
                                $funcionario->setCpf($_POST['cpf']);	
                                $funcionario->setEmail($_POST['email']);
                                $funcionario->setSenha($_POST['senha']);
                                $funcionario->setDataNascto($_POST['data_nascto']);
                                $funcionario->adicionar();
                                
                            } catch (Exception $e) {
                                echo 'ERRO: ' . $e->getMessage();
                            }	

                        }
                    ?>
                    </div>

                <hr>

                <form action="" method="post" id="form_funcionario" name="form_funcionario" accept-charset="utf-8" onsubmit="return funcionario()">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label><span class="text-danger">*</span> Cargo:</label>
                            <select name="cargo_idcargo" class="form-control" value="">
                                <option selected name="cargo_idcargo" value="0">Selecione</option>
                                <?php 
                                    $cargos = Cargo::listar();
                                    foreach ($cargos as $cargo) {?>
                                <option name="cargo_idcargo" value="<?php echo $cargo->getIdcargo();?>">
                                    <?php echo $cargo->getNome()?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label><span class="text-danger">*</span> Nome completo:</label>
                            <input type="text" id="nome" name="nome" class="form-control" value="" placeholder="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Cpf:</label>
                            <input type="text" name="cpf" value="" class="form-control" placeholder="">
                        </div>

                        <div class="form-group col-md-3">
                            <label> Data de nascimento:</label>
                            <input type="date" name="data_nascto" class="form-control" value="" placeholder="">
                        </div>

                        <div class="form-group col-md-6">
                            <label> E-mail:</label>
                            <input type="text" name="email" class="form-control" value="" placeholder="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label> Senha:</label>
                            <input type="password" id="senha" name="senha" value="" class="form-control"
                                placeholder="senha de 8 a 10 caracteres" minlength="8" maxlength="10">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Repita a senha:</label>
                            <input type="password" name="senha2" value="" class="form-control"
                                placeholder="repita a senha anterior">
                        </div>
                    </div>

                    <p>
                        <span class="text-danger">* </span>Campo obrigatório
                    </p>

                    <div class=" d-flex align-items-center justify-content-center  ">
                        <div class="sizebtn row d-flex justify-content-center text-center ">
                            <button type="submit" class="sizebtn btn btn-success" name="Cadastrar"
                                value="Cadastrar">Cadastrar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Fim do form -->


 
    <!-- JQuery MDB -->
    <script type="text/javascript" src="./../../../../node_modules/mdbootstrap/js/jquery-3.4.1.min.js"></script>

    <!-- MDB   -->
    <script type="text/javascript" src="./../../../../node_modules/mdbootstrap/js/popper.min.js"></script>

    <!-- Bootstrap  -->
    <script type="text/javascript" src="./../../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- MDB  -->
    <script type="text/javascript" src="./../../../../node_modules/mdbootstrap/js/mdb.min.js"></script>

    <script src="./../../../../node_modules/jquery/dist/jquery.min.js"></script>
    <!-- jquery -->

    <script src="./../../../../node_modules/jquery/dist/jquery.min.js"></script>

    <!-- Validate -->
    <script src="./../../../../node_modules/jquery-validation/dist/jquery.validate.min.js"></script>

    <script src="./../../../../node_modules/jquery-validation/dist/additional-methods.js"></script>

    <script src="./../../../../node_modules/jquery-validation/dist/localization/messages_pt_BR.js"></script>

    <!-- validate script -->
    <script type="text/javascript">
    $(document).ready(function() {
        $("#form_funcionario").validate({
            rules: {
                cargo_idcargo: 
                {
                    required: true
                },
                nome: 
                {
                    required: true
                },
                cpf:
                 {
                    required: true
                },
                data_nascto: 
                {
                    required: true
                },
                email:
                {
                    required: true
                },
                senha:
                {
                    required: true
                },
                senha2:
                {
                    required: true,
                    equalTo:"#senha"
                }
            },
            messages:
            {
                nome:{ 
                    required: "O campo nome é obrigatório.",
                    minlength: "O campo nome deve conter no mínimo 3 caracteres."
                },
                cpf:{ 
                    required: "O campo CPF é obrigatório.",
                    cpf: true
                },
                data_nascto:{ 
                    required: "O campo data é obrigatório.",
                    date: true
                },
                email: {
                    required: "O campo email é obrigatório.",
                    email: "O campo email deve conter um email válido."
                },
                senha: {
                    required: "O campo senha é obrigatório."
                },
                senha2:{
                    required: "O campo confirmação de senha é obrigatório.",
                    equalTo: "O campo confirmação de senha deve ser identico ao campo senha."
                }
            }
        });
    });
    </script>
    <script src="./../../../../assets/js/valida.js"></script>
    <script src="./../../../../assets/js/app.js"></script>

</body>

</html>