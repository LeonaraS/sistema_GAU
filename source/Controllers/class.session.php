<?php

	session_start () ;

	$voltar = "./../../views/login/login.php" ;

	$redireciona_cid = "./../../views/dashboard/painel_usuario.php" ;
	$redireciona_func = "./../../views/dashboard/painel.php" ;

	if ( isset ( $_POST ["enviar"] ) )
	{
		require "./class.cidadao.php" ;
		require "./class.funcionario.php" ;
		require "./class.db.php" ;

		$dataBase = new DB ;
		$cidadao = new Cidadao ;
		$funcionario = new Funcionario ;

		$email = $_POST ["email"] ;
		$senha = filter_input ( INPUT_POST, "senha", FILTER_SANITIZE_STRIPPED ) ;

		$cidadao->setEmail ( $email ) ;
		$cidadao->setSenha ( $senha ) ;

		$funcionario->setEmail ($email) ;
		$funcionario->setSenha ($senha) ;

		$cidadao_resultado = $cidadao->entrarCidadao () ;
		$funcionario_resultado = $funcionario->entrarFuncionario () ;

		if ( count ( $cidadao_resultado ) )
		{
			$_SESSION ["id_usuario"] = $cidadao_resultado[0]->idcidadao ;
			$_SESSION ["nome_usuario"] = $cidadao_resultado[0]->nome ;
			$_SESSION ["tipo_usuario"] = "cidadao" ;

			header ("location: {$redireciona_cid}") ;

			// echo "<pre>" ;
			// var_dump ($cidadao_resultado) ;
			// echo "</pre>" ;
		}
		else if ( count ( $funcionario_resultado ) )
		{
			$_SESSION ["id_usuario"] = $funcionario_resultado[0]->idfuncionario ;
			$_SESSION ["nome_usuario"] = $funcionario_resultado[0]->nome ;
			$_SESSION ["tipo_usuario"] = "funcionario" ;
			header ("location: {$redireciona_func}") ;

			// echo "<pre>" ;
			// var_dump ($funcionario_resultado) ;
			// echo "</pre>" ;
		}
		else
		{
			header ("location: {$voltar}") ;
		}
	}
	else
	{
		header ("location: {$voltar}") ;
	}