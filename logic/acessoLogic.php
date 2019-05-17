<?php
	
	require_once __DIR__."/../dao/ClienteDAO.php"; 
	
	//Recebendo os dados
	$cpf = $_POST["edtCpf"];
	
	//Vai procurar no banco para ver se 
	//já tem cliente cadastrado com esse 
	//cpf. Se tiver, já vai direto para
	//a tela de cadastrar pedido, se não
	//vai para a tela de cadastro de
	//cliente e em seguida para a tela
	//de cadastrar pedido.
	$clienteDao = new ClienteDAO();
	$cliente = $clienteDao->listarPorCpf($cpf);
	
	setcookie("cpf",$cpf,0,"/desafio/");	
	if($cliente == null){
		//Não há cliente cadastrado com o cpf informado
		//Encaminharemos para o cadastro de cliente		
		header("location:../view/cadClienteView.php");
	}else{
		//Há cliente cadastrado com o cpf informado
		//Encaminharemos para o cadastro de pedido
		header("location:../view/listaPedidosView.php");
	}		

?>
