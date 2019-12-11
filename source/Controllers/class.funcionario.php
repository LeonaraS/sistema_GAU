<?php  

class Funcionario{
	protected $idfuncionario;
	protected $cargo_idcargo;
	protected $nome;
	protected $cpf;
	protected $email;
	protected $senha;
	protected $data_nascto;
    
    public function __construct($id=false){
      if ($id){
        
          $sql = "SELECT * FROM funcionario WHERE idfuncionario = :idfuncionario";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idfuncionario',$id,PDO::PARAM_INT);  
          $stmt->execute();
          foreach ($stmt as $obj) {
               $this->setIdfuncionario($obj['idfuncionario']);
               $this->setCargoIdcargo($obj['cargo_idcargo']);             
               $this->setNome($obj['nome']);             
               $this->setCpf($obj['cpf']);             
               $this->setEmail($obj['email']);             
               $this->setSenha($obj['senha']);             
               $this->setDataNascto($obj['data_nascto']);             
          } 
      }        
    }
    public function getIdfuncionario(){
        return $this->idfuncionario;
    }   
    public function setIdfuncionario($idfuncionario){
        $this->idfuncionario = $idfuncionario;     
    }   
    public function getCargoIdcargo(){
        return $this->cargo_idcargo;
    }
    public function setCargoIdcargo($cargo_idcargo){
        $this->cargo_idcargo = $cargo_idcargo;     
    } 
    public function getNome(){
        return $this->nome;
    }   
    public function setNome($nome){
        $this->nome = $nome;   
    }
    public function getCpf(){
        return $this->cpf;
    }   
    public function setCpf($cpf){
        $this->cpf = $cpf;        
    }   
    public function getEmail(){
        return $this->email;
    } 
    public function setEmail($email){
        $this->email = $email;     
    }   
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = $senha;       
    }    
    public function getDataNascto(){
        return $this->data_nascto;
    }    
    public function setDataNascto($data_nascto){
        $this->data_nascto = $data_nascto;
    }
    public function adicionar() {
        try {
            $sql = "INSERT INTO funcionario (cargo_idcargo, nome, cpf, email, senha, data_nascto) VALUES (:cargo_idcargo,:nome, :cpf, :email, md5(:senha), :data_nascto)";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->bindParam(':cargo_idcargo', $this->cargo_idcargo);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':cpf', $this->cpf);            
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':senha', $this->senha);
            $stmt->bindParam(':data_nascto', $this->data_nascto);
            if ($stmt->execute()) {
				echo '<div class="alert alert-success" role="alert">
				Funcionário Cadastrado com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao Cadastrar funcionário
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';				
			}
        } catch (PDOException $e) {
            echo "Mensagem: " . $e->getMessage() . "<br>";
            echo "Código: " . $e->getCode() . "<br>";
            echo "Linha: " . $e->getLine() . "<br>";
            echo "Arquivo: " . $e->getFile() . "<br>";
        }
    }
    public static function listar(){
        $sql = "SELECT * FROM funcionario ORDER BY idfuncionario asc";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll();           

        if ($registros) {
            $itens = array();
            foreach ($registros as $objeto) {
               $funcionario = new Funcionario();
               $funcionario->setIdfuncionario($objeto['idfuncionario']);
               $funcionario->setCargoIdcargo($objeto['cargo_idcargo']);             
               $funcionario->setNome($objeto['nome']);             
               $funcionario->setCpf($objeto['cpf']);             
               $funcionario->setEmail($objeto['email']);             
               $funcionario->setSenha($objeto['senha']);             
               $funcionario->setDataNascto($objeto['data_nascto']);                  
               $itens[] = $funcionario;               
            }                      
            return $itens;           
        }     
        return false;
    }
    public function excluir(){
      if($this->idfuncionario){
          $sql="DELETE FROM funcionario WHERE idfuncionario = :idfuncionario";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idfuncionario',$this->idfuncionario);
          if ($stmt->execute()) {
            echo '<div class="alert alert-danger" role="alert">
            Funcionário apagado com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">
            Falha ao apagar funcionário
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';				
        }
      }
    }
    public function atualizar(){
      if ($this->idfuncionario) {

          $sql = "UPDATE funcionario SET cargo_idcargo = :cargo_idcargo, nome = :nome, cpf = :cpf, email = :email, senha = md5(:senha), data_nascto = :data_nascto  WHERE idfuncionario = :idfuncionario";          
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idfuncionario',$this->idfuncionario);
          $stmt->bindParam(':cargo_idcargo', $this->cargo_idcargo);
          $stmt->bindParam(':nome', $this->nome);
          $stmt->bindParam(':cpf', $this->cpf);            
          $stmt->bindParam(':email', $this->email);
          $stmt->bindParam(':senha', $this->senha);
          $stmt->bindParam(':data_nascto', $this->data_nascto);    
          if ($stmt->execute()) {
            echo '<div class="alert alert-success" role="alert">
            Funcionário Atualizado com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">
            Falha ao Atualizar funcionário
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';				
        }    
      }       
    }

    public function entrarFuncionario() {
        $sql = "SELECT * FROM funcionario WHERE email = :email and senha = md5(:senha)";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $this->senha, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->rowCount();
        $r_conex = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $r_conex;
    }

}
