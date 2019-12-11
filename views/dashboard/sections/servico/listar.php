<?php

require './../requires/require.php';

?>

<table>					
	<thead>
		<tr>
			<th>#ID</th>
			<th>Id Requerimento</th>	
			<th>Elim. Externa</th>	
			<th>Qtdade</th>	
			<th>Elim. Interna</th>	
			<th>Qtdade</th>	
			<th>Poda Externa</th>	
			<th>Qtdade</th>	
			<th>Poda Interna</th>	
			<th>Qtdade</th>				
			<th>Justificativa</th>				
			<th>Ações</th>				
		</tr>
	</thead>
	<tbody>
		<?php
		
			try {
				$servicos = Servico::listar();
					foreach ($servicos as $servico) {								
						echo '<tr><td>'.$servico->getIdservico().'</td>';
						echo '<td>'.$servico->getRequerimentoIdrequerimento().'</td>';

						echo '<td>'.$servico->getEliminacaoExterna().'</td>';
						echo '<td>'.$servico->getQuantElimExt().'</td>';

						echo '<td>'.$servico->getEliminacaoInterna().'</td>';
						echo '<td>'.$servico->getQuantElimInt().'</td>';

						echo '<td>'.$servico->getPodaExterna().'</td>';
						echo '<td>'.$servico->getQuantPodaExt().'</td>';

						echo '<td>'.$servico->getPodaInterna().'</td>';						
						echo '<td>'.$servico->getQuantPodaInt().'</td>';

						echo '<td>'.$servico->getJustificativa().'</td>';	

						echo '<td><a href="./editar.php?&id='.$servico->getIdservico().'">Editar | </a>';	
						echo '<a href="./excluir.php?&id='.$servico->getIdservico().'">Excluir</a></td></tr>';					
					}				
				} catch (Exception $e) {
					echo 'Erro: '.$e->getMessage();								
				}							
		?>						
	</tbody>
</table>