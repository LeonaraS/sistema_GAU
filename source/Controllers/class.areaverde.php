<?php

class AreaVerde {
	protected $idareaverde;
	protected $tipo_areaverde_idtipo_areaverde;
	protected $funcionario_idfuncionario;
	protected $area;

	public function __construct($id = false) {
		if ($id) {

			$sql = "SELECT * FROM areaverde WHERE idareaverde = :idareaverde";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idareaverde', $id, PDO::PARAM_INT);
			$stmt->execute();
			foreach ($stmt as $obj) {
				$this->setIdareaverde($obj['idareaverde']);
				$this->setTipoAreaverdeIdtipoAreaverde($obj['tipo_areaverde_idtipo_areaverde']);
				$this->setFuncionarioIdfuncionario($obj['funcionario_idfuncionario']);
				$this->setArea($obj['area']);
			}
		}
	}
	public function getIdareaverde() {
		return $this->idareaverde;
	}
	public function setIdareaverde($idareaverde) {
		$this->idareaverde = $idareaverde;
	}
	public function getTipoAreaverdeIdtipoAreaverde() {
		return $this->tipo_areaverde_idtipo_areaverde;
	}
	public function setTipoAreaverdeIdtipoAreaverde($tipo_areaverde_idtipo_areaverde) {
		$this->tipo_areaverde_idtipo_areaverde = $tipo_areaverde_idtipo_areaverde;
	}
	public function getFuncionarioIdfuncionario() {
		return $this->funcionario_idfuncionario;
	}
	public function setFuncionarioIdfuncionario($funcionario_idfuncionario) {
		$this->funcionario_idfuncionario = $funcionario_idfuncionario;
	}
	public function getArea() {
		return $this->area;
	}
	public function setArea($area) {
		$this->area = $area;
	}
	public function pegaTipo(){
      return new TipoAreaverde($this->tipo_areaverde_idtipo_areaverde);
    }     
	public function adicionar() {
		try {
			$sql = "INSERT INTO areaverde (tipo_areaverde_idtipo_areaverde, funcionario_idfuncionario, area) VALUES (:tipo_areaverde_idtipo_areaverde, :funcionario_idfuncionario, :area)";
			$conexao = DB::conexao();
			$stmt = $conexao->prepare($sql);
			$stmt->bindParam(':tipo_areaverde_idtipo_areaverde', $this->tipo_areaverde_idtipo_areaverde);
			$stmt->bindParam(':funcionario_idfuncionario', $this->funcionario_idfuncionario);
			$stmt->bindParam(':area', $this->area);
			if ($stmt->execute()) {
				echo '<div class="alert alert-success" role="alert">
				Área verde Cadastrada com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao Cadastrar área verde
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
		$sql = "SELECT * FROM areaverde ORDER BY idareaverde asc";
		$stmt = DB::conexao()->prepare($sql);
		$stmt->execute();
		$registros = $stmt->fetchAll();

		if ($registros) {
			$itens = array();
			foreach ($registros as $objeto) {
				$areaverde = new Areaverde();
				$areaverde->setIdareaverde($objeto['idareaverde']);
				$areaverde->setTipoAreaverdeIdtipoAreaverde($objeto['tipo_areaverde_idtipo_areaverde']);
				$areaverde->setFuncionarioIdfuncionario($objeto['funcionario_idfuncionario']);
				$areaverde->setArea($objeto['area']);
				$itens[] = $areaverde;
			}
			return $itens;
		}
		return false;
	}
	public function excluir() {
		if ($this->idareaverde) {
			$sql = "DELETE FROM areaverde WHERE idareaverde = :idareaverde";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idareaverde', $this->idareaverde);
			if ($stmt->execute()) {
				echo '<div class="alert alert-danger" role="alert">
				Área verde Apagada com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao Cadastrar área verde
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
		}
	}
	public function atualizar() {
		if ($this->idareaverde) {

			$sql = "UPDATE areaverde SET tipo_areaverde_idtipo_areaverde = :tipo_areaverde_idtipo_areaverde, funcionario_idfuncionario = :funcionario_idfuncionario, area = :area WHERE idareaverde = :idareaverde";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idareaverde', $this->idareaverde);
			$stmt->bindParam(':tipo_areaverde_idtipo_areaverde', $this->tipo_areaverde_idtipo_areaverde);
			$stmt->bindParam(':funcionario_idfuncionario', $this->funcionario_idfuncionario);
			$stmt->bindParam(':area', $this->area);
			$stmt->execute();
		}
	}
}