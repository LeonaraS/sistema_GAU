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
                        <li><a href="./adicionar.php">Árvore</a></li>
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

        <!-- Começando o corpo da página -->
        <div class="content p-1">
            <div class="list-group-item">
                <div class="d-flex">
                    <div class="mr-auto p-2">
                        <h2 class="display-4 titulo">Cadastrar Árvore</h2>
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

                        require './../requires/require.php';

                        if (isset($_POST['Cadastrar']) && $_POST['Cadastrar'] === 'Cadastrar') {

                            try {
                                $arvore = new Arvore();
                                $arvore->setAreaverdeIdareaverde($_POST['areaverde_idareaverde']);
                                $arvore->setFuncionarioIdfuncionario($_POST['funcionario_idfuncionario']);
                                $arvore->setMatriz($_POST['matriz']);
                                $arvore->setAltura($_POST['altura']);
                                $arvore->setLargura($_POST['largura']);
                                $arvore->setDataPoda($_POST['data_poda']);
                                $arvore->setEliminacao($_POST['eliminacao']);
                                $arvore->setFitossanidade($_POST['fitossanidade']);
                                $arvore->setObservacao($_POST['observacao']);
                                $arvore_idarvore = $arvore->adicionar();
                                $botanica = new Botanica();
                                $botanica->setArvoreIdarvore($arvore_idarvore);
                                $botanica->setMudaIdmuda($_POST['muda_idmuda']);
                                $botanica->setNomePopular($_POST['nome_popular']);
                                $botanica->setNomeCientifico($_POST['nome_cientifico']);
                                $botanica->setNativa($_POST['nativa']);
                                $botanica->setFrutifera($_POST['frutifera']);
                                $botanica->setExotica($_POST['exotica']);
                                $botanica->adicionar();

                            } catch (Exception $e) {
                                echo 'ERRO: ' . $e->getMessage();
                            }	

                        }
                    ?>
                </div>

                <hr>

                <!-- Começo do formulário -->
                <form action="" method="post" id="form_arvore" accept-charset="utf-8" onsubmit="">

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label><span class="text-danger">*</span> Área verde:</label>
                            <select name="areaverde_idareaverde" class="form-control" value="">
                                <option selected name="areaverde_idareaverde" value="0">Selecione</option>
                                <?php
                                    $areasverdes = AreaVerde::listar();
                                    foreach ($areasverdes as $areaverde) {?>
                                <option name="areaverde_idareaverde"
                                    value="<?php echo $areaverde->getIdareaverde(); ?>">
                                    <?php echo $areaverde->pegaTipo()->getNome();  ?></option>
                                <?php }?>
    
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label><span class="text-danger">*</span> Nome popular:</label>
                            <input type="text" name="nome_popular" class="form-control" value="" placeholder="">
                        </div>

                        <div class="form-group col-md-4">
                            <label> Nome cientifico:</label>
                            <input type="text" name="nome_cientifico" class="form-control" value="" placeholder="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label> Nativa:</label>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline1" name="nativa"
                                    value="s">
                                <label class="custom-control-label" for="defaultInline1">Sim</label>
                            </div>
                            <!-- Default inline 2-->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline2" name="nativa"
                                    value="n" checked>
                                <label class="custom-control-label" for="defaultInline2">Não</label>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Frutífera:</label>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline3" name="frutifera"
                                    value="s">
                                <label class="custom-control-label" for="defaultInline3">Sim</label>
                            </div>
                            <!-- Default inline 4-->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline4" name="frutifera"
                                    value="n" checked>
                                <label class="custom-control-label" for="defaultInline4">Não</label>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Exótica:</label>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline5" name="exotica"
                                    value="s">
                                <label class="custom-control-label" for="defaultInline5">Sim</label>
                            </div>
                            <!-- Default inline 4-->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline6" name="exotica"
                                    value="n" checked>
                                <label class="custom-control-label" for="defaultInline6">Não</label>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Matriz:</label>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline7" name="matriz"
                                    value="s">
                                <label class="custom-control-label" for="defaultInline7">Sim</label>
                            </div>
                            <!-- Default inline 4-->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline8" name="matriz"
                                    value="n" checked>
                                <label class="custom-control-label" for="defaultInline8">Não</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Altura:</label>
                            <input type="number" name="altura" step=".01" class="form-control" value="" placeholder="">
                        </div>

                        <div class="form-group col-md-2">
                            <label>Largura:</label>
                            <input type="number" name="largura" step=".01" class="form-control" value="" placeholder="">
                        </div>

                        <div class="form-group col-md-3">
                            <label> Data última poda:</label>
                            <input type="date" name="data_poda" value="" class="form-control" placeholder="">
                        </div>

                        <div class="form-group col-md-3 container-fluid">
                            <div class="d-flex flex-row justify-content-center align-items-end altura">
                                <label class="text-eliminacao"> Eliminacao:</label>
                                <div class="custom-control custom-radio custom-control-inline ml-1">
                                    <input type="radio" class="custom-control-input" id="defaultInline9"
                                        name="eliminacao" value="s">
                                    <label class="custom-control-label" for="defaultInline9">Sim</label>
                                </div>
                                <!-- Default inline 4-->
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="defaultInline10"
                                        name="eliminacao" value="n" checked>
                                    <label class="custom-control-label" for="defaultInline10">Não</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <div class="md-form">
                                <textarea id="form7" class="md-textarea form-control" name="fitossanidade"
                                    rows="3"></textarea>
                                <label for="form7">Fitossanidade:</label>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <div class="md-form">
                                <textarea id="form7" class="md-textarea form-control" name="observacao"
                                    rows="3"></textarea>
                                <label for="form7">Observações:</label>
                            </div>
                            <input type="hidden" name="muda_idmuda" value="0">
                        </div>

                        <div class="form-group col-md-4 d-flex flex-column justify-content-center ">
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
        $("#form_arvore").validate({
            rules: {
                areaverde_idareaverde: {
                    required: true
                },
                nome_popular: {
                    required: true
                },
                nome_cientifico: {
                    required: true
                },
                altura: {
                    required: true
                },
                largura : {
                    required: true
                },
                data_poda: {
                    required: true
                },
                fitossanidade: {
                    required: true
                },
                observacao: {
                    required: true
                },
                funcionario_idfuncionario: {
                    required: true
                }
            }
        });
    });
    </script>

    <script src="./../../../../assets/js/app.js"></script>

</body>

</html>