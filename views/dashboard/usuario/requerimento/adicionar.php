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
                        <li><a href="./adicionar.php">Requerimento</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#submenu3" data-toggle="collapse"><i class="fas fa-list-ul"></i> Relatorios</a>
                    <ul id="submenu3" class="list-unstyled collapse">
                        <!-- <li>
                            <a target="_blank" href="./relatorios">Funcionarios</a>
                        </li> -->
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


        <div class="content p-1 h_mxm">
            <div class="list-group-item">
                <div class="d-flex">
                    <div class="mr-auto p-2">
                        <h2 class="display-4 titulo">Cadastrar Requerimento</h2>
                    </div>
                </div>

                <div class="alert" role="alert">
                      <?php

                            require './../../sections/requires/require.php';

                            // Data
                            require './../../../../vendor/autoload.php';
                            use Carbon\Carbon;
                            $hoje = Carbon::now();
                            $data = date('Y/m/d', strtotime($hoje));

                            // 
                            if (isset($_POST['Cadastrar']) && $_POST['Cadastrar'] === 'Cadastrar') {

                                try {
                                    $requerimento = new Requerimento();
                                    $requerimento->setFuncionarioIdfuncionario($_POST['funcionario_idfuncionario']);
                                    $requerimento->setCidadaoIdcidadao($_POST['cidadao_idcidadao']);
                                    $requerimento->setCopiaRg($_POST['copia_rg']);
                                    $requerimento->setCopiaCpf($_POST['copia_cpf']);
                                    $requerimento->setCompResidencia($_POST['comp_residencia']);
                                    $requerimento->setAutorizacao($_POST['autorizacao']);
                                    $requerimento->setDataReqto($data);
                                    $requerimento_idrequerimento = $requerimento->adicionar();
                                    $servico = new Servico();
                                    $servico->setRequerimentoIdrequerimento($requerimento_idrequerimento);
                                    $servico->setEliminacaoExterna($_POST['eliminacao_externa']);
                                    $servico->setQuantElimExt($_POST['quant_elim_ext']);
                                    $servico->setEliminacaoInterna($_POST['eliminacao_interna']);
                                    $servico->setQuantElimInt($_POST['quant_elim_int']);
                                    $servico->setPodaExterna($_POST['poda_externa']);
                                    $servico->setQuantPodaExt($_POST['quant_poda_ext']);
                                    $servico->setPodaInterna($_POST['poda_interna']);
                                    $servico->setQuantPodaInt($_POST['quant_poda_int']);
                                    $servico->setOutro($_POST['outro']);
                                    $servico->setJustificativa($_POST['justificativa']);
                                    $servico_idservico = $servico->adicionar();
                                    $endereco = new Endereco();
                                    $endereco->setServicoIdservico($servico_idservico);
                                    $endereco->setBairroIdbairro($_POST['bairro_idbairro']);
                                    $endereco->setInfracaoIdinfracao($_POST['infracao_idinfracao']);
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

                <!-- começo do form -->
                <form action="" method="post" accept-charset="utf-8" onsubmit="">
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label><span class="text-danger">*</span> Anexar cópia do RG:</label>
                            <div class="custom-file">
                                <input type="file" name="copia_rg" class="custom-file-input" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Escolha o arquivo</label>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label><span class="text-danger">*</span> Anexar cópia do CPF:</label>
                            <div class="custom-file">
                                <input type="file" name="copia_cpf" class="custom-file-input" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Escolha o arquivo</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Anexar cópia do comprovante de residência:</label>
                            <div class="custom-file">
                                <input type="file" name="comp_residencia" class="custom-file-input"
                                    id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Escolha o arquivo</label>
                            </div>
                        </div>

                    </div>

                   

                    <div class="form-row">
                        <div class="form-group col-md-7 d-flex justify-content-center align-items-center">
                            <label class="text-eliminacao mr-2 "> Autorização p/ <b>ELIMINAÇÃO</b> de árvore (
                                <b>Fora do imóvel </b>):</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline1"
                                    name="eliminacao_externa" value="s">
                                <label class="custom-control-label" for="defaultInline1">Sim</label>
                            </div>
                            <!-- Default inline 2-->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline2"
                                    name="eliminacao_externa" value="n" checked>
                                <label class="custom-control-label" for="defaultInline2" >Não</label>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Quantidade:</label>

                            <input type="number" name="quant_elim_ext" class="form-control" value="0">
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-7 d-flex justify-content-center align-items-center">
                            <label class="text-eliminacao mr-2 "> Autorização p/ <b>ELIMINAÇÃO</b> de árvore (
                                <b>Dentro do imóvel </b>):</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline3"
                                    name="eliminacao_interna" value="s">
                                <label class="custom-control-label" for="defaultInline3">Sim</label>
                            </div>
                            <!-- Default inline 2-->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline4"
                                    name="eliminacao_interna" value="n" checked>
                                <label class="custom-control-label" for="defaultInline4">Não</label>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Quantidade:</label>

                            <input type="number" name="quant_elim_int" class="form-control" value="0">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-7 d-flex justify-content-center align-items-center">
                            <label class="text-eliminacao mr-2 text-"> Autorização p/ <b>PODA</b> de árvore (<b> Fora do
                                    imóvel </b>):</label>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline5" name="poda_externa"
                                    value="s">
                                <label class="custom-control-label" for="defaultInline5">Sim</label>
                            </div>
                            <!-- Default inline 2-->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline6" name="poda_externa"
                                    value="n" checked>
                                <label class="custom-control-label" for="defaultInline6">Não</label>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Quantidade:</label>

                            <input type="number" name="quant_poda_ext" class="form-control" value="0">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-7 d-flex justify-content-center align-items-center">
                            <label class="text-eliminacao mr-2 text-"> Autorização para <b>PODA</b> de árvore (<b>
                                    Dentro do imóvel </b>):</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline7" name="poda_interna"
                                    value="s">
                                <label class="custom-control-label" for="defaultInline7">Sim</label>
                            </div>
                            <!-- Default inline 2-->
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="defaultInline8" name="poda_interna"
                                    value="n" checked>
                                <label class="custom-control-label" for="defaultInline8">Não</label>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Quantidade:</label>
                            <input type="number" name="quant_poda_int" class="form-control" value="0">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="md-form">
                                <textarea id="form7" class="md-textarea form-control" name="outro" rows="3"
                                    style="resize: none; height:60px"></textarea>
                                <label for="form7">Outros:</label>
                            </div>
                        </div>

                        <div class="form-group col-md-6 d-flex flex-column justify-content-center">
                            <label> Logradouro:</label>
                            <input type="text" name="logradouro" class="form-control" value="" placeholder="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label> Número:</label>
                            <input type="number" name="numero" class="form-control" value="">
                        </div>

                        <div class="form-group col-md-3">
                            <label> Bairro: </label>
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

                        <div class="form-group col-md-3 d-flex flex-column justify-content-center">
                            <label> Cep:</label>
                            <input type="number" class="form-control" name="cep" value="">
                        </div>

                        <div class="form-group col-md-3 d-flex flex-column justify-content-center">
                            <label> Ponto de referência:</label>
                            <input type="text" name="ponto_referencia" class="form-control" value="" placeholder="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="md-form">
                                <textarea id="form7" class="md-textarea form-control" name="justificativa" rows="3"
                                    style="resize: none; height:60px"></textarea>
                                <label for="form7">Justificativa da <b>PODAGEM</b> ou <b>ELIMINAÇÃO</b>:</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="alert alert-color2 alert-dismissible fade show" role="alert">
                                <b>OBS:</b> Caso a árvore esteja no imóvel de outra pessoa, o requerente deverá
                                apresentar um documento por escrito da pessoa autorizando ela a dar entrada ao processo.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6 disabled">
                            <label> Data do requerimento: </label>
                            <input type="text" class="form-control" name="data_reqto"
                                value="<?php echo date('Y/m/d', strtotime($hoje)); ?>" placeholder="">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Anexar cópia da autorização (terceiros):</label>
                            <div class="custom-file">
                                <input type="file" name="autorizacao" class="custom-file-input" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01">
                                <input type="hidden" name="infracao_idinfracao" value="0">
                                <input type="hidden" name="areaverde_idareaverde" value="0">
                                <input type="hidden" name="cidadao_idcidadao" value="0">
                                <label class="custom-file-label" for="inputGroupFile01">Escolha o arquivo</label>
                            </div>
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

    <!-- fim do form -->

    <!-- JQuery MDB -->
    <script type="text/javascript" src="./../../../../node_modules/mdbootstrap/js/jquery-3.4.1.min.js"></script>

    <!-- MDB   -->
    <script type="text/javascript" src="./../../../../node_modules/mdbootstrap/js/popper.min.js"></script>

    <!-- Bootstrap  -->
    <script type="text/javascript" src="./../../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- MDB  -->
    <script type="text/javascript" src="./../../../../node_modules/mdbootstrap/js/mdb.min.js"></script>

    <script src="./../../../../node_modules/jquery/dist/jquery.min.js"></script>

    <script src="./../../../../"></script>

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