<?php
	
	require_once __DIR__."/../model/Cliente.php";
	require_once __DIR__."/../dao/ClienteDAO.php"; 
	
	//Recebendo os dados
	$nome = $_POST["edtNome"];
	//Armazenando o nome em um cookie para uso futuro...
	setcookie("nome",$nome,0,"/desafio/");
	
	//Vai gravar o novo usuário no
	//banco e estando tudo ok irá 
	//redirecionar para a página
	//de cadastro de pedidos.
	$cliente = new Cliente();
	$cliente->setCpf($_COOKIE["cpf"]);
	$cliente->setNome($nome);
	$clienteDao = new ClienteDAO();
	if($clienteDao->incluir($cliente)){
		header("location:../view/listaPedidosView.php");
	}	

?>
