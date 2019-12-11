<?php 
require './../requires/require.php';

if (isset($_POST["Salvar"]) && $_POST["Salvar"] === "Salvar") {

	$servico = new Servico($_POST["idservico"]);    
    $servico->setRequerimentoIdrequerimento($_POST['requerimento_idrequerimento']);
	$servico->setEliminacaoExterna($_POST['eliminacao_externa']);	
	$servico->setQuantElimExt($_POST['quant_elim_ext']);
	$servico->setEliminacaoInterna($_POST['eliminacao_interna']);	
	$servico->setQuantElimInt($_POST['quant_elim_int']);
	$servico->setPodaExterna($_POST['poda_externa']);	
	$servico->setQuantPodaExt($_POST['quant_poda_ext']);
	$servico->setPodaInterna($_POST['poda_interna']);			
	$servico->setQuantPodaInt($_POST['quant_poda_int']);	
	$servico->setJustificativa($_POST['justificativa']); 
	$servico->atualizar();	
}

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
	
	$servico = new Servico($_GET["id"]);

?>

<form action="" method="post" accept-charset="utf-8" onsubmit="">
	<input type="hidden" name="idservico" value="<?php echo $servico->getIdservico();?>" placeholder="">
	Requerimento nº:
	<select name="requerimento_idrequerimento" class="" value="">	    
	    <?php 
	    	 $requerimentos = Requerimento::listar();
	    	 foreach ($requerimentos as $requerimento) {?>	
	    	 <option  name="requerimento_idrequerimento" value="<?php echo $requerimento->getIdrequerimento();?>"><?php echo $requerimento->getIdrequerimento();?></option>  
	    <?php } ?>	
	    <option name="requerimento_idrequerimento" value="1" >Requerimento 1</option>   	   
	    <option name="requerimento_idrequerimento" value="2" >Requerimento 2</option>   	   
	    <option name="requerimento_idrequerimento" value="3" >Requerimento 3</option>   	   
    </select> <br>

    Eliminação externa:
    <input type="radio" name="eliminacao_externa" value="s" >Sim
    <input type="radio" name="eliminacao_externa" value="n" checked>Não
 <!--    <input type="checkbox" name="eliminacao_externa" value="s"> -->
    Quantidade de árvores:    
    <input type="number" name="quant_elim_ext" value="<?php echo $servico->getQuantElimExt();?>"><br>
	
	Eliminação interna:
	<input type="radio" name="eliminacao_interna" value="s" >Sim
    <input type="radio" name="eliminacao_interna" value="n" checked>Não
   <!--  <input type="checkbox" name="eliminacao_interna" value="s"> -->
    Quantidade de árvores:
    <input type="number" name="quant_elim_int" value="<?php echo $servico->getQuantElimInt();?>" ><br>
	
	Poda externa:
	<input type="radio" name="poda_externa" value="s" >Sim
    <input type="radio" name="poda_externa" value="n" checked>Não
   <!--  <input type="checkbox" name="poda_externa" value="s" > -->
    Quantidade de árvores:
    <input type="number" name="quant_poda_ext" value="<?php echo $servico->getQuantPodaExt();?>"  ><br>
	
	Poda interna:
	<input type="radio" name="poda_interna" value="s" >Sim
    <input type="radio" name="poda_interna" value="n" checked>Não
   <!--  <input type="checkbox" name="poda_interna" value="s" defaultValue="n"> -->
    Quantidade de árvores:
    <input type="number" name="quant_poda_int" value="<?php echo $servico->getQuantPodaInt();?>"><br>
	
	Justificativa do requerimento:
	<textarea name="justificativa"><?php echo $servico->getJustificativa()?></textarea><br>
	<input type="submit" name="Salvar" value="Salvar">	
	<input type="reset" name="Limpar" value="Limpar">	
	
</form>
<?php  
}
?>