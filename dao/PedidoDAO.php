<?php

require_once "ClasseDAO.php";
require_once "InterfaceDAO.php";
require_once "ClienteDAO.php";

require_once __DIR__."/../model/Pedido.php";

class PedidoDAO extends ClasseDAO implements InterfaceDAO{

	public function incluir($param){
		try{
			$stmt = $this->conexao->prepare("insert into pedidos (valorTotal, qtdParcelas, formaPagto, localIpCadPedido, cliente) values (:valorTotal, :qtdParcelas, :formaPagto, :localIpCadPedido, :cliente)");
			$stmt->bindValue(":valorTotal",$param->getValorTotal());
			$stmt->bindValue(":qtdParcelas",$param->getQtdParcelas());
			$stmt->bindValue(":formaPagto",$param->getFormaPagto());
			$stmt->bindValue(":localIpCadPedido",$param->getLocalIpCadPedido());
			$stmt->bindValue(":cliente",$param->getCliente()->getId());
			return $stmt->execute();
		}catch(PDOException $e){
			echo $e->getMessage();		
		}	
	}
	
	public function excluir($param){
		try{
			$stmt = $this->conexao->prepare("delete from pedidos where id = :id");
			$stmt->bindValue(":id",$param->getId());
			return $stmt->execute();	
		}catch(PDOExcepetion $e){
			echo $e->getMessage();	
		}
	}		
			
	public function atualizar($param){
		try{
			$stmt = $this->conexao->prepare("update pedidos set valorTotal = :valorTotal, qtdParcelas = :qtdParcelas, formaPagto = :formaPagto, localIpCadPedido  = :localIpCadPedido, cliente = :cliente where id = :id");
			$stmt->bindValue(":valorTotal",$param->getValorTotal());
			$stmt->bindValue(":qtdParcelas",$param->getQtdParcelas());
			$stmt->bindValue(":formaPagto",$param->getFormaPagto());
			$stmt->bindValue(":localIpCadPedido",$param->getLocalIpCadPedido());
			$stmt->bindValue(":cliente",$param->getCliente()->getId());
			$stmt->bindValue(":id",$param->getId());
			return $stmt->execute();
		}catch(PDOExcepetion $e){
			echo $e->getMessage();	
		}
	}
	
	public function listar(){
		try{
			$stmt = $this->conexao->query("select * from pedidos");
			$pedidos = array();
			$i = 0;
			while($row = $stmt->fetch()){
				$pedido = new Pedido();
				$pedido->setId($row["id"]);
				$pedido->setValorTotal($row["valorTotal"]);
				$pedido->setQtdParcelas($row["qtdParcelas"]);
				$pedido->setFormaPagto($row["formaPagto"]);
				$pedido->setLocalIpCadPedido($row["localIpCadPedido"]);
				
				//Buscando o cliente do pedido
				$clienteDao = new ClienteDAO();
				$pedido->setCliente($clienteDao->listarPorId($row["cliente"]));
				
				$pedidos[$i] = $pedido;
				$i++;					
			}
			return $pedidos;		
		}catch(PDOExcepetion $e){
			echo $e->getMessage();	
		}
	}
	
	public function listarPorCliente($cliente){
		try{
			$stmt = $this->conexao->prepare("select * from pedidos where cliente = :cliente");
			$stmt->bindValue(":cliente",$cliente->getId());
			$stmt->execute();
			$pedidos = array();
			$i = 0;
			while($row = $stmt->fetch()){
				$pedido = new Pedido();
				$pedido->setId($row["id"]);
				$pedido->setValorTotal($row["valorTotal"]);
				$pedido->setQtdParcelas($row["qtdParcelas"]);
				$pedido->setFormaPagto($row["formaPagto"]);
				$pedido->setLocalIpCadPedido($row["localIpCadPedido"]);
				
				//Buscando o cliente do pedido
				$clienteDao = new ClienteDAO();
				$pedido->setCliente($clienteDao->listarPorId($row["cliente"]));
				
				$pedidos[$i] = $pedido;
				$i++;					
			}
			return $pedidos;			
		}catch(PDOException $e){
			echo $e->getMessage();	
		}			
	}					
	
}	

?>

