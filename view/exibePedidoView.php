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

				<?php
					//Atualizando o valor total de acordo 
					//com a forma de pagamento escolhida:
					$valorTotal = $pedido->getValorTotal();
					switch($pedido->getFormaPagto()){	
						case 1 : $valorTotal += 0.03*$valorTotal;
								 $texto = " acrescimo de 3%";
								 break;
						case 2 : $valorTotal -= 0.05*$valorTotal;
								 $texto = " desconto de 5%";
								 break;
						case 3 : $valorTotal -= 0.1*$valorTotal;
								 $texto = " desconto de 10%";	
								 break;
					}
				?>
				<tr><td>Valor Total com <?=$texto?>:</td><td><?="R$ ".number_format($valorTotal,2) ?></td></tr>
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
				<tr><td>Parcelas:</td>
					<td>
						<?php
							//Para que a soma das parcelas corresponda exatamente ao valor total do pedido verificaremos se o valor
							//total da soma das parcelas é igual, maior ou menor que o valor total do pedido. Se for igual beleza,
							//nada a fazer. Se for menor, pegaremos a diferença e somaremos à primeira parcela. Se for maior deduziremos
							//da primeira parcela a diferença.
							$parcela = round($valorTotal/$pedido->getQtdParcelas(),2);
							$somaParcelas = $parcela*$pedido->getQtdParcelas();
							$diferenca = $valorTotal-$somaParcelas;
							
							echo "Parcela 1 - R$ ".number_format((round($valorTotal/$pedido->getQtdParcelas(),2)+$diferenca),2)."<br>";
							for($i = 2; $i <= $pedido->getQtdParcelas(); $i++){
								echo "Parcela ".$i." - R$ ".number_format((round($valorTotal/$pedido->getQtdParcelas(),2)),2)."<br>";	
							}						
						?>
					</td>
				</tr>
				<tr><td colspan="2"><a href="listaPedidosView.php">LISTAR PEDIDOS</a></td></tr>
			</table>
	</fieldset>	
</body>

</html>
