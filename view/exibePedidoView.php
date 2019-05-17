<?php
	
	require_once __DIR__."/../dao/PedidoDAO.php";
	require_once __DIR__."/../dao/ClienteDAO.php";
	
	//Recuperando o ultimo pedido feito pelo cliente corrente para exibir.
	$clienteDao = new ClienteDAO();
	$cliente = $clienteDao->listarPorCpf($_COOKIE["cpf"]);
	$pedidoDao = new PedidoDAO();
	$pedido = $pedidoDao->listarUltimoRegistroInseridoPorCliente($cliente);
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
	<h3>Registro de Pedidos - Resumo do Pedido</h3>
	Cliente: <?=$_COOKIE["cpf"]." - ".$_COOKIE["nome"]?><br><br>
	<fieldset>
		<legend>Dados do Pedido:</legend>
			<table>
				<tr><td>Valor Total:</td><td><?="R$ ".number_format($pedido->getValorTotal(),2) ?></td></tr>
				<tr><td>Forma de Pagamento:</td>
					<td>
						<?php
							switch($pedido->getFormaPagto()){								
								case 1 : echo "Crédito";
										 break;
								case 2 : echo "Débito";
										 break;
								case 3 : echo "À Vista";
										 break;															
							}				
						?>
					</td>
				</tr>
				<tr><td>Quantidade de Parcelas:</td>
					<td>
						<?php
							switch($pedido->getFormaPagto()){								
								case 1 : echo $pedido->getQtdParcelas()." X de R$ ".number_format((round($pedido->getValorTotal()/$pedido->getQtdParcelas(),2)),2);
										 break;
								case 2 : echo "-";
										 break;
								case 3 : echo "-";
										 break;															
							}						
						?>
					</td>
				</tr>
				<tr><td colspan="2"><a href="listaPedidosView.php">NOVO PEDIDO</a></td></tr>
			</table>			 
		</form>	
	</fieldset>	
</body>

</html>
