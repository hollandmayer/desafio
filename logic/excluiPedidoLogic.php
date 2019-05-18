<?php
	
	require_once __DIR__."/../dao/PedidoDAO.php";
	
	//Recebendo o id do pedido a ser excluído
	$idPedido = $_GET["idPedido"];
	
	//Excluindo...
	$pedidoDao = new PedidoDAO();
	
	if($pedidoDao->excluir($pedidoDao->listarPorId($idPedido))){
		echo "<script>
				window.location = '../view/listaPedidosView.php';
			  </script>";
	}else{
		echo "<script>
				window.location = '../view/listaPedidosView.php';
				alert('Pedido não excluído! Consulte o administrador do sistema.');
			  </script>";	
	}	  

?>
