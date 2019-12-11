<?php

class Servico{
	protected $idservico;
	protected $requerimento_idrequerimento;
	protected $eliminacao_externa;
  protected $quant_elim_ext;
	protected $eliminacao_interna;
  protected $quant_elim_int;
	protected $poda_externa;
  protected $quant_poda_ext;
	protected $poda_interna;
	protected $quant_poda_int;
  protected $outro;
	protected $justificativa;

    public function __construct($id=false){
      if ($id) {

          $sql = "SELECT * FROM servico WHERE idservico = :idservico";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idservico',$id,PDO::PARAM_INT);
          $stmt->execute();
          foreach ($stmt as $obj) {
               $this->setIdservico($obj['idservico']);
               $this->setRequerimentoIdrequerimento($obj['requerimento_idrequerimento']);
               $this->setEliminacaoExterna($obj['eliminacao_externa']);
               $this->setQuantElimExt($obj['quant_elim_ext']);
               $this->setEliminacaoInterna($obj['eliminacao_interna']);
               $this->setQuantElimInt($obj['quant_elim_int']);
               $this->setPodaInterna($obj['poda_interna']);
               $this->setQuantPodaExt($obj['quant_poda_ext']);
               $this->setPodaExterna($obj['poda_externa']);
               $this->setQuantPodaInt($obj['quant_poda_int']);
               $this->setOutro($obj['outro']);
               $this->setJustificativa($obj['justificativa']);
            }
        }
    }
    public function getIdservico(){
        return $this->idservico;
    }
    public function setIdservico($idservico){
        $this->idservico = $idservico;
    }
    public function getRequerimentoIdrequerimento(){
        return $this->requerimento_idrequerimento;
    }
    public function setRequerimentoIdrequerimento($requerimento_idrequerimento){
        $this->requerimento_idrequerimento = $requerimento_idrequerimento;
    }
    public function getEliminacaoExterna(){
        return $this->eliminacao_externa;
    }
    public function setEliminacaoExterna($eliminacao_externa){
        $this->eliminacao_externa = $eliminacao_externa;
    }
    public function getEliminacaoInterna(){
        return $this->eliminacao_interna;
    }
    public function setEliminacaoInterna($eliminacao_interna){
        $this->eliminacao_interna = $eliminacao_interna;
    }
    public function getPodaExterna(){
        return $this->poda_externa;
    }
    public function setPodaExterna($poda_externa){
        $this->poda_externa = $poda_externa;
    }
    public function getPodaInterna(){
        return $this->poda_interna;
    }
    public function setPodaInterna($poda_interna){
        $this->poda_interna = $poda_interna;
    }
    public function getQuantElimExt(){
        return $this->quant_elim_ext;
    }
    public function setQuantElimExt($quant_elim_ext){
        $this->quant_elim_ext = $quant_elim_ext;
    }
    public function getQuantElimInt(){
        return $this->quant_elim_int;
    }
    public function setQuantElimInt($quant_elim_int){
        $this->quant_elim_int = $quant_elim_int;
    }
    public function getQuantPodaExt(){
        return $this->quant_poda_ext;
    }
    public function setQuantPodaExt($quant_poda_ext){
        $this->quant_poda_ext = $quant_poda_ext;
    }
    public function getQuantPodaInt(){
        return $this->quant_poda_int;
    }
    public function setQuantPodaInt($quant_poda_int){
        $this->quant_poda_int = $quant_poda_int;
    }
    public function getOutro(){
        return $this->outro;
    }
    public function setOutro($outro){
        $this->outro = $outro;
    }
    public function getJustificativa(){
        return $this->justificativa;
    }
    public function setJustificativa($justificativa){
        $this->justificativa = $justificativa;
    }
    public function adicionar() {
        try {
            $sql = "INSERT INTO servico (requerimento_idrequerimento, eliminacao_externa, quant_elim_ext, eliminacao_interna, quant_elim_int, poda_externa, quant_poda_ext, poda_interna, quant_poda_int, outro, justificativa) VALUES (:requerimento_idrequerimento, :eliminacao_externa, :quant_elim_ext, :eliminacao_interna, :quant_elim_int, :poda_externa, :quant_poda_ext, :poda_interna, :quant_poda_int, :outro, :justificativa)";
						$conexao = DB::conexao();
						$stmt = $conexao->prepare($sql);
            $stmt->bindParam(':requerimento_idrequerimento', $this->requerimento_idrequerimento);
            $stmt->bindParam(':eliminacao_externa', $this->eliminacao_externa);
            $stmt->bindParam(':quant_elim_ext', $this->quant_elim_ext);
            $stmt->bindParam(':eliminacao_interna', $this->eliminacao_interna);
            $stmt->bindParam(':quant_elim_int', $this->quant_elim_int);
            $stmt->bindParam(':poda_externa', $this->poda_externa);
            $stmt->bindParam(':quant_poda_ext', $this->quant_poda_ext);
            $stmt->bindParam(':poda_interna', $this->poda_interna);
            $stmt->bindParam(':quant_poda_int', $this->quant_poda_int);
            $stmt->bindParam(':outro', $this->outro);
            $stmt->bindParam(':justificativa', $this->justificativa);
            $stmt->execute();
						return $conexao->lastInsertId();
        } catch (PDOException $e) {
            echo "Mensagem: " . $e->getMessage() . "<br>";
            echo "Código: " . $e->getCode() . "<br>";
            echo "Linha: " . $e->getLine() . "<br>";
            echo "Arquivo: " . $e->getFile() . "<br>";
        }
    }
    public static function listar(){
        $sql = "SELECT * FROM servico ORDER BY idservico asc";
        $stmt = DB::conexao()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll();

        if ($registros) {

            $itens = array();
            foreach ($registros as $objeto) {
               $servico = new Servico();
               $servico->setIdservico($objeto['idservico']);
               $servico->setRequerimentoIdrequerimento($objeto['requerimento_idrequerimento']);
               $servico->setEliminacaoExterna($objeto['eliminacao_externa']);
               $servico->setQuantElimExt($objeto['quant_elim_ext']);
               $servico->setEliminacaoInterna($objeto['eliminacao_interna']);
               $servico->setQuantElimInt($objeto['quant_elim_int']);
               $servico->setPodaExterna($objeto['poda_externa']);
               $servico->setQuantPodaExt($objeto['quant_poda_ext']);
               $servico->setPodaInterna($objeto['poda_interna']);
               $servico->setQuantPodaInt($objeto['quant_poda_int']);
               $servico->setOutro($objeto['outro']);
               $servico->setJustificativa($objeto['justificativa']);
               $itens[] = $servico;
            }
            return $itens;
        }
        return false;
    }
    public function excluir(){
      if($this->idservico){
          $sql="DELETE FROM servico WHERE idservico = :idservico";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idservico',$this->idservico);
          $stmt->execute();
      }
    }
    public function atualizar(){
      if ($this->idservico) {

          $sql = "UPDATE servico SET requerimento_idrequerimento = :requerimento_idrequerimento , eliminacao_externa = :eliminacao_externa, quant_elim_ext = :quant_elim_ext, eliminacao_interna = :eliminacao_interna, quant_elim_int = :quant_elim_int, poda_externa = :poda_externa, quant_poda_ext = :quant_poda_ext, poda_interna = :poda_interna, quant_poda_int = :quant_poda_int, outro = :outro, justificativa = :justificativa WHERE idservico = :idservico";
          $stmt = DB::conexao()->prepare($sql);
          $stmt->bindParam(':idservico',$this->idservico);
          $stmt->bindParam(':requerimento_idrequerimento', $this->requerimento_idrequerimento);
          $stmt->bindParam(':eliminacao_externa', $this->eliminacao_externa);
          $stmt->bindParam(':quant_elim_ext', $this->quant_elim_ext);
          $stmt->bindParam(':eliminacao_interna', $this->eliminacao_interna);
          $stmt->bindParam(':quant_elim_int', $this->quant_elim_int);
          $stmt->bindParam(':poda_externa', $this->poda_externa);
          $stmt->bindParam(':quant_poda_ext', $this->quant_poda_ext);
          $stmt->bindParam(':poda_interna', $this->poda_interna);
          $stmt->bindParam(':quant_poda_int', $this->quant_poda_int);
          $stmt->bindParam(':outro', $this->outro);
          $stmt->bindParam(':justificativa', $this->justificativa);
          $stmt->execute();
      }
    }
}
