<?php

	require_once __DIR__."/../dao/ClienteDAO.php";
	require_once __DIR__."/../dao/PedidoDAO.php";
	require_once __DIR__."/../model/Pedido.php";
	require_once __DIR__."/../auxiliary/Localizador.php";
	
	//Recebendo os dados
	$valorTotal = $_POST["edtValorTotal"];
	$formaPgto = $_POST["slcFormaPgto"];
	$qtdParcelas = isset($_POST["slcQtdParcelas"])?$_POST["slcQtdParcelas"]:1;
	
	//Pegando o cliente que está realizando o pedido
	$clienteDao = new ClienteDAO();
	$cliente = $clienteDao->listarPorCpf($_COOKIE["cpf"]);	
	
	//Pegando a localização de quem está realizando o pedido
	$localizador = new Localizador();
	$localizador->setConfiguracao("69a1f47b492e44c38a4f2b74b675d943","en","*","");
	$local = $localizador->getGeolocalizacao();
	$decodLocal = json_decode($local, true);
	//Montando a string que será gravada no banco...
	$localIpCadPedido = $decodLocal["continent_name"]." - ".
						$decodLocal["country_name"]." - ".
						$decodLocal["state_prov"]." - ".
						$decodLocal["city"]." - ".
						$decodLocal["zipcode"];
		
	//Atualizando o valor total de acordo 
	//com a forma de pagamento escolhida:
	switch($formaPgto){	
		case 1 : $valorTotal += 0.03*$valorTotal;
				 break;
		case 2 : $valorTotal -= 0.05*$valorTotal;
				 break;
		case 3 : $valorTotal -= 0.1*$valorTotal;
				 break;
	}
	
	//Gravando efetivamento:
	//Gerando um pedido
	$pedido = new Pedido();
	$pedido->setValorTotal($valorTotal);
	$pedido->setQtdParcelas($qtdParcelas);
	$pedido->setFormaPagto($formaPgto);
	$pedido->setLocalIpCadPedido($localIpCadPedido);
	$pedido->setCliente($cliente);		
	$pedidoDao = new PedidoDAO();
	if($pedidoDao->incluir($pedido)){		
		header("location:../view/exibePedidoView.php");
	}	

?>
