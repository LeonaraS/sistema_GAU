<?php  

class Projeto{
	protected $idprojeto;
	protected $funcionario_idfuncionario;
	protected $titulo;
	protected $implantacao;
	protected $descricao;
	protected $responsavel;
    
    public function __construct($id=false){
      if ($id) {
        
          $sql = "SELECT * FROM projeto WHERE idprojeto = :idprojeto";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idprojeto',$id,PDO::PARAM_INT);  
          $stmt->execute();
          foreach ($stmt as $obj) {
               $this->setIdprojeto($obj['idprojeto']);                             
               $this->setFuncionarioIdfuncionario($obj['funcionario_idfuncionario']);                 
               $this->setTitulo($obj['titulo']);                             
               $this->setImplantacao($obj['implantacao']);                             
               $this->setDescricao($obj['descricao']);                             
               $this->setResponsavel($obj['responsavel']);                             
            } 
        }        
    }
    public function getIdprojeto(){
        return $this->idprojeto;
    }   
    public function setIdprojeto($idprojeto){
        $this->idprojeto = $idprojeto;      
    }    
    public function getFuncionarioIdfuncionario(){
        return $this->funcionario_idfuncionario;
    }  
    public function setFuncionarioIdfuncionario($funcionario_idfuncionario){
        $this->funcionario_idfuncionario = $funcionario_idfuncionario;      
    }    
    public function getTitulo(){
        return $this->titulo;
    }    
    public function setTitulo($titulo){
        $this->titulo = $titulo;      
    }    
    public function getImplantacao(){
        return $this->implantacao;
    }    
    public function setImplantacao($implantacao){
        $this->implantacao = $implantacao;        
    }    
    public function getDescricao(){
        return $this->descricao;
    }   
    public function setDescricao($descricao){
        $this->descricao = $descricao;       
    }    
    public function getResponsavel(){
        return $this->responsavel;
    }   
    public function setResponsavel($responsavel){
        $this->responsavel = $responsavel;        
    }
    public function adicionar() {
        try {
            $sql = "INSERT INTO projeto (funcionario_idfuncionario, titulo,implantacao,descricao,responsavel) VALUES (:funcionario_idfuncionario,:titulo,:implantacao,:descricao,:responsavel)";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->bindParam(':funcionario_idfuncionario', $this->funcionario_idfuncionario);
            $stmt->bindParam(':titulo', $this->titulo);    
            $stmt->bindParam(':implantacao', $this->implantacao);                
            $stmt->bindParam(':descricao', $this->descricao);    
            $stmt->bindParam(':responsavel', $this->responsavel);    
            if ($stmt->execute()) {
				echo '<div class="alert alert-success" role="alert">
				Projeto Cadastrado com sucesso!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">
				Falha ao Cadastrar projeto!
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
        $sql = "SELECT * FROM projeto ORDER BY idprojeto asc";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll();           

        if ($registros) {
            $itens = array();
            foreach ($registros as $objeto) {
                $projeto = new Projeto();
                $projeto->setIdprojeto($objeto['idprojeto']);                             
                $projeto->setFuncionarioIdfuncionario($objeto['funcionario_idfuncionario']);             
                $projeto->setTitulo($objeto['titulo']);                             
                $projeto->setImplantacao($objeto['implantacao']);                             
                $projeto->setDescricao($objeto['descricao']);                             
                $projeto->setResponsavel($objeto['responsavel']);                     
                $itens[] = $projeto;               
            }                      
            return $itens;           
        }     
        return false;
    }
    public function excluir(){
      if($this->idprojeto){
          $sql="DELETE FROM projeto WHERE idprojeto = :idprojeto";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idprojeto',$this->idprojeto);
          if ($stmt->execute()) {
            echo '<div class="alert alert-danger" role="alert">
            Projeto apagada com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">
            Falha ao apagar projeto!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';				
         }
        }
    }
    public function atualizar(){
      if ($this->idprojeto) {

          $sql = "UPDATE projeto SET funcionario_idfuncionario = :funcionario_idfuncionario, titulo = :titulo, implantacao = :implantacao , descricao = :descricao, responsavel = :responsavel WHERE idprojeto = :idprojeto";          
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idprojeto',$this->idprojeto);
          $stmt->bindParam(':funcionario_idfuncionario', $this->funcionario_idfuncionario);
          $stmt->bindParam(':titulo', $this->titulo);    
          $stmt->bindParam(':implantacao', $this->implantacao);                
          $stmt->bindParam(':descricao', $this->descricao);    
          $stmt->bindParam(':responsavel', $this->responsavel);   
          if ($stmt->execute()) {
            echo '<div class="alert alert-success" role="alert">
            Projeto atualizada com sucesso!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">
            Falha ao atualizar projeto!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';				
         }       
        }       
    }
}
