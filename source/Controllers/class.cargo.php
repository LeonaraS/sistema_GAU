<?php  

class Cargo{
	protected $idcargo;
	protected $nome;
    
    public function __construct($id=false){
      if ($id) {
        
          $sql = "SELECT * FROM cargo WHERE idcargo = :idcargo";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idcargo',$id,PDO::PARAM_INT);  
          $stmt->execute();
          foreach ($stmt as $obj) {
               $this->setIdCargo($obj['idcargo']);
               $this->setNome($obj['nome']);             
            } 
        }        
    }
    public function getIdcargo(){
        return $this->idcargo;
    }
    public function setIdcargo($idcargo){
        $this->idcargo = $idcargo;
    }
    public function getNome(){
        return $this->nome;
    }   
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function adicionar(){
        try {
            $sql = "INSERT INTO cargo (nome) VALUES (:nome)";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->bindParam(':nome', $this->nome); 
            if ($stmt->execute()) {
				echo '<div class="alert alert-success" role="alert">
				Cargo Cadastrado com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao Cadastrar Cargo
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';				
			}

        } catch (Exception $e) {
            echo "Mensagem: " . $e->getMessage() . "<br>";
            echo "Código: " . $e->getCode() . "<br>";
            echo "Linha: " . $e->getLine() . "<br>";
            echo "Arquivo: " . $e->getFile() . "<br>";
        }
    }
    public static function listar(){
        $sql = "SELECT * FROM cargo ORDER BY idcargo asc";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll();           

        if ($registros) {
            $itens = array();
            foreach ($registros as $objeto) {
                $cargo = new Cargo();
                $cargo->setIdCargo($objeto['idcargo']);
                $cargo->setNome($objeto['nome']);                 
                $itens[] = $cargo;               
            }                      
            return $itens;           
        }     
        return false;
    }
    public function excluir(){
      if($this->idcargo){
          $sql="DELETE FROM cargo WHERE idcargo = :idcargo";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idcargo',$this->idcargo);
          if ($stmt->execute()) {
				echo '<div class="alert alert-danger" role="alert">
				Cargo Apagado com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao Apagar Cargo
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';				
			}
      }
    }
    public function atualizar(){
      if ($this->idcargo) {

          $sql = "UPDATE cargo SET nome = :nome WHERE idcargo = :idcargo";          
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idcargo',$this->idcargo);
          $stmt->bindParam(':nome', $this->nome);   
          if ($stmt->execute()) {
				echo '<div class="alert alert-success" role="alert">
				Cargo Atualizado com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao Atualizar Cargo
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';				
			}        
      }       
    }
}