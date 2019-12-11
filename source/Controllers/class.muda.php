<?php
class Muda {
	protected $idmuda;
	protected $funcionario_idfuncionario;
	protected $quantidade;

	public function __construct($id = false) {
		if ($id) {

			$sql = "SELECT * FROM muda WHERE idmuda = :idmuda";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idmuda', $id, PDO::PARAM_INT);
			$stmt->execute();
			foreach ($stmt as $obj) {
				$this->setIdmuda($obj['idmuda']);
				$this->setFuncionarioIdfuncionario($obj['funcionario_idfuncionario']);
				$this->setQuantidade($obj['quantidade']);
			}
		}
	}
	public function getIdmuda() {
		return $this->idmuda;
	}
	public function setIdmuda($idmuda) {
		$this->idmuda = $idmuda;
	}
	public function getFuncionarioIdfuncionario() {
		return $this->funcionario_idfuncionario;
	}
	public function setFuncionarioIdfuncionario($funcionario_idfuncionario) {
		$this->funcionario_idfuncionario = $funcionario_idfuncionario;
	}
	public function getQuantidade() {
		return $this->quantidade;
	}
	public function setQuantidade($quantidade) {
		$this->quantidade = $quantidade;
	}
	public function adicionar() {
		try {
			$sql = "INSERT INTO muda (funcionario_idfuncionario, quantidade) VALUES (:funcionario_idfuncionario,:quantidade)";
			$conexao = DB::conexao();
			$stmt = $conexao->prepare($sql);
			$stmt->bindParam(':funcionario_idfuncionario', $this->funcionario_idfuncionario);
			$stmt->bindParam(':quantidade', $this->quantidade);
			if ($stmt->execute()) {
				echo '<div class="alert alert-success" role="alert">
				Muda Cadastrada com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao Cadastrar muda!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';				
			 }
			return $conexao->lastInsertId();
		} catch (PDOException $e) {
			echo "Mensagem: " . $e->getMessage() . "<br>";
			echo "Código: " . $e->getCode() . "<br>";
			echo "Linha: " . $e->getLine() . "<br>";
			echo "Arquivo: " . $e->getFile() . "<br>";
		}
	}
	public static function listar() {
		$sql = "SELECT * FROM muda ORDER BY idmuda asc";
		$stmt = DB::conexao()->prepare($sql);
		$stmt->execute();
		$registros = $stmt->fetchAll();

		if ($registros) {
			$itens = array();
			foreach ($registros as $objeto) {
				$muda = new Muda();
				$muda->setIdmuda($objeto['idmuda']);
				$muda->setFuncionarioIdfuncionario($objeto['funcionario_idfuncionario']);
				$muda->setQuantidade($objeto['quantidade']);
				$itens[] = $muda;
			}
			return $itens;
		}
		return false;
	}
	public function excluir() {
		if ($this->idmuda) {
			$sql = "DELETE FROM muda WHERE idmuda = :idmuda";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idmuda', $this->idmuda);
			if ($stmt->execute()) {
				echo '<div class="alert alert-danger" role="alert">
				Muda apagada com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao apagar muda!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';				
			 }
		}
	}
	public function atualizar() {
		if ($this->idmuda) {

			$sql = "UPDATE muda SET funcionario_idfuncionario = :funcionario_idfuncionario, quantidade = :quantidade WHERE idmuda = :idmuda";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idmuda', $this->idmuda);
			$stmt->bindParam(':funcionario_idfuncionario', $this->funcionario_idfuncionario);
			$stmt->bindParam(':quantidade', $this->quantidade);
			if ($stmt->execute()) {
				echo '<div class="alert alert-success" role="alert">
				Muda atualizada com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao atualizar muda!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';				
			 }
		}
	}
}