<?php

require './../requires/require.php';

?>

<table >					
	<thead>
		<tr class="">
			<th>#ID</th>
			<th>Id Arvore</th>	
			<th>Id Muda</th>	
			<th>Nome Pop.</th>	
			<th>Nome Cientif.</th>	
			<th>Nativa</th>	
			<th>Frutífera</th>	
			<th>Exótica</th>	
			<th>Ações</th>	
		</tr>
	</thead>
	<tbody>
		<?php
		
			try {
				$botanicas = Botanica::listar();
					foreach ($botanicas as $botanica) {								
						echo '<tr><td>'.$botanica->getIdBotanica().'</td>';
						echo '<td>'.$botanica->getArvoreIdarvore().'</td>';
						echo '<td>'.$botanica->getMudaIdmuda().'</td>';
						echo '<td>'.$botanica->getNomePopular().'</td>';
						echo '<td>'.$botanica->getNomeCientifico().'</td>';
						echo '<td>'.$botanica->getNativa().'</td>';
						echo '<td>'.$botanica->getFrutifera().'</td>';
						echo '<td>'.$botanica->getExotica().'</td>';
						echo '<td><a href="./editar.php?&id='.$botanica->getIdBotanica().'">Editar | </a>';	
						echo '<a href="./excluir.php?&id='.$botanica->getIdBotanica().'">Excluir</a></td></tr>';										
					}				
				} catch (Exception $e) {
					echo 'Erro: '.$e->getMessage();								
				}							
		?>							
	</tbody>
</table>