<?php

require './../requires/require.php';

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {

	$botanica = new Botanica($_GET["id"]);	
	$botanica->excluir();
	
}

?>