<?php 
require './../requires/require.php';

if (isset($_POST["Salvar"]) && $_POST["Salvar"] === "Salvar") {
	try {
		$requerimento = new Requerimento($_POST["idrequerimento"]);    
	    $requerimento->setFuncionarioIdfuncionario($_POST['funcionario_idfuncionario']);
		$requerimento->setCidadaoIdcidadao($_POST['cidadao_idcidadao']);
		$requerimento->setCopiaRg($_POST['copia_rg']);
		$requerimento->setCopiaCpf($_POST['copia_cpf']);
		$requerimento->setCompResidencia($_POST['comp_residencia']);
		$requerimento->setAutorizacao($_POST['autorizacao']);
		$requerimento->setDataReqto($data);
		$requerimento->atualizar();
	} catch (Exception $e) {
		echo 'ERRO: ' . $e->getMessage();
	}
		
}

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
	
	$requerimento = new Requerimento($_GET["id"]);

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
                        <li><a href="./../infracao/adicionar.php">Infração</a></li>
                        <li><a href="./../muda/adicionar.php">Muda</a></li>
                        <li><a href="./../projeto/adicionar.php">Projeto</a></li>
                        <li><a href="./adicionar.php">Requerimento</a></li>
                        <li><a href="./../tipo_areaverde/adicionar.php">Tipo de Área Verde</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#submenu2" data-toggle="collapse"><i class="fas fa-list-ul"></i> Listar</a>
                    <ul id="submenu2" class="list-unstyled collapse">
                        <li><a href="./listar.php">Requerimento</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#submenu3" data-toggle="collapse"><i class="fas fa-list-ul"></i> Relatorios</a>
                    <ul id="submenu3" class="list-unstyled collapse">
                        <li>
                            <a target="_blank" href="./relatorios">Funcionarios</a>
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

        <form action="" method="post" accept-charset="utf-8" onsubmit="">
            <input type="hidden" name="idrequerimento" value="<?php echo $requerimento->getIdrequerimento();?>"
                placeholder="">
            Funcionário que analisou:
            <select name="funcionario_idfuncionario" class="" value="">
                <?php 
	    	 $funcionarios = Funcionario::listar();
	    	 foreach ($funcionarios as $funcionario) {?>
                <option name="funcionario_idfuncionario" value="<?php echo $funcionario->getIdfuncionario();?>">
                    <?php echo $funcionario->getNome()?></option>
                <?php } ?>
                <option name="funcionario_idfuncionario" value="1">Funcionário 1</option>
                <option name="funcionario_idfuncionario" value="2">Funcionário 2</option>
                <option name="funcionario_idfuncionario" value="3">Funcionário 3</option>
            </select> <br>

            Cidadão que solicitou:
            <select name="cidadao_idcidadao" class="" value="">
                <?php 
	    	 $cidadaos = Cidadao::listar();
	    	 foreach ($cidadaos as $cidadao) {?>
                <option name="cidadao_idcidadao" value="<?php echo $cidadao->getIdcidadao();?>">
                    <?php echo $cidadao->getNome()?></option>
                <?php } ?>
                <option name="cidadao_idcidadao" value="1">Cidadão 1</option>
                <option name="cidadao_idcidadao" value="2">Cidadão 2</option>
                <option name="cidadao_idcidadao" value="3">Cidadão 3</option>
            </select> <br>

            Anexar cópia do RG:
            <input type="file" name="copia_rg" value="<?php echo $requerimento->getCopiaRg();?>" placeholder=""><br>

            Anexar cópia do CPF:
            <input type="file" name="copia_cpf" value="<?php echo $requerimento->getCopiaCpf();?>" placeholder=""><br>

            Anexar cópia do comprovante de residência:
            <input type="file" name="comp_residencia" value="<?php echo $requerimento->getCompResidencia();?>"
                placeholder=""><br>

            Anexar cópia da autorização (terceiros):
            <input type="file" name="autorizacao" value="<?php echo $requerimento->getAutorizacao();?>"
                placeholder=""><br>

            Data do requerimento:
            <input type="text" name="data_reqto" value="<?php echo date('d/m/Y', strtotime($hoje));?>"
                placeholder=""><br>

            <input type="submit" name="Salvar" value="Salvar">
            <input type="reset" name="Limpar" value="Limpar">

        </form>
        <?php  
}
?>



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