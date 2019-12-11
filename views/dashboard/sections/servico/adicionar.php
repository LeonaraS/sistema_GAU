<?php  

require './../requires/require.php';

if(isset($_POST['Cadastrar']) && $_POST['Cadastrar'] === 'Cadastrar'){
	
	$servico = new Servico();	
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
	$servico->adicionar(); 

}
?>

<form action="" method="post" accept-charset="utf-8" onsubmit="">
	Requerimento nº:
	<select name="requerimento_idrequerimento" class="" value="">
	    <option selected  name="requerimento_idrequerimento" value="0">Selecione</option>
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
    <input type="number" name="quant_elim_ext" value="0"><br>
	
	Eliminação interna:
	<input type="radio" name="eliminacao_interna" value="s" >Sim
    <input type="radio" name="eliminacao_interna" value="n" checked>Não
   <!--  <input type="checkbox" name="eliminacao_interna" value="s"> -->
    Quantidade de árvores:
    <input type="number" name="quant_elim_int" value="0" ><br>
	
	Poda externa:
	<input type="radio" name="poda_externa" value="s" >Sim
    <input type="radio" name="poda_externa" value="n" checked>Não
   <!--  <input type="checkbox" name="poda_externa" value="s" > -->
    Quantidade de árvores:
    <input type="number" name="quant_poda_ext" value="0"  ><br>
	
	Poda interna:
	<input type="radio" name="poda_interna" value="s" >Sim
    <input type="radio" name="poda_interna" value="n" checked>Não
   <!--  <input type="checkbox" name="poda_interna" value="s" defaultValue="n"> -->
    Quantidade de árvores:
    <input type="number" name="quant_poda_int" value="0"><br>
	
	Justificativa do requerimento:
	<textarea name="justificativa"></textarea><br>
	<input type="submit" name="Cadastrar" value="Cadastrar">	
	<input type="reset" name="Limpar" value="Limpar">	
	
</form>