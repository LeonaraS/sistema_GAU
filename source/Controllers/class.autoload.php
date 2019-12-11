<?php
function myAutoLoad($class) {
	$class = str_replace('\\', '/', $class);
	if (file_exists('./../../source/Controllers/class.' . $class . '.php')) {
		include '../../source/Controllers/class.' . $class . '.php';
	}
	else
	{
		echo 'Arquivo nao encontrado';
	}
};

spl_autoload_register('myAutoLoad');

?>