<?php
class Infracao {
	protected $idinfracao;
	protected $funcionario_idfuncionario;
	protected $nome_razao;
	protected $cpf_cnpj;
	protected $fone;
	protected $email;
	protected $data_infracao;
	protected $observacao;

	public function __construct($id = false) {
		if ($id) {

			$sql = "SELECT * FROM infracao WHERE idinfracao = :idinfracao";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idinfracao', $id, PDO::PARAM_INT);
			$stmt->execute();
			foreach ($stmt as $obj) {
				$this->setIdinfracao($obj['idinfracao']);
				$this->setFuncionarioIdfuncionario($obj['funcionario_idfuncionario']);
				$this->setNomeRazao($obj['nome_razao']);
				$this->setCpfCnpj($obj['cpf_cnpj']);
				$this->setFone($obj['fone']);
				$this->setEmail($obj['email']);
				$this->setDataInfracao($obj['data_infracao']);
				$this->setObservacao($obj['observacao']);
			}
		}
	}
	public function getIdinfracao() {
		return $this->idinfracao;
	}
	public function setIdinfracao($idinfracao) {
		$this->idinfracao = $idinfracao;
	}
	public function getFuncionarioIdfuncionario() {
		return $this->funcionario_idfuncionario;
	}
	public function setFuncionarioIdfuncionario($funcionario_idfuncionario) {
		$this->funcionario_idfuncionario = $funcionario_idfuncionario;
	}
	public function getNomeRazao() {
		return $this->nome_razao;
	}
	public function setNomeRazao($nome_razao) {
		$this->nome_razao = $nome_razao;
	}
	public function getCpfCnpj() {
		return $this->cpf_cnpj;
	}
	public function setCpfCnpj($cpf_cnpj) {
		$this->cpf_cnpj = $cpf_cnpj;
	}
	public function getFone() {
		return $this->fone;
	}
	public function setFone($fone) {
		$this->fone = $fone;
	}
	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email) {
		$this->email = $email;
	}
	public function getDataInfracao() {
		return $this->data_infracao;
	}
	public function setDataInfracao($data_infracao) {
		$this->data_infracao = $data_infracao;
	}
	public function getObservacao() {
		return $this->observacao;
	}
	public function setObservacao($observacao) {
		$this->observacao = $observacao;
	}
	public function adicionar() {
		try {
			$sql = "INSERT INTO infracao (funcionario_idfuncionario, nome_razao, cpf_cnpj, fone, email, data_infracao, observacao) VALUES (:funcionario_idfuncionario,:nome_razao, :cpf_cnpj, :fone, :email, :data_infracao, :observacao)";
			$conexao = DB::conexao();
			$stmt = $conexao->prepare($sql);
			$stmt->bindParam(':funcionario_idfuncionario', $this->funcionario_idfuncionario);
			$stmt->bindParam(':nome_razao', $this->nome_razao);
			$stmt->bindParam(':cpf_cnpj', $this->cpf_cnpj);
			$stmt->bindParam(':fone', $this->fone);
			$stmt->bindParam(':email', $this->email);
			$stmt->bindParam(':data_infracao', $this->data_infracao);
			$stmt->bindParam(':observacao', $this->observacao);
			if ($stmt->execute()) {
				echo '<div class="alert alert-success" role="alert">
				Infração Cadastrada com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao Cadastrar infração
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
		$sql = "SELECT * FROM infracao ORDER BY idinfracao asc";
		$stmt = DB::conexao()->prepare($sql);
		$stmt->execute();
		$registros = $stmt->fetchAll();

		if ($registros) {
			$itens = array();
			foreach ($registros as $objeto) {
				$infracao = new Infracao();
				$infracao->setIdinfracao($objeto['idinfracao']);
				$infracao->setFuncionarioIdfuncionario($objeto['funcionario_idfuncionario']);
				$infracao->setNomeRazao($objeto['nome_razao']);
				$infracao->setCpfCnpj($objeto['cpf_cnpj']);
				$infracao->setFone($objeto['fone']);
				$infracao->setEmail($objeto['email']);
				$infracao->setDataInfracao($objeto['data_infracao']);
				$infracao->setObservacao($objeto['observacao']);
				$itens[] = $infracao;
			}
			return $itens;
		}
		return false;
	}
	public function excluir() {
		if ($this->idinfracao) {
			$sql = "DELETE FROM infracao WHERE idinfracao = :idinfracao";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idinfracao', $this->idinfracao);
			if ($stmt->execute()) {
				echo '<div class="alert alert-danger" role="alert">
				Infração apagada com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao Cadastrar infração
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';				
			}
		}
	}
	public function atualizar() {
		if ($this->idinfracao) {

			$sql = "UPDATE infracao SET funcionario_idfuncionario = :funcionario_idfuncionario, nome_razao = :nome_razao, cpf_cnpj = :cpf_cnpj, fone = :fone, email = :email , data_infracao = :data_infracao, observacao = :observacao WHERE idinfracao = :idinfracao";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idinfracao', $this->idinfracao);
			$stmt->bindParam(':funcionario_idfuncionario', $this->funcionario_idfuncionario);
			$stmt->bindParam(':nome_razao', $this->nome_razao);
			$stmt->bindParam(':cpf_cnpj', $this->cpf_cnpj);
			$stmt->bindParam(':fone', $this->fone);
			$stmt->bindParam(':email', $this->email);
			$stmt->bindParam(':data_infracao', $this->data_infracao);
			$stmt->bindParam(':observacao', $this->observacao);
			if ($stmt->execute()) {
				echo '<div class="alert alert-success" role="alert">
				Infração Atualizada com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao atualizar infração
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';				
			}
		}
	}
}
