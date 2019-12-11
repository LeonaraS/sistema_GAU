<?php
class Requerimento {
	# Atributos
	protected $idrequerimento;
	protected $funcionario_idfuncionario;
	protected $cidadao_idcidadao;
	protected $copia_rg;
	protected $copia_cpf;
	protected $comp_residencia;
	protected $autorizacao;
	protected $data_reqto;

	public function __construct($id = false) {
		if ($id) {

			$sql = "SELECT * FROM requerimento WHERE idrequerimento = :idrequerimento";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idrequerimento', $id, PDO::PARAM_INT);
			$stmt->execute();
			foreach ($stmt as $obj) {
				$this->setIdrequerimento($obj['idrequerimento']);
				$this->setFuncionarioIdfuncionario($obj['funcionario_idfuncionario']);
				$this->setCidadaoIdcidadao($obj['cidadao_idcidadao']);
				$this->setCopiaRg($obj['copia_rg']);
				$this->setCopiaCpf($obj['copia_cpf']);
				$this->setCompResidencia($obj['comp_residencia']);
				$this->setAutorizacao($obj['autorizacao']);
				$this->setDataReqto($obj['data_reqto']);
			}
		}
	}
	# GETS e SETs
	public function getIdrequerimento() {
		return $this->idrequerimento;
	}
	public function setIdrequerimento($idrequerimento) {
		$this->idrequerimento = $idrequerimento;
		return $this;
	}
	public function getFuncionarioIdfuncionario() {
		return $this->funcionario_idfuncionario;
	}
	public function setFuncionarioIdfuncionario($funcionario_idfuncionario) {
		$this->funcionario_idfuncionario = $funcionario_idfuncionario;
		return $this;
	}
	public function getCidadaoIdcidadao() {
		return $this->cidadao_idcidadao;
	}
	public function setCidadaoIdcidadao($cidadao_idcidadao) {
		$this->cidadao_idcidadao = $cidadao_idcidadao;
		return $this;
	}
	public function getCopiaRg() {
		return $this->copia_rg;
	}
	public function setCopiaRg($copia_rg) {
		$this->copia_rg = $copia_rg;
		return $this;
	}
	public function getCopiaCpf() {
		return $this->copia_cpf;
	}
	public function setCopiaCpf($copia_cpf) {
		$this->copia_cpf = $copia_cpf;
		return $this;
	}
	public function getCompResidencia() {
		return $this->comp_residencia;
	}
	public function setCompResidencia($comp_residencia) {
		$this->comp_residencia = $comp_residencia;
		return $this;
	}
	public function getAutorizacao() {
		return $this->autorizacao;
	}
	public function setAutorizacao($autorizacao) {
		$this->autorizacao = $autorizacao;
		return $this;
	}
	public function getDataReqto() {
		return $this->data_reqto;
	}
	public function setDataReqto($data_reqto) {
		$this->data_reqto = $data_reqto;
		return $this;
	}
	public function adicionar() {
		try {
			$sql = "INSERT INTO requerimento (funcionario_idfuncionario, cidadao_idcidadao, copia_rg, copia_cpf, comp_residencia, autorizacao, data_reqto) VALUES (:funcionario_idfuncionario, :cidadao_idcidadao, :copia_rg, :copia_cpf, :comp_residencia, :autorizacao, :data_reqto)";
			$conexao = DB::conexao();
			$stmt = $conexao->prepare($sql);
			$stmt->bindParam(':funcionario_idfuncionario', $this->funcionario_idfuncionario);
			$stmt->bindParam(':cidadao_idcidadao', $this->cidadao_idcidadao);
			$stmt->bindParam(':copia_rg', $this->copia_rg);
			$stmt->bindParam(':copia_cpf', $this->copia_cpf);
			$stmt->bindParam(':comp_residencia', $this->comp_residencia);
			$stmt->bindParam(':autorizacao', $this->autorizacao);
			$stmt->bindParam(':data_reqto', $this->data_reqto);
			if ($stmt->execute()) {
				echo '<div class="alert alert-success" role="alert">
				Requerimento cadastrado com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao cadastrar requerimento!
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
		$sql = "SELECT * FROM requerimento ORDER BY idrequerimento asc";
		$stmt = DB::conexao()->prepare($sql);
		$stmt->execute();
		$registros = $stmt->fetchAll();

		if ($registros) {

			$itens = array();
			foreach ($registros as $objeto) {
				$requerimento = new Requerimento();
				$requerimento->setIdrequerimento($objeto['idrequerimento']);
				$requerimento->setFuncionarioIdfuncionario($objeto['funcionario_idfuncionario']);
				$requerimento->setCidadaoIdcidadao($objeto['cidadao_idcidadao']);
				$requerimento->setCopiaRg($objeto['copia_rg']);
				$requerimento->setCopiaCpf($objeto['copia_cpf']);
				$requerimento->setCompResidencia($objeto['comp_residencia']);
				$requerimento->setAutorizacao($objeto['autorizacao']);
				$requerimento->setDataReqto($objeto['data_reqto']);
				$itens[] = $requerimento;
			}
			return $itens;
		}
		return false;
	}
	public function excluir() {
		if ($this->idrequerimento) {
			$sql = "DELETE FROM requerimento WHERE idrequerimento = :idrequerimento";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idrequerimento', $this->idrequerimento);
			if ($stmt->execute()) {
				echo '<div class="alert alert-danger" role="alert">
				Requerimento apagado com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao apagar requerimento!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';				
			 }
		}
	}
	public function atualizar() {
		if ($this->idrequerimento) {

			$sql = "UPDATE requerimento SET funcionario_idfuncionario = :funcionario_idfuncionario, cidadao_idcidadao = :cidadao_idcidadao, copia_rg = :copia_rg, copia_cpf = :copia_cpf, comp_residencia = :comp_residencia, autorizacao = :autorizacao, data_reqto = :data_reqto WHERE idrequerimento = :idrequerimento";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idrequerimento', $this->idrequerimento);
			$stmt->bindParam(':funcionario_idfuncionario', $this->funcionario_idfuncionario);
			$stmt->bindParam(':cidadao_idcidadao', $this->cidadao_idcidadao);
			$stmt->bindParam(':copia_rg', $this->copia_rg);
			$stmt->bindParam(':copia_cpf', $this->copia_cpf);
			$stmt->bindParam(':comp_residencia', $this->comp_residencia);
			$stmt->bindParam(':autorizacao', $this->autorizacao);
			$stmt->bindParam(':data_reqto', $this->data_reqto);
			if ($stmt->execute()) {
				echo '<div class="alert alert-success" role="alert">
				Requerimento atualizado com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao atualizar requerimento!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';				
			 }
		}
	}

}
