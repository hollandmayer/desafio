<?php

require_once "ClasseDAO.php";
require_once "InterfaceDAO.php";

require_once __DIR__."/../model/Cliente.php";

class ClienteDAO extends ClasseDAO implements InterfaceDAO{
	
	public function incluir($param){
		try{
			$stmt = $this->conexao->prepare("insert into clientes (nome, cpf) values (:nome, :cpf)");
			$stmt->bindValue(":nome",$param->getNome());
			$stmt->bindValue(":cpf",$param->getCpf());
			return $stmt->execute();
		}catch(PDOException $e){
			echo $e->getMessage();	
		}
	}
	
	public function excluir($param){
		try{
			$stmt = $this->conexao->prepare("delete from clientes where id = :id");
			$stmt->bindValue(":id",$param->getId());
			return $stmt->execute();	
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	
	public function atualizar($param){
		try{
			$stmt = $this->conexao->prepare("update clientes set nome = :nome, cpf = :cpf where id = :id");
			$stmt->bindValue(":nome",$param->getNome());
			$stmt->bindValue(":cpf",$param->getCpf());
			$stmt->bindValue(":id",$param->getId());
			return $stmt->execute();	
		}catch(PDOException $e){
			echo $e->getMessage();
		}			
	}
	
	public function listar(){
		try{
			$stmt = $this->conexao->query("select * from clientes");
			$clientes = array();
			$i = 0;
			while($row = $stmt->fetch()){
				$cliente = new Cliente();
				$cliente->setId($row["id"]);
				$cliente->setNome($row["nome"]);
				$cliente->setCpf($row["cpf"]);
				$clientes[$i] = $cliente;
				$i++;	
			}
			return $clientes;		
		}catch(PDOException $e){
			echo $e->getMessage();
		}			
	}	
	
	public function listarPorId($id){
		try{
			$stmt = $this->conexao->prepare("select * from clientes where id = :id");
			$stmt->bindParam(":id",$id);
			$stmt->execute();
			$row = $stmt->fetch();
			$cliente = new Cliente();
			$cliente->setId($row["id"]);
			$cliente->setNome($row["nome"]);
			$cliente->setCpf($row["cpf"]);
			return $cliente;					
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}			
}	

?>

