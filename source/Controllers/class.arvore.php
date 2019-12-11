<?php

class Arvore {
	protected $idarvore;
	protected $areaverde_idareaverde;
	protected $funcionario_idfuncionario;
	protected $matriz;
	protected $altura;
	protected $largura;
	protected $data_poda;
	protected $eliminacao;
	protected $fitossanidade;
	protected $observacao;

	public function __construct($id = false) {
		if ($id) {

			$sql = "SELECT * FROM arvore WHERE idarvore = :idarvore";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idarvore', $id, PDO::PARAM_INT);
			$stmt->execute();
			foreach ($stmt as $obj) {
				$this->setIdarvore($obj['idarvore']);
				$this->setAreaverdeIdareaverde($obj['areaverde_idareaverde']);
				$this->setFuncionarioIdfuncionario($obj['funcionario_idfuncionario']);
				$this->setMatriz($obj['matriz']);
				$this->setAltura($obj['altura']);
				$this->setLargura($obj['largura']);
				$this->setDataPoda($obj['data_poda']);
				$this->setEliminacao($obj['eliminacao']);
				$this->setFitossanidade($obj['fitossanidade']);
				$this->setObservacao($obj['observacao']);
			}
		}
	}
	public function getIdarvore() {
		return $this->idarvore;
	}
	public function setIdarvore($idarvore) {
		$this->idarvore = $idarvore;
	}
	public function getAreaverdeIdareaverde() {
		return $this->areaverde_idareaverde;
	}
	public function setAreaverdeIdareaverde($areaverde_idareaverde) {
		$this->areaverde_idareaverde = $areaverde_idareaverde;
	}
	public function getFuncionarioIdfuncionario() {
		return $this->funcionario_idfuncionario;
	}
	public function setFuncionarioIdfuncionario($funcionario_idfuncionario) {
		$this->funcionario_idfuncionario = $funcionario_idfuncionario;
	}
	public function getMatriz() {
		return $this->matriz;
	}
	public function setMatriz($matriz) {
		$this->matriz = $matriz;
	}
	public function getAltura() {
		return $this->altura;
	}
	public function setAltura($altura) {
		$this->altura = $altura;
	}
	public function getLargura() {
		return $this->largura;
	}
	public function setLargura($largura) {
		$this->largura = $largura;
	}
	public function getDataPoda() {
		return $this->data_poda;
	}
	public function setDataPoda($data_poda) {
		$this->data_poda = $data_poda;
	}
	public function getEliminacao() {
		return $this->eliminacao;
	}
	public function setEliminacao($eliminacao) {
		$this->eliminacao = $eliminacao;
	}
	public function getFitossanidade() {
		return $this->fitossanidade;
	}
	public function setFitossanidade($fitossanidade) {
		$this->fitossanidade = $fitossanidade;
	}
	public function getObservacao() {
		return $this->observacao;
	}
	public function setObservacao($observacao) {
		$this->observacao = $observacao;
	}
	 

	public function adicionar() {
		try {
			$sql = "INSERT INTO arvore (areaverde_idareaverde, funcionario_idfuncionario, matriz, altura, largura, data_poda, eliminacao, fitossanidade, observacao) VALUES (:areaverde_idareaverde, :funcionario_idfuncionario, :matriz, :altura, :largura, :data_poda, :eliminacao, :fitossanidade, :observacao)";
			$conexao = DB::conexao();
			$stmt = $conexao->prepare($sql);
			$stmt->bindParam(':areaverde_idareaverde', $this->areaverde_idareaverde);
			$stmt->bindParam(':funcionario_idfuncionario', $this->funcionario_idfuncionario);
			$stmt->bindParam(':matriz', $this->matriz);
			$stmt->bindParam(':altura', $this->altura);
			$stmt->bindParam(':largura', $this->largura);
			$stmt->bindParam(':data_poda', $this->data_poda);
			$stmt->bindParam(':eliminacao', $this->eliminacao);
			$stmt->bindParam(':fitossanidade', $this->fitossanidade);
			$stmt->bindParam(':observacao', $this->observacao);
				if ($stmt->execute()) {
				echo '<div class="alert alert-success" role="alert">
				Árvore Adicionada com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao Cadastrar Árvore
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			return $conexao->lastInsertId();

		} catch (Exception $e) {
			echo "Mensagem: " . $e->getMessage() . "<br>";
			echo "Código: " . $e->getCode() . "<br>";
			echo "Linha: " . $e->getLine() . "<br>";
			echo "Arquivo: " . $e->getFile() . "<br>";
		}
	}
	public static function listar() {
		$sql = "SELECT * FROM arvore ORDER BY idarvore asc";
		$stmt = DB::conexao()->prepare($sql);
		$stmt->execute();
		$registros = $stmt->fetchAll();

		if ($registros) {
			$itens = array();
			foreach ($registros as $objeto) {
				$arvore = new Arvore();
				$arvore->setIdarvore($objeto['idarvore']);
				$arvore->setAreaverdeIdareaverde($objeto['areaverde_idareaverde']);
				$arvore->setFuncionarioIdfuncionario($objeto['funcionario_idfuncionario']);
				$arvore->setMatriz($objeto['matriz']);
				$arvore->setAltura($objeto['altura']);
				$arvore->setLargura($objeto['largura']);
				$arvore->setDataPoda($objeto['data_poda']);
				$arvore->setEliminacao($objeto['eliminacao']);
				$arvore->setFitossanidade($objeto['fitossanidade']);
				$arvore->setObservacao($objeto['observacao']);
				$itens[] = $arvore;
			}
			return $itens;
		}
		return false;
	}
	public function excluir() {
		if ($this->idarvore) {
			$sql = "DELETE FROM arvore WHERE idarvore = :idarvore";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idarvore', $this->idarvore);
				if ($stmt->execute()) {
				echo '<div class="alert alert-danger" role="alert">
				Árvore Apagada com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao Cadastrar Árvore
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
		}
	}
	public function atualizar() {
		if ($this->idarvore) {

			$sql = "UPDATE arvore SET areaverde_idareaverde = :areaverde_idareaverde , funcionario_idfuncionario = :funcionario_idfuncionario , matriz = :matriz , altura = :altura, largura = :largura , data_poda = :data_poda , eliminacao = :eliminacao , fitossanidade = :fitossanidade , observacao = :observacao WHERE idarvore = :idarvore";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idarvore', $this->idarvore);
			$stmt->bindParam(':areaverde_idareaverde', $this->areaverde_idareaverde);
			$stmt->bindParam(':funcionario_idfuncionario', $this->funcionario_idfuncionario);
			$stmt->bindParam(':matriz', $this->matriz);
			$stmt->bindParam(':altura', $this->altura);
			$stmt->bindParam(':largura', $this->largura);
			$stmt->bindParam(':data_poda', $this->data_poda);
			$stmt->bindParam(':eliminacao', $this->eliminacao);
			$stmt->bindParam(':fitossanidade', $this->fitossanidade);
			$stmt->bindParam(':observacao', $this->observacao);
				if ($stmt->execute()) {
				echo '<div class="alert alert-danger" role="alert">
				Árvore Apagada com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao Cadastrar Árvore
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}

		}

	}
}
