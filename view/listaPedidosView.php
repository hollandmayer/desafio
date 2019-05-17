<?php
	
	require_once __DIR__."/../dao/PedidoDAO.php";
	require_once __DIR__."/../dao/ClienteDAO.php";
	
	//Buscando os pedidos do cliente que está acessando o programa
	
	//Pego o cliente do cpf informado
	$clienteDao = new ClienteDAO();
	$cliente = $clienteDao->listarPorCpf($_COOKIE["cpf"]);
	//Armazenando o nome em um cookie para uso futuro...
	setcookie("nome",$cliente->getNome(),0,"/desafio/");
	
	//Pego os pedidos do cliente
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
</head>

<body>
	<h3>Registro de Pedidos - Pedidos do Cliente</h3>
	Cliente: <?=$_COOKIE["cpf"]." - ".$cliente->getNome()?><br><br>
	<a href="cadPedidoView.php">CADASTRAR NOVO PEDIDO</a>
	<table border="1">
		<tr>
			<th colspan="4">Pedidos</th>
		</tr>
		<tr>
			<th>Valor Total</th>
			<th>Quantidade de Parcelas</th>
			<th>Forma de Pagamento</th>
			<th>Excluir</th>
		</tr>
		<?php
			//Listando os pedidos do cliente
			foreach($pedidos as $pedido){
				echo "<tr>";
				echo "<td>".$pedido->getValorTotal()."</td>";
				echo "<td>".$pedido->getQtdParcelas()."</td>";
				echo "<td>".$pedido->getFormaPagto()."</td>";
				echo "<td><a href=\"#\">E</a></td>";
				echo "</tr>";	
			}			
		?>
	</table>	
</body>

</html>
