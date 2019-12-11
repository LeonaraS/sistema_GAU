<?php  
require './../requires/require.php';

if(isset($_POST['Cadastrar']) && $_POST['Cadastrar'] === 'Cadastrar'){
	
	$endereco = new Endereco();
	$endereco->setServicoIdservico($_POST['servico_idservico']);		
	$endereco->setBairroIdbairro($_POST['bairro_idbairro']);		
	$endereco->setInfracaoIdinfracao($_POST['infracao_idinfracao']);		
	$endereco->setAreaverdeIdareaverde($_POST['areaverde_idareaverde']);		
	$endereco->setCidadaoIdcidadao($_POST['cidadao_idcidadao']);		
	$endereco->setCep($_POST['cep']);		
	$endereco->setLogradouro($_POST['logradouro']);		
	$endereco->setNumero($_POST['numero']);		
	$endereco->setPontoReferencia($_POST['ponto_referencia']);		
	$endereco->adicionar(); 

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
                        <img class="rounded-circle" src="imagem/icon.png" width="20" height="20"> &nbsp;<span
                            class="d-none d-sm-inline">Usuário</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Perfil</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Sair</a>
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
                        <li><a href="./adicionar.php">Cidadão</a></li>
                        <li><a href="./../funcionario/adicionar.php">Funcionário</a></li>
                        <li><a href="./../infracao/adicionar.php">Infração</a></li>
                        <li><a href="./../muda/adicionar.php">Muda</a></li>
                        <li><a href="./../projeto/adicionar.php">Projeto</a></li>
                        <li><a href="./../requerimento/adicionar.php">Requerimento</a></li>
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
                        <li><a href="./listar.php">Cidadão</a></li>
                        <li><a href="./../funcionario/listar.php">Funcionário</a></li>
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
	Servico:
	<select name="servico_idservico" class="" value="">
	    <option selected  name="servico_idservico" value="0">Selecione</option>	
	    <?php 
	    	 $servicos = Servico::listar();
	    	 foreach ($servicos as $servico) {?>	
	    	 <option  name="servico_idservico" value="<?php echo $servico->getIdservico();?>"><?php echo $servico->getIdservico()?></option>  
	    <?php } ?>
	    <option name="servico_idservico" value="1" >Servico 1</option> 	   
	    <option name="servico_idservico" value="2" >Servico 2</option> 	   
	    <option name="servico_idservico" value="3" >Servico 3</option> 	   
    </select> <br>

	Bairro:
	<select name="bairro_idbairro" class="" value="">
	    <option selected  name="bairro_idbairro" value="0">Selecione</option>	
	    <?php 
	    	 $bairros = Bairro::listar();
	    	 foreach ($bairros as $bairro) {?>	
	    	 <option  name="bairro_idbairro" value="<?php echo $bairro->getNome();?>"><?php echo $bairro->getNome()?></option>  
	    <?php } ?>
	    <option name="bairro_idbairro" value="1" >Bairro 1</option> 	   
	    <option name="bairro_idbairro" value="2" >Bairro 2</option> 	   
	    <option name="bairro_idbairro" value="3" >Bairro 3</option> 	   
    </select> <br>

    Infração:
	<select name="infracao_idinfracao" class="" value="">
	    <option selected  name="infracao_idinfracao" value="0">Selecione</option>	
	    <?php 
	    	 $infracoes = Infracao::listar();
	    	 foreach ($infracoes as $infracao) {?>	
	    	 <option  name="infracao_idinfracao" value="<?php echo $infracao->getIdinfracao();?>"><?php echo $infracao->getIdinfracao()?></option>  
	    <?php } ?>
	    <option name="infracao_idinfracao" value="1" >Infração 1</option> 	   
	    <option name="infracao_idinfracao" value="2" >Infração 2</option> 	   
	    <option name="infracao_idinfracao" value="3" >Infração 3</option> 	   
    </select> <br>

    Área verde:
	<select name="areaverde_idareaverde" class="" value="">
	    <option selected  name="areaverde_idareaverde" value="0">Selecione</option>	
	    <?php 
	    	 $areasverdes = AreaVerde::listar();
	    	 foreach ($areasverdes as $areaverde) {?>	
	    	 <option  name="areaverde_idareaverde" value="<?php echo $areaverde->getIdareaverde();?>"><?php echo $areaverde->getIdareaverde()?></option>  
	    <?php } ?>
	    <option name="areaverde_idareaverde" value="1" >Área verde 1</option> 	   
	    <option name="areaverde_idareaverde" value="2" >Área verde 2</option> 	   
	    <option name="areaverde_idareaverde" value="3" >Área verde 3</option> 	   
    </select> <br>

    Cidadão:
	<select name="cidadao_idcidadao" class="" value="">
	    <option selected  name="cidadao_idcidadao" value="0">Selecione</option>	
	    <?php 
	    	 $cidadaos = Cidadao::listar();
	    	 foreach ($cidadaos as $cidadao) {?>	
	    	 <option  name="cidadao_idcidadao" value="<?php echo $cidadao->getIdcidadao();?>"><?php echo $cidadao->getNome()?></option>  
	    <?php } ?>
	    <option name="cidadao_idcidadao" value="1" >Cidadão 1</option> 	   
	    <option name="cidadao_idcidadao" value="2" >Cidadão 2</option> 	   
	    <option name="cidadao_idcidadao" value="3" >Cidadão 3</option> 	   
    </select> <br>

    CEP:
    <input type="number" name="cep" value=""><br>

    Logradouro:
    <input type="text" name="logradouro" value="" placeholder=""><br>
	
	Número:
    <input type="number" name="numero" value=""><br>
	
	Ponto de referência:
    <input type="text" name="ponto_referencia" value="" placeholder=""><br>

	<input type="submit" name="Cadastrar" value="Cadastrar">	
	<input type="reset" name="Limpar" value="Limpar">	
	
</form>