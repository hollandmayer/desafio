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
	}else{
		echo "<script>
				window.location = '../view/cadPedidoView.php';
				alert('Pedido não cadastrado! Consulte o administrador do sistema.');
			  </script>";
	}	

?>
