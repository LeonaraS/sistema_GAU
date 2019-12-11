<?php  

require './../requires/require.php';

if(isset($_POST['Cadastrar']) && $_POST['Cadastrar'] === 'Cadastrar'){
	
	$botanica = new Botanica();
	$botanica->setArvoreIdarvore($_POST['arvore_idarvore']);
	$botanica->setMudaIdmuda($_POST['muda_idmuda']);
	$botanica->setNomePopular($_POST['nome_popular']);	
	$botanica->setNomeCientifico($_POST['nome_cientifico']);	
	$botanica->setNativa($_POST['nativa']);	
	$botanica->setFrutifera($_POST['frutifera']);	
	$botanica->setExotica($_POST['exotica']);	
	$botanica->adicionar(); 
}
?>

        <form action="" method="post" accept-charset="utf-8" onsubmit="">
            Árvore:
            <select name="arvore_idarvore" class="" value="">
                <option selected name="arvore_idarvore" value="0">Selecione</option>
                <?php 
	    	 $arvores = Arvore::listar();
	    	 foreach ($arvores as $arvore) {?>
                <option name="arvore_idarvore" value="<?php echo $arvore->getIdarvore();?>">
                    <?php echo $arvore->getIdarvore()?></option>
                <?php } ?>
                <option name="arvore_idarvore" value="1">Arvore 1</option>
                <option name="arvore_idarvore" value="2">Arvore 2</option>
                <option name="arvore_idarvore" value="3">Arvore 3</option>
            </select> <br>

            Muda:
            <select name="muda_idmuda" class="" value="">
                <option selected name="muda_idmuda" value="0">Selecione</option>
                <?php 
	    	 $mudas = Muda::listar();
	    	 foreach ($mudas as $muda) {?>
                <option name="muda_idmuda" value="<?php echo $muda->getIdmuda();?>"><?php echo $muda->getIdmuda()?>
                </option>
                <?php } ?>
                <option name="muda_idmuda" value="1">Muda 1</option>
                <option name="muda_idmuda" value="2">Muda 2</option>
                <option name="muda_idmuda" value="3">Muda 3</option>
            </select> <br>
            Nome popular:
            <input type="text" name="nome_popular" value="" placeholder=""><br>

            Nome cientifico:
            <input type="text" name="nome_cientifico" value="" placeholder=""><br>

            Nativa:
            Sim<input class="" type="radio" name="nativa" value="s">
            Não<input class="" type="radio" name="nativa" value="n"> <br>

            Frutífera:
            Sim<input class="" type="radio" name="frutifera" value="s">
            Não<input class="" type="radio" name="frutifera" value="n"> <br>

            Exótica:
            Sim<input class="" type="radio" name="exotica" value="s">
            Não<input class="" type="radio" name="exotica" value="n"> <br>

            <input type="submit" name="Cadastrar" value="Cadastrar">
            <input type="reset" name="Limpar" value="Limpar">

        </form>
