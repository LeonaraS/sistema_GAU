<?php

class DB {

	public static $conexao;

	public static function conexao() {

		try {

			self::$conexao = new PDO('mysql:host=localhost;dbname=gau', 'root', '');
			self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$conexao->exec("set names utf8");

		} catch (PDOException $e) {
			echo "Mensagem: " . $e->getMessage() . "<br>";
			echo "Código: " . $e->getCode() . "<br>";
			echo "Linha: " . $e->getLine() . "<br>";
			echo "Arquivo: " . $e->getFile() . "<br>";
		}return self::$conexao;
	}

}

?>