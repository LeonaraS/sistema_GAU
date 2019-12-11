<?php

require './../requires/require.php';

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {

	$endereco = new Endereco($_GET["id"]);	
	$endereco->excluir();
	
}

?>