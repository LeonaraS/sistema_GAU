<?php

require './../requires/require.php';

?>

<table >					
	<thead>
		<tr class="">
			<th>#ID</th>
			<th>Id Servico</th>	
			<th>Id Bairro</th>	
			<th>Id Infracao</th>	
			<th>Id Área Verde</th>	
			<th>Id Cidadão</th>	
			<th>CEP</th>	
			<th>Logradouro</th>	
			<th>Numero</th>	
			<th>Ponto de Referência</th>	
			<th>Ações</th>	
		</tr>
	</thead>
	<tbody>
		<?php
		
			try {
				$enderecos = Endereco::listar();
					foreach ($enderecos as $endereco) {								
						echo '<tr><td>'.$endereco->getIdendereco().'</td>';
						echo '<td>'.$endereco->getServicoIdservico().'</td>';
						echo '<td>'.$endereco->getBairroIdbairro().'</td>';
						echo '<td>'.$endereco->getInfracaoIdinfracao().'</td>';						
						echo '<td>'.$endereco->getAreaverdeIdareaverde().'</td>';				
						echo '<td>'.$endereco->getCidadaoIdcidadao().'</td>';	
						echo '<td>'.$endereco->getCep().'</td>';											
						echo '<td>'.$endereco->getLogradouro().'</td>';											
						echo '<td>'.$endereco->getNumero().'</td>';											
						echo '<td>'.$endereco->getPontoReferencia().'</td>';
						echo '<td><a href="./editar.php?&id='.$endereco->getIdendereco().'">Editar | </a>';	
						echo '<a href="./excluir.php?&id='.$endereco->getIdendereco().'">Excluir</a></td></tr>';			
					}				
				} catch (Exception $e) {
					echo 'Erro: '.$e->getMessage();								
				}							
		?>							
	</tbody>
</table>