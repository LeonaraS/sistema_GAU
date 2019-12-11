<?php  

class TipoAreaverde{
	protected $idtipo_areaverde;
	protected $nome;
    
    public function __construct($id=false){
      if ($id) {
        
          $sql = "SELECT * FROM tipo_areaverde WHERE idtipo_areaverde = :idtipo_areaverde";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idtipo_areaverde',$id,PDO::PARAM_INT);  
          $stmt->execute();
          foreach ($stmt as $obj) {
               $this->setIdtipoAreaverde($obj['idtipo_areaverde']);
               $this->setNome($obj['nome']);       
            } 
        }        
    }
    public function getIdtipoAreaverde(){
        return $this->idtipo_areaverde;
    }
    public function setIdtipoAreaverde($idtipo_areaverde){
        $this->idtipo_areaverde = $idtipo_areaverde;        
    }   
    public function getNome(){
        return $this->nome;
    }    
    public function setNome($nome){
        $this->nome = $nome;        
    }
    public function adicionar(){
        try {
            $sql = "INSERT INTO tipo_areaverde (nome) VALUES (:nome)";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->bindParam(':nome', $this->nome); 
            if ($stmt->execute()) {
                echo '<div class="alert alert-success" role="alert">
                Tipo de área verde cadastrado com sucesso!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            }
            else
            {
                echo '<div class="alert alert-danger" role="alert">
                Falha ao cadastrar tipo de área verde!
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
        $sql = "SELECT * FROM tipo_areaverde ORDER BY idtipo_areaverde asc";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll();           

        if ($registros) {
            $itens = array();
            foreach ($registros as $objeto) {
                $tipo_areaverde = new TipoAreaverde();
                $tipo_areaverde->setIdtipoAreaverde($objeto['idtipo_areaverde']);
                $tipo_areaverde->setNome($objeto['nome']);                    
                $itens[] = $tipo_areaverde;               
            }                      
            return $itens;           
        }     
        return false;
    }
    public function excluir(){
      if($this->idtipo_areaverde){
          $sql="DELETE FROM tipo_areaverde WHERE idtipo_areaverde = :idtipo_areaverde";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idtipo_areaverde',$this->idtipo_areaverde);
          if ($stmt->execute()) {
            echo '<div class="alert alert-danger" role="alert">
            Tipo de área verde apagado com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">
            Falha ao apagar tipo de área verde!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';				
         }
      }
    }
    public function atualizar(){
      if ($this->idtipo_areaverde) {

          $sql = "UPDATE tipo_areaverde SET nome = :nome WHERE idtipo_areaverde = :idtipo_areaverde";          
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idtipo_areaverde',$this->idtipo_areaverde);
          $stmt->bindParam(':nome', $this->nome);   
          if ($stmt->execute()) {
            echo '<div class="alert alert-success" role="alert">
            Tipo de área verde atualizado com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">
            Falha ao atualizar tipo de área verde!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';				
         }     
      }       
    }
}