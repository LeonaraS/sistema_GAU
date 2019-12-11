<?php 

require './../requires/require.php';

if (isset($_POST["Salvar"]) && $_POST["Salvar"] === "Salvar") {
	try {
		$funcionario = new Funcionario($_POST["idfuncionario"]);
		$funcionario->setCargoIdcargo($_POST['cargo_idcargo']);             
	    $funcionario->setNome($_POST['nome']);             
	    $funcionario->setCpf($_POST['cpf']);             
	    $funcionario->setEmail($_POST['email']);             
	    $funcionario->setSenha($_POST['senha']);             
	    $funcionario->setDataNascto($_POST['data_nascto']);	
		$funcionario->atualizar();
	} catch (Exception $e) {
		echo 'ERRO: ' . $e->getMessage();
	}
		
}

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
	
	$funcionario = new Funcionario($_GET["id"]);

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
                        <li><a href="./adicionar.php">Funcionário</a></li>
                        <li><a href="./../infracao/adicionar.php">Infração</a></li>
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
                        <li><a href="./listar.php">Funcionário</a></li>
                        <li><a href="./../infracao/listar.php">Infração</a></li>
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
            <input type="hidden" name="idfuncionario" value="<?php echo $funcionario->getIdfuncionario();?>"
                placeholder="">
            Cargo:
            <select name="cargo_idcargo" class="" value="">
                <?php 
	    	 $cargos = Cargo::listar();
	    	 foreach ($cargos as $cargo) {?>
                <option name="cargo_idcargo" value="<?php echo $cargo->getIdcargo();?>"><?php echo $cargo->getNome()?>
                </option>
                <?php } ?>
                <option name="cargo_idcargo" value="1">Cargo 1</option>
                <option name="cargo_idcargo" value="2">Cargo 2</option>
                <option name="cargo_idcargo" value="3">Cargo 3</option>
            </select><br>
            Nome completo:
            <input type="text" name="nome" value="<?php echo $funcionario->getNome();?>" placeholder=""> <br>

            CPF:
            <input type="text" name="cpf" value="<?php echo $funcionario->getCpf();?>" placeholder=""> <br>

            Data de nascimento:
            <input type="date" name="data_nascto" value="<?php echo $funcionario->getDataNascto();?>" placeholder="">
            <br>

            Email:
            <input type="text" name="email" value="<?php echo $funcionario->getEmail();?>" placeholder=""> <br>

            Senha:
            <input type="password" name="senha" value="<?php echo $funcionario->getSenha();?>"
                placeholder="senha de 8 a 10 caracteres" minlength="8" maxlength="10"> <br>

            Repita a senha:
            <input type="password" name="senha2" value="" placeholder="repita a senha anterior" minlength="8"
                maxlength="10">
            <br>

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