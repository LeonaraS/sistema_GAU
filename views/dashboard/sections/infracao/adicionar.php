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
                        <li><a href="./../funcionario/adicionar.php">Funcionário</a></li>
                        <li><a href="./adicionar.php">Infração</a></li>
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
                        <h2 class="display-4 titulo">Cadastrar Infração</h2>
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
                        require './../../../../source/Controllers/class.infracao.php';
                        require './../../../../source/Controllers/class.endereco.php';
                        require './../../../../source/Controllers/class.bairro.php';
                        require './../../../../source/Controllers/class.funcionario.php';

                        if (isset($_POST['Cadastrar']) && $_POST['Cadastrar'] === 'Cadastrar') {

                            try {
                                $infracao = new Infracao();
                                $infracao->setFuncionarioIdfuncionario($_POST['funcionario_idfuncionario']);
                                $infracao->setNomeRazao($_POST['nome_razao']);
                                $infracao->setCpfCnpj($_POST['cpf_cnpj']);
                                $infracao->setFone($_POST['fone']);
                                $infracao->setEmail($_POST['email']);
                                $infracao->setDataInfracao($_POST['data_infracao']);
                                $infracao->setObservacao($_POST['observacao']);
                                $infracao_idinfracao = $infracao->adicionar();
                                $endereco = new Endereco();
                                $endereco->setServicoIdservico($_POST['servico_idservico']);
                                $endereco->setBairroIdbairro($_POST['bairro_idbairro']);
                                $endereco->setInfracaoIdinfracao($infracao_idinfracao);
                                $endereco->setAreaverdeIdareaverde($_POST['areaverde_idareaverde']);
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

                <!-- Começo do form -->
                <form action="" method="post" id="form_infracao" accept-charset="utf-8" onsubmit="">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label><span class="text-danger">*</span> Nome ou Razão Social:</label>
                            <input type="text" name="nome_razao" class="form-control" value="" placeholder="">
                        </div>

                        <div class="form-group col-md-3">
                            <label><span class="text-danger">*</span> CPF ou CNPJ:</label>
                            <input type="text" name="cpf_cnpj" value="" class="form-control" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Logradouro:</label>
                            <input type="text" name="logradouro" class="form-control" value="" placeholder="">
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-3">
                            <label>Número:</label>
                            <input type="number" name="numero" value="" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label> Bairro:</label>
                            <select name="bairro_idbairro" class="form-control" value="">
                                <option selected name="bairro_idbairro" value="0">Selecione</option>
                                <?php
                                    $bairros = Bairro::listar();
                                    foreach ($bairros as $bairro) {?>
                                <option name="bairro_idbairro" value="<?php echo $bairro->getNome(); ?>">
                                    <?php echo $bairro->getNome() ?></option>
                                <?php }?>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Cep:</label>
                            <input type="number" name="cep" value="" class="form-control">
                        </div>

                        <div class="form-group col-md-3">
                            <label>Fone para contato:</label>

                            <input type="text" name="fone" value="" placeholder="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4 ">
                            <label>Ponto de referência:</label>
                            <input type="text" name="ponto_referencia" class="form-control" value="" placeholder="">
                            <input type="hidden" name="areaverde_idareaverde" value="0">
                            <input type="hidden" name="cidadao_idcidadao" value="0">
                            <input type="hidden" name="servico_idservico" value="0">
                        </div>

                        <div class="form-group col-md-5 ">
                            <label> E-mail:</label>
                            <input type="text" name="email" value="" placeholder="" class="form-control">
                        </div>

                        <div class="form-group col-md-3 ">
                            <label>Data da infração:</label>
                            <input type="date" name="data_infracao" value="" placeholder="" class="form-control">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="md-form">
                                <textarea id="form7" class="md-textarea form-control" name="observacao" rows="3"
                                    style="resize: none; height:60px"></textarea>
                                <label for="form7">Observação:</label>
                            </div>
                        </div>

                        <div class="form-group col-md-6 d-flex flex-column justify-content-center">
                            <label> Funcionário que cadastrou:</label>
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
    $(document).ready(function() {
        $("#form_infracao").validate({
            rules: {
                nome_razao: 
                {
                    required: true
                },
                cpf_cnpj: 
                {
                    required: true
                },
                cpf:
                 {
                    required: true
                },
                logradouro: 
                {
                    required: true
                },
                numero:
                {
                    required:true
                },
                bairro_idbairro:
                {
                    required: true
                },
                cep:
                {
                    required: true
                },
                fone:
                {
                    required: true
                },
                ponto_referencia:
                {
                    required: true
                },
                email:
                {
                    required: true
                },
                data_infracao:
                {
                    required: true
                },
                observacao:
                {
                    required:true
                }, 
                funcionario_idfuncionario:
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