<?php  

class Endereco{
	protected $idendereco;
	protected $servico_idservico;
	protected $bairro_idbairro;
	protected $infracao_idinfracao;	
	protected $areaverde_idareaverde;	
	protected $cidadao_idcidadao;
	protected $cep;
	protected $logradouro;
	protected $numero;
	protected $ponto_referencia;
    
    public function __construct($id=false){
      if ($id) {
        
          $sql = "SELECT * FROM endereco WHERE idendereco = :idendereco";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idendereco',$id,PDO::PARAM_INT);  
          $stmt->execute();
          foreach ($stmt as $obj) {
               $this->setIdendereco($obj['idendereco']);
               $this->setServicoIdservico($obj['servico_idservico']);             
               $this->setBairroIdbairro($obj['bairro_idbairro']);             
               $this->setInfracaoIdinfracao($obj['infracao_idinfracao']);             
               $this->setAreaverdeIdareaverde($obj['areaverde_idareaverde']);             
               $this->setCidadaoIdcidadao($obj['cidadao_idcidadao']);             
               $this->setCep($obj['CEP']);             
               $this->setLogradouro($obj['logradouro']);             
               $this->setNumero($obj['numero']);             
               $this->setPontoReferencia($obj['ponto_referencia']);             
            } 
        }        
    }
    public function getIdendereco(){
        return $this->idendereco;
    }    
    public function setIdendereco($idendereco){
        $this->idendereco = $idendereco;
    }   
    public function getServicoIdservico(){
        return $this->servico_idservico;
    }   
    public function setServicoIdservico($servico_idservico){
        $this->servico_idservico = $servico_idservico;        
    }
    public function getBairroIdbairro(){
        return $this->bairro_idbairro;
    }    
    public function setBairroIdbairro($bairro_idbairro){
        $this->bairro_idbairro = $bairro_idbairro;       
    }    
    public function getInfracaoIdinfracao(){
        return $this->infracao_idinfracao;
    }   
    public function setInfracaoIdinfracao($infracao_idinfracao){
        $this->infracao_idinfracao = $infracao_idinfracao;       
    }    
    public function getAreaverdeIdareaverde(){
        return $this->areaverde_idareaverde;
    }    
    public function setAreaverdeIdareaverde($areaverde_idareaverde){
        $this->areaverde_idareaverde = $areaverde_idareaverde;        
    }
    public function getCidadaoIdcidadao(){
        return $this->cidadao_idcidadao;
    }   
    public function setCidadaoIdcidadao($cidadao_idcidadao){
        $this->cidadao_idcidadao = $cidadao_idcidadao;        
    }   
    public function getCep(){
        return $this->cep;
    }   
    public function setCep($cep){
        $this->cep = $cep;        
    }    
    public function getLogradouro(){
        return $this->logradouro;
    }    
    public function setLogradouro($logradouro){
        $this->logradouro = $logradouro;       
    }    
    public function getNumero(){
        return $this->numero;
    }    
    public function setNumero($numero){
        $this->numero = $numero;        
    }    
    public function getPontoReferencia(){
        return $this->ponto_referencia;
    }    
    public function setPontoReferencia($ponto_referencia){
        $this->ponto_referencia = $ponto_referencia;      
    }
    public function adicionar(){
        try {
            $sql = "INSERT INTO endereco (servico_idservico,bairro_idbairro,infracao_idinfracao,areaverde_idareaverde,cidadao_idcidadao,cep,logradouro,numero,ponto_referencia) VALUES (:servico_idservico,:bairro_idbairro,:infracao_idinfracao,:areaverde_idareaverde,:cidadao_idcidadao,:cep,:logradouro,:numero,:ponto_referencia)";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->bindParam(':servico_idservico', $this->servico_idservico); 
            $stmt->bindParam(':bairro_idbairro', $this->bairro_idbairro); 
            $stmt->bindParam(':infracao_idinfracao', $this->infracao_idinfracao); 
            $stmt->bindParam(':areaverde_idareaverde', $this->areaverde_idareaverde);     
            $stmt->bindParam(':cidadao_idcidadao', $this->cidadao_idcidadao); 
            $stmt->bindParam(':cep', $this->cep); 
            $stmt->bindParam(':logradouro', $this->logradouro); 
            $stmt->bindParam(':numero', $this->numero); 
            $stmt->bindParam(':ponto_referencia', $this->ponto_referencia); 
            $stmt->execute();

        } catch (Exception $e) {
            echo "Mensagem: " . $e->getMessage() . "<br>";
            echo "Código: " . $e->getCode() . "<br>";
            echo "Linha: " . $e->getLine() . "<br>";
            echo "Arquivo: " . $e->getFile() . "<br>";
        }
    }
    public static function listar(){
        $sql = "SELECT * FROM endereco";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll();           

        if ($registros) {
            $itens = array();
            foreach ($registros as $objeto) {
               $endereco = new Endereco();
               $endereco->setIdendereco($objeto['idendereco']);
               $endereco->setServicoIdservico($objeto['servico_idservico']);             
               $endereco->setBairroIdbairro($objeto['bairro_idbairro']);             
               $endereco->setInfracaoIdinfracao($objeto['infracao_idinfracao']);             
               $endereco->setAreaverdeIdareaverde($objeto['areaverde_idareaverde']);             
               $endereco->setCidadaoIdcidadao($objeto['cidadao_idcidadao']);             
               $endereco->setCep($objeto['CEP']);             
               $endereco->setLogradouro($objeto['logradouro']);             
               $endereco->setNumero($objeto['numero']);             
               $endereco->setPontoReferencia($objeto['ponto_referencia']);               
               $itens[] = $endereco;               
            }                      
            return $itens;           
        }     
        return false;
    }
    public function excluir(){
      if($this->endereco){
          $sql="DELETE FROM endereco WHERE idendereco = :idendereco";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idendereco',$this->idendereco);
          $stmt->execute();
      }
    }
    public function atualizar(){
      if ($this->idendereco) {

          $sql = "UPDATE endereco SET servico_idservico = :servico_idservico ,bairro_idbairro = :bairro_idbairro , infracao_idinfracao = :infracao_idinfracao ,areaverde_idareaverde = :areaverde_idareaverde ,cidadao_idcidadao = :cidadao_idcidadao , cep = :cep , logradouro = :logradouro ,numero = :numero , ponto_referencia = :ponto_referencia WHERE idendereco = :idendereco";          
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idendereco',$this->idendereco);
          $stmt->bindParam(':servico_idservico', $this->servico_idservico); 
          $stmt->bindParam(':bairro_idbairro', $this->bairro_idbairro); 
          $stmt->bindParam(':infracao_idinfracao', $this->infracao_idinfracao); 
          $stmt->bindParam(':areaverde_idareaverde', $this->areaverde_idareaverde);     
          $stmt->bindParam(':cidadao_idcidadao', $this->cidadao_idcidadao); 
          $stmt->bindParam(':cep', $this->cep); 
          $stmt->bindParam(':logradouro', $this->logradouro); 
          $stmt->bindParam(':numero', $this->numero); 
          $stmt->bindParam(':ponto_referencia', $this->ponto_referencia); 
          $stmt->execute();       
      }       
    }
}
