<?php
	
	require_once __DIR__."/../dao/PedidoDAO.php";
	require_once __DIR__."/../dao/ClienteDAO.php";
	
	//Buscando os pedidos do cliente que está acessando o programa:	
	//1 - Pego o cliente do cpf informado
	$clienteDao = new ClienteDAO();
	$cliente = $clienteDao->listarPorCpf($_COOKIE["cpf"]);
	//2 - Armazenando o nome em um cookie para uso futuro...
	setcookie("nome",$cliente->getNome(),0,"/desafio/");
	//3 - Pego os pedidos do cliente
	$pedidoDao = new PedidoDAO();
	$pedidos = $pedidoDao->listarPorCliente($cliente);  

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Registro de Pedidos</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.32" />
	<script type="text/javascript" src="../scripts/javascript.js"></script>
</head>

<body>
	<h3>Registro de Pedidos - Pedidos do Cliente</h3>
	Cliente: <?=$_COOKIE["cpf"]." - ".$cliente->getNome()?><br><br>
	<a href="cadPedidoView.php">CADASTRAR NOVO PEDIDO</a>&nbsp;|&nbsp;<a href="../index.php">Sair</a>
	<table border="1">
		<tr>
			<th colspan="5">Pedidos</th>
		</tr>
		<tr>
			<th>Valor Total</th>
			<th>Valor Recalculado</th>						
			<th>Quantidade de Parcelas</th>
			<th>Forma de Pagamento</th>
			<th>Excluir</th>
		</tr>
		
		<?php
			//Listando os pedidos do cliente
			foreach($pedidos as $pedido){
				echo "<tr>";
				echo "<td>R$ ".number_format($pedido->getValorTotal(),2)."</td>";
				$valorTotalAlterado = $pedido->getValorTotal();
				if($pedido->getFormaPagto() == 1){
					$valorTotalAlterado += $pedido->getValorTotal()*0.03;
					$texto = "acrescido de 3%";
					$formaPgto = "Crédito";
				}else if($pedido->getFormaPagto() == 2){
					$valorTotalAlterado -= $pedido->getValorTotal()*0.05;
					$texto = "descontado 5%";
					$formaPgto = "Débito";
				}else{
					$valorTotalAlterado -= $pedido->getValorTotal()*0.1;
					$texto = "descontado 10%";
					$formaPgto = "À Vista";
				}
				echo "<td>R$ ".number_format($valorTotalAlterado,2)." - ".$texto."</td>";
				echo "<td>".$pedido->getQtdParcelas()."</td>";
				echo "<td>".$formaPgto."</td>";
				echo "<td><a href='#' onclick='confirmaExclusao(".$pedido->getId().")'>E</a></td>";
				echo "</tr>";	
			}			
		?>
	</table>	
</body>

</html>
