<?php 

require './../requires/require.php';

if (isset($_POST["Salvar"]) && $_POST["Salvar"] === "Salvar") {

	$endereco = new Endereco($_POST["idendereco"]);	
    $endereco->setServicoIdservico($_POST['servico_idservico']);             
    $endereco->setBairroIdbairro($_POST['bairro_idbairro']);             
    $endereco->setInfracaoIdinfracao($_POST['infracao_idinfracao']);             
    $endereco->setAreaverdeIdareaverde($_POST['areaverde_idareaverde']);             
    $endereco->setCidadaoIdcidadao($_POST['cidadao_idcidadao']);             
    $endereco->setCep($_POST['cep']);             
    $endereco->setLogradouro($_POST['logradouro']);             
    $endereco->setNumero($_POST['numero']);             
    $endereco->setPontoReferencia($_POST['ponto_referencia']);	
	$endereco->atualizar();	
}

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
	
	$endereco = new Endereco($_GET["id"]);

?>

<form action="" method="post" accept-charset="utf-8" onsubmit="">
	<input type="hidden" name="idendereco" value="<?php echo $endereco->getIdendereco();?>" placeholder="">
	Servico:
	<select name="servico_idservico" class="" value="">	   
	    <?php 
	    	 $servicos = Servico::listar();
	    	 foreach ($servicos as $servico) {?>	
	    	 <option  name="servico_idservico" value="<?php echo $servico->getIdservico();?>"><?php echo $servico->getIdservico()?></option>  
	    <?php } ?>
	    <option name="servico_idservico" value="1" >Servico 1</option> 	   
	    <option name="servico_idservico" value="2" >Servico 2</option> 	   
	    <option name="servico_idservico" value="3" >Servico 3</option> 	   
    </select> <br>

	Bairro:
	<select name="bairro_idbairro" class="" value="">	    	
	    <?php 
	    	 $bairros = Bairro::listar();
	    	 foreach ($bairros as $bairro) {?>	
	    	 <option  name="bairro_idbairro" value="<?php echo $bairro->getIdbairro();?>"><?php echo $bairro->getIdbairro()?></option>  
	    <?php } ?>
	    <option name="bairro_idbairro" value="1" >Bairro 1</option> 	   
	    <option name="bairro_idbairro" value="2" >Bairro 2</option> 	   
	    <option name="bairro_idbairro" value="3" >Bairro 3</option> 	   
    </select> <br>

    Infração:
	<select name="infracao_idinfracao" class="" value="">	   
	    <?php 
	    	 $infracoes = Infracao::listar();
	    	 foreach ($infracoes as $infracao) {?>	
	    	 <option  name="infracao_idinfracao" value="<?php echo $infracao->getIdinfracao();?>"><?php echo $infracao->getIdinfracao()?></option>  
	    <?php } ?>
	    <option name="infracao_idinfracao" value="1" >Infração 1</option> 	   
	    <option name="infracao_idinfracao" value="2" >Infração 2</option> 	   
	    <option name="infracao_idinfracao" value="3" >Infração 3</option> 	   
    </select> <br>

    Área verde:
	<select name="areaverde_idareaverde" class="" value="">	   	
	    <?php 
	    	 $areasverdes = AreaVerde::listar();
	    	 foreach ($areasverdes as $areaverde) {?>	
	    	 <option  name="infracao_idinfracao" value="<?php echo $areaverde->getIdareaverde();?>"><?php echo $areaverde->getIdareaverde()?></option>  
	    <?php } ?>
	    <option name="areaverde_idareaverde" value="1" >Área verde 1</option> 	   
	    <option name="areaverde_idareaverde" value="2" >Área verde 2</option> 	   
	    <option name="areaverde_idareaverde" value="3" >Área verde 3</option> 	   
    </select> <br>

    Cidadão:
	<select name="cidadao_idcidadao" class="" value="">	    
	    <?php 
	    	 $cidadaos = Cidadao::listar();
	    	 foreach ($cidadaos as $cidadao) {?>	
	    	 <option  name="infracao_idinfracao" value="<?php echo $cidadao->getIdcidadao();?>"><?php echo $cidadao->getNome()?></option>  
	    <?php } ?>
	    <option name="cidadao_idcidadao" value="1" >Cidadão 1</option> 	   
	    <option name="cidadao_idcidadao" value="2" >Cidadão 2</option> 	   
	    <option name="cidadao_idcidadao" value="3" >Cidadão 3</option> 	   
    </select> <br>

    CEP:
    <input type="number" name="cep" value="<?php echo $endereco->getCep();?>"><br>

    Logradouro:
    <input type="text" name="logradouro" value="<?php echo $endereco->getLogradouro();?>" placeholder=""><br>
	
	Número:
    <input type="number" name="numero" value="<?php echo $endereco->getNumero();?>"><br>
	
	Ponto de referência:
    <input type="text" name="ponto_referencia" value="<?php echo $endereco->getPontoReferencia();?>" placeholder=""><br>

	<input type="submit" name="Salvar" value="Salvar">	
	<input type="reset" name="Limpar" value="Limpar">	
	
</form>
<?php  
}
?>