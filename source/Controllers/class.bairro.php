<?php 

class Bairro{
	protected $idbairro;
	protected $nome;
	protected $populacao;
	protected $zona;

    public function __construct($id=false){
      if ($id) {
        
          $sql = "SELECT * FROM bairro WHERE idbairro = :idbairro";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idbairro',$id,PDO::PARAM_INT);  
          $stmt->execute();
          foreach ($stmt as $obj) {
               $this->setIdbairro($obj['idbairro']);
               $this->setNome($obj['nome']);                             
               $this->setPopulacao($obj['populacao']);                             
               $this->setZona($obj['zona']);                             
            } 
        }        
    }
    public function getIdbairro(){
        return $this->idbairro;
    }   
    public function setIdbairro($idbairro){
        $this->idbairro = $idbairro;       
    }
    public function getNome(){
        return $this->nome;
    }    
    public function setNome($nome){
        $this->nome = $nome;       
    }    
    public function getPopulacao(){
        return $this->populacao;
    }    
    public function setPopulacao($populacao){
        $this->populacao = $populacao;        
    }   
    public function getZona(){
        return $this->zona;
    }    
    public function setZona($zona){
        $this->zona = $zona;     
    }
    public function adicionar(){
        try {
            $sql = "INSERT INTO bairro (nome, populacao, zona) VALUES (:nome, :populacao, :zona)";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':populacao', $this->populacao);
            $stmt->bindParam(':zona', $this->zona);            
            if ($stmt->execute()) {
				echo '<div class="alert alert-success" role="alert">
				Bairro Cadastrado com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao Cadastrar Bairro
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
        $sql = "SELECT * FROM bairro ORDER BY idbairro asc";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll();           

        if ($registros) {
            $itens = array();
            foreach ($registros as $objeto) {
                $bairro = new Bairro();
                $bairro->setIdBairro($objeto['idbairro']);
                $bairro->setNome($objeto['nome']);                             
                $bairro->setPopulacao($objeto['populacao']);                             
                $bairro->setZona($objeto['zona']);                   
                $itens[] = $bairro;               
            }                      
            return $itens;           
        }     
        return false;
    }
    public function excluir(){
      if($this->idbairro){
          $sql="DELETE FROM bairro WHERE idbairro = :idbairro";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idbairro',$this->idbairro);
          if ($stmt->execute()) {
				echo '<div class="alert alert-danger" role="alert">
				Bairro apagado com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao Cadastrar Bairro
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';				
			}
      }
    }
    public function atualizar(){
      if ($this->idbairro) {

          $sql = "UPDATE bairro SET nome = :nome , populacao = :populacao , zona = :zona WHERE idbairro = :idbairro";          
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idbairro',$this->idbairro);
          $stmt->bindParam(':nome', $this->nome);
          $stmt->bindParam(':populacao', $this->populacao);
          $stmt->bindParam(':zona', $this->zona);     
          if ($stmt->execute()) {
				echo '<div class="alert alert-success" role="alert">
				Bairro Atualizado com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao Cadastrar Bairro
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';				
			}
        
      }
       
    }
}