<?php

require './../requires/require.php';

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {

	$servico = new Servico($_GET["id"]);	
	$servico->excluir();
	
}

?>