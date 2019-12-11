<?php

class Botanica {
	protected $idbotanica;
	protected $arvore_idarvore;
	protected $muda_idmuda;
	protected $nome_popular;
	protected $nome_cientifico;
	protected $nativa;
	protected $frutifera;
	protected $exotica;

	public function __construct($id = false) {
		if ($id) {

			$sql = "SELECT * FROM botanica WHERE idbotanica = :idbotanica";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idbotanica', $id, PDO::PARAM_INT);
			$stmt->execute();
			foreach ($stmt as $obj) {
				$this->setIdbotanica($obj['idbotanica']);
				$this->setArvoreIdarvore($obj['arvore_idarvore']);
				$this->setMudaIdmuda($obj['muda_idmuda']);
				$this->setNomePopular($obj['nome_popular']);
				$this->setNomeCientifico($obj['nome_cientifico']);
				$this->setNativa($obj['nativa']);
				$this->setFrutifera($obj['frutifera']);
				$this->setExotica($obj['nativa']);
			}
		}
	}
	public function getIdbotanica() {
		return $this->idbotanica;
	}
	public function setIdbotanica($idbotanica) {
		$this->idbotanica = $idbotanica;
	}
	public function getArvoreIdarvore() {
		return $this->arvore_idarvore;
	}
	public function setArvoreIdarvore($arvore_idarvore) {
		$this->arvore_idarvore = $arvore_idarvore;
	}
	public function getMudaIdmuda() {
		return $this->muda_idmuda;
	}
	public function setMudaIdmuda($muda_idmuda) {
		$this->muda_idmuda = $muda_idmuda;
	}
	public function getNomePopular() {
		return $this->nome_popular;
	}
	public function setNomePopular($nome_popular) {
		$this->nome_popular = $nome_popular;
	}
	public function getNomeCientifico() {
		return $this->nome_cientifico;
	}
	public function setNomeCientifico($nome_cientifico) {
		$this->nome_cientifico = $nome_cientifico;
	}
	public function getNativa() {
		return $this->nativa;
	}
	public function setNativa($nativa) {
		$this->nativa = $nativa;
	}
	public function getFrutifera() {
		return $this->frutifera;
	}
	public function setFrutifera($frutifera) {
		$this->frutifera = $frutifera;
	}
	public function getExotica() {
		return $this->exotica;
	}
	public function setExotica($exotica) {
		$this->exotica = $exotica;
	}
	public function adicionar() {
		try {
			$sql = "INSERT INTO botanica (arvore_idarvore, muda_idmuda, nome_popular,nome_cientifico, nativa, frutifera, exotica) VALUES (:arvore_idarvore, :muda_idmuda, :nome_popular, :nome_cientifico, :nativa, :frutifera, :exotica)";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':arvore_idarvore', $this->arvore_idarvore);
			$stmt->bindParam(':muda_idmuda', $this->muda_idmuda);
			$stmt->bindParam(':nome_popular', $this->nome_popular);
			$stmt->bindParam(':nome_cientifico', $this->nome_cientifico);
			$stmt->bindParam(':nativa', $this->nativa);
			$stmt->bindParam(':frutifera', $this->frutifera);
			$stmt->bindParam(':exotica', $this->exotica);
			$stmt->execute();

		} catch (Exception $e) {
			echo "Mensagem: " . $e->getMessage() . "<br>";
			echo "Código: " . $e->getCode() . "<br>";
			echo "Linha: " . $e->getLine() . "<br>";
			echo "Arquivo: " . $e->getFile() . "<br>";
		}
	}
	public static function listar() {
		$sql = "SELECT * FROM botanica";
		$stmt = DB::conexao()->prepare($sql);
		$stmt->execute();
		$registros = $stmt->fetchAll();

		if ($registros) {
			$itens = array();
			foreach ($registros as $objeto) {
				$botanica = new Botanica();
				$botanica->setIdbotanica($objeto['idbotanica']);
				$botanica->setArvoreIdarvore($objeto['arvore_idarvore']);
				$botanica->setMudaIdmuda($objeto['muda_idmuda']);
				$botanica->setNomePopular($objeto['nome_popular']);
				$botanica->setNomeCientifico($objeto['nome_cientifico']);
				$botanica->setNativa($objeto['nativa']);
				$botanica->setFrutifera($objeto['frutifera']);
				$botanica->setExotica($objeto['nativa']);
				$itens[] = $botanica;
			}
			return $itens;
		}
		return false;
	}
	public function excluir() {
		if ($this->idbotanica) {
			$sql = "DELETE FROM botanica WHERE idbotanica = :idbotanica";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idbotanica', $this->idbotanica);
			$stmt->execute();
		}
	}
	public function atualizar() {
		if ($this->idbotanica) {

			$sql = "UPDATE botanica SET arvore_idarvore = :arvore_idarvore , muda_idmuda = :muda_idmuda , nome_popular = :nome_popular ,nome_cientifico = :nome_cientifico , nativa = :nativa , frutifera = :frutifera , exotica = :exotica WHERE idbotanica = :idbotanica";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idbotanica', $this->idbotanica);
			$stmt->bindParam(':arvore_idarvore', $this->arvore_idarvore);
			$stmt->bindParam(':muda_idmuda', $this->muda_idmuda);
			$stmt->bindParam(':nome_popular', $this->nome_popular);
			$stmt->bindParam(':nome_cientifico', $this->nome_cientifico);
			$stmt->bindParam(':nativa', $this->nativa);
			$stmt->bindParam(':frutifera', $this->frutifera);
			$stmt->bindParam(':exotica', $this->exotica);
			$stmt->execute();

		}

	}
}
