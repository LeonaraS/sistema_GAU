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
                <li><a href="./../../painel.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li>
                    <a href="#submenu1" data-toggle="collapse"><i class="fas fa-plus"></i> Adicionar</a>
                    <ul id="submenu1" class="list-unstyled collapse">
                        <li><a href="./adicionar.php">Área Verde</a>
                        <li><a href="./../arvore/adicionar.php">Árvore</a></li>
                        <li><a href="./../bairro/adicionar.php">Bairro</a></li>
                        <li><a href="./../cargo/adicionar.php">Cargo</a></li>
                        <!-- <li><a href="./../cidadao/adicionar.php">Cidadão</a></li> -->
                        <li><a href="./../funcionario/adicionar.php">Funcionário</a></li>
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

        <!-- Corpo do formulário para cadastrar -->

        <div class="content p-1">
            <div class="list-group-item">
                <div class="d-flex">
                    <div class="mr-auto p-2">
                        <h2 class="display-4 titulo">Cadastrar Área Verde</h2>
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

                        require "./../../../../source/Controllers/class.db.php" ;
                        require "./../../../../source/Controllers/class.areaverde.php" ;
                        require "./../../../../source/Controllers/class.endereco.php" ;
                        require "./../../../../source/Controllers/class.tipoareaverde.php" ;
                        require "./../../../../source/Controllers/class.bairro.php" ;
                        require "./../../../../source/Controllers/class.funcionario.php" ;


                        if (isset($_POST['Cadastrar']) && $_POST['Cadastrar'] === 'Cadastrar') {
                            try {
                                $areaverde = new AreaVerde();
                                $areaverde->setTipoAreaverdeIdtipoAreaverde($_POST['tipo_areaverde_idtipo_areaverde']);
                                $areaverde->setFuncionarioIdfuncionario($_POST['funcionario_idfuncionario']);
                                $areaverde->setArea($_POST['area']);
                                $areaverde_idareaverde = $areaverde->adicionar();
                                $endereco = new Endereco();
                                $endereco->setServicoIdservico($_POST['servico_idservico']);
                                $endereco->setBairroIdbairro($_POST['bairro_idbairro']);
                                $endereco->setInfracaoIdinfracao($_POST['infracao_idinfracao']);
                                $endereco->setAreaverdeIdareaverde($areaverde_idareaverde);
                                $endereco->setCidadaoIdcidadao($_POST['cidadao_idcidadao']);
                                $endereco->setCep($_POST['cep']);
                                $endereco->setLogradouro($_POST['logradouro']);
                                $endereco->setNumero($_POST['numero']);
                                $endereco->setPontoReferencia($_POST['ponto_referencia']);
                                $endereco->adicionar();
                            } catch (Exception $e) {
                                echo 'ERRO: ' . $e->getMessage();
                            }
                            
                        }
                    ?>
                </div>

                <hr>

                <!-- Inicio formulario -->
                <form action="" method="post" id="form_areaverde" accept-charset="utf-8" onsubmit="">

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label><span class="text-danger">*</span> Tipo da área verde:</label>

                            <select name="tipo_areaverde_idtipo_areaverde" class="form-control" value="">
                                <option selected name="tipo_areaverde_idtipo_areaverde" value="0">Selecione</option>
                                <?php
                                    $tipos_areaverde = TipoAreaverde::listar();
                                    foreach ($tipos_areaverde as $tipo_areaverde) {?>
                                <option name="tipo_areaverde_idtipo_areaverde"
                                    value="<?php echo $tipo_areaverde->getIdtipoAreaverde(); ?>">
                                    <?php echo $tipo_areaverde->getNome() ?></option>
                                <?php }?>
                               
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label><span class="text-danger">*</span> Área em metros:</label>
                            <input type="number" name="area" step=".01" value="" class="form-control"
                                placeholder="Digite um número ex 10">
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>Logradouro:</label>
                            <input type="text" name="logradouro" class="form-control" value="" placeholder="">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Número:</label>
                            <input type="number" name="numero" class="form-control" value="">
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>Bairro:</label>

                            <select name="bairro_idbairro" class="form-control" value="">
                                <option selected name="bairro_idbairro" value="0">Selecione</option>
                                <?php
                                    $bairros = Bairro::listar();
                                    foreach ($bairros as $bairro) {?>
                                <option name="bairro_idbairro" value="<?php echo $bairro->getIdbairro(); ?>">
                                    <?php echo $bairro->getNome() ?></option>
                                <?php }?>
                        
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Cep:</label>
                            <input type="number" name="cep" class="form-control" value="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Ponto de referência:</label>
                            <input type="text" name="ponto_referencia" class="form-control" value="" placeholder="">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Funcionário que cadastrou:</label>
                            <select name="funcionario_idfuncionario" class="form-control" value="">
                                <option selected name="funcionario_idfuncionario" value="0">Selecione</option>
                                <?php
                                        $funcionarios = Funcionario::listar();
                                        foreach ($funcionarios as $funcionario) {?>
                                <option name="funcionario_idfuncionario"
                                    value="<?php echo $funcionario->getIdfuncionario(); ?>">
                                    <?php echo $funcionario->getNome() ?></option>
                                <?php }?>
                                
                            </select>

                            <input type="hidden" name="servico_idservico" value="0">
                            <input type="hidden" name="cidadao_idcidadao" value="0">
                            <input type="hidden" name="infracao_idinfracao" value="0">
                        </div>
                    </div>

                    <p>
                        <span class="text-danger">* </span>Campo obrigatório
                    </p>

                    <div class=" d-flex align-items-center justify-content-center  ">
                        <div class="sizebtn row d-flex justify-content-center text-center ">
                            <button type="submit" class="sizebtn btn btn-success " name="Cadastrar" value="Cadastrar"
                                s>Cadastrar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Fim do formulário -->


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
   
        $(document).ready(function() 
        {
            $("#form_areaverde").validate({
                rules: 
                {
                    tipo_areaverde_idtipo_areaverde: 
                    {
                        required: true
                    },
                    area: 
                    {
                        required: true
                    },
                    logradouro: 
                    {
                        required: true
                    },
                    numero: 
                    {
                        required: true
                    },
                    bairro_idbairro: 
                    {
                        required: true
                    },
                    cep: 
                    {
                        required: true
                    },
                    ponto_referencia: 
                    {
                        required: true
                    },
                    ponto_referencia: 
                    {
                        required: true
                    }
                }
            });
        });
    </script>

    <script src="./../../../../assets/js/app.js"></script>

</body>

</html>