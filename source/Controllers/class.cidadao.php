<?php
          
	class Cidadao {
	# Atributos
	protected $idcidadao;
	protected $nome;
	protected $cpf_cnpj;
	protected $rg;
	protected $fone_fixo;
	protected $celular;
	protected $email;
	protected $senha;

	public function __construct($id = false) {
		if ($id) {

			$sql = "SELECT * FROM cidadao WHERE idcidadao = :idcidadao";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idcidadao', $id, PDO::PARAM_INT);
			$stmt->execute();
			foreach ($stmt as $obj) {
				$this->setIdCidadao($obj['idcidadao']);
				$this->setNome($obj['nome']);
				$this->setCpfCnpj($obj['cpf_cnpj']);
				$this->setRg($obj['rg']);
				$this->setFoneFixo($obj['fone_fixo']);
				$this->setCelular($obj['celular']);
				$this->setEmail($obj['email']);
				$this->setSenha($obj['senha']);
			}
		}
	}
	# Gets e Sets
	public function getIdcidadao() {
		return $this->idcidadao;
	}
	public function setIdcidadao($idcidadao) {
		$this->idcidadao = $idcidadao;
		return $this;
	}
	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
		return $this;
	}
	public function getCpfCnpj() {
		return $this->cpf_cnpj;
	}
	public function setCpfCnpj($cpf_cnpj) {
		$this->cpf_cnpj = $cpf_cnpj;
		return $this;
	}
	public function getRg() {
		return $this->rg;
	}
	public function setRg($rg) {
		$this->rg = $rg;
		return $this;
	}
	public function getFoneFixo() {
		return $this->fone_fixo;
	}
	public function setFoneFixo($fone_fixo) {
		$this->fone_fixo = $fone_fixo;
		return $this;
	}
	public function getCelular() {
		return $this->celular;
	}
	public function setCelular($celular) {
		$this->celular = $celular;
		return $this;
	}
	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}
	public function getSenha() {
		return $this->senha;
	}
	public function setSenha($senha) {
		$this->senha = $senha;
		return $this;
	}

	

	public function adicionar() {
		try {
			$sql = "INSERT INTO cidadao (nome, cpf_cnpj, rg, fone_fixo, celular, email, senha) VALUES (:nome, :cpf_cnpj, :rg, :fone_fixo, :celular, :email, md5(:senha))";
			$conexao = DB::conexao();
			$stmt = $conexao->prepare($sql);
			$stmt->bindParam(':nome', $this->nome);
			$stmt->bindParam(':cpf_cnpj', $this->cpf_cnpj);
			$stmt->bindParam(':rg', $this->rg);
			$stmt->bindParam(':fone_fixo', $this->fone_fixo);
			$stmt->bindParam(':celular', $this->celular);
			$stmt->bindParam(':email', $this->email);
			$stmt->bindParam(':senha', $this->senha);
			if($stmt->execute())
			{
				echo '<div class="alert alert-success">Cliente cadastrado com sucesso</div>';
			}
			else
			{
				echo '<div class="alert alert-success">Falha ao cadastrar cliente </div>';
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
		$sql = "SELECT * FROM cidadao ORDER BY idcidadao asc";
		$stmt = DB::conexao()->prepare($sql);
		$stmt->execute();
		$registros = $stmt->fetchAll();

		if ($registros) {
			$itens = array();
			foreach ($registros as $objeto) {
				$cidadao = new Cidadao();
				$cidadao->setIdCidadao($objeto['idcidadao']);
				$cidadao->setNome($objeto['nome']);
				$cidadao->setCpfCnpj($objeto['cpf_cnpj']);
				$cidadao->setRg($objeto['rg']);
				$cidadao->setFoneFixo($objeto['fone_fixo']);
				$cidadao->setCelular($objeto['celular']);
				$cidadao->setEmail($objeto['email']);
				$cidadao->setSenha($objeto['senha']);
				$itens[] = $cidadao;
			}
			return $itens;
		}
		return false;
	}
	public function excluir() {
		if ($this->idcidadao) {
			$sql = "DELETE FROM cidadao WHERE idcidadao = :idcidadao";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idcidadao', $this->idcidadao);
			if ($stmt->execute()) {
				echo '<div class="alert alert-danger" role="alert">
				Cidadão Apagado com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao Apagar cidadão
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';				
			}
		}
	}
	public function atualizar() {
		if ($this->idcidadao) {

			$sql = "UPDATE cidadao SET nome = :nome , cpf_cnpj = :cpf_cnpj , rg = :rg, fone_fixo = :fone_fixo, celular =:celular , email = :email , senha = md5(:senha) WHERE idcidadao = :idcidadao";
			$stmt = DB::conexao()->prepare($sql);
			$stmt->bindParam(':idcidadao', $this->idcidadao);
			$stmt->bindParam(':nome', $this->nome);
			$stmt->bindParam(':cpf_cnpj', $this->cpf_cnpj);
			$stmt->bindParam(':rg', $this->rg);
			$stmt->bindParam(':fone_fixo', $this->fone_fixo);
			$stmt->bindParam(':celular', $this->celular);
			$stmt->bindParam(':email', $this->email);
			$stmt->bindParam(':senha', $this->senha);
			$stmt->execute();
		}
	}

	public  function entrarCidadao()
	{
		$sql = "SELECT * FROM cidadao WHERE  email = :email and senha = md5(:senha) ";
		$stmt = DB::conexao()->prepare($sql);
		$stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
		$stmt->bindParam(":senha",$this->senha, PDO::PARAM_STR);
		$stmt->execute();
		$total = $stmt->rowCount();
		$r_con = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $r_con;
	}


}
