<?php 

require './../requires/require.php';

if (isset($_POST["Salvar"]) && $_POST["Salvar"] === "Salvar") {
	
	try {
		$infracao = new Infracao($_POST["idinfracao"]);    
	    $infracao->setFuncionarioIdfuncionario($_POST['funcionario_idfuncionario']);
		$infracao->setNomeRazao($_POST['nome_razao']);
		$infracao->setCpfCnpj($_POST['cpf_cnpj']);	
		$infracao->setFone($_POST['fone']);
		$infracao->setEmail($_POST['email']);
		$infracao->setDataInfracao($_POST['data_infracao']);
		$infracao->setObservacao($_POST['observacao']); 
		$infracao->atualizar();	
	} catch (Exception $e) {
		echo 'ERRO: ' . $e->getMessage();
	}
	
}

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
	
	$infracao = new Infracao($_GET["id"]);

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
                        <li><a href="./adicionar.php">Infração</a></li>
                        <li><a href="./../muda/adicionar.php">Muda</a></li>
                        <li><a href="./../projeto/adicionar.php">Projeto</a></li>
                        <!-- <li><a href="./../requerimento/adicionar.php">Requerimento</a></li> -->
                        <li><a href="./../tipo_areaverde/adicionar.php">Tipo de Área Verde</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#submenu2" data-toggle="collapse"><i class="fas fa-list-ul"></i> Listar</a>
                    <ul id="submenu2" class="list-unstyled collapse">
                        <li><a href="./../areaverde/listar.php">Área Verde</a></li>
                        <li><a href="./../arvore/listar.php">Árvore</a></li>
                        <li><a href="./../bairro/listar.php">Bairro</a></li>
                        <li><a href="./../cargo/listar.php">Cargo</a></li>
                        <li><a href="./../cidadao/listar.php">Cidadão</a></li>
                        <li><a href="./../funcionario/listar.php">Funcionário</a></li>
                        <li><a href="./listar.php">Infração</a></li>
                        <li><a href="./../muda/listar.php">Muda</a></li>
                        <li><a href="./../projeto/listar.php">Projeto</a></li>
                        <li><a href="./../requerimento/listar.php">Requerimento</a></li>
                        <li><a href="./../tipo_areaverde/listar.php">Tipo de Área Verde</a></li>
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

        <form action="" method="post" accept-charset="utf-8" onsubmit="">
            <input type="hidden" name="idinfracao" value="<?php echo $infracao->getIdinfracao();?>">
            Nome ou Razão Social:
            <input type="text" name="nome_razao" value="<?php echo $infracao->getNomeRazao();?>" placeholder=""> <br>

            Funcionário que cadastrou:
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

            CPF ou CNPJ:
            <input type="text" name="cpf_cnpj" value="<?php echo $infracao->getCpfCnpj();?>" placeholder=""> <br>

            Fone para contato:
            <input type="text" name="fone" value="<?php echo $infracao->getFone();?>" placeholder=""> <br>

            Email:
            <input type="text" name="email" value="<?php echo $infracao->getEmail();?>" placeholder=""> <br>

            Data da infração:
            <input type="date" name="data_infracao" value="<?php echo $infracao->getDataInfracao();?>"
                placeholder=""><br>

            Observação:
            <textarea name="observacao"><?php echo $infracao->getObservacao()?></textarea>

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