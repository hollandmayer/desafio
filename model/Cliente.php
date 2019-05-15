<?php

class Cliente{
	
	private $id;
	private $nome;
	private $cpf;
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function getNome(){
		return $this->nome;
	}
	
	public function setCpf($cpf){
		$this->cpf = $cpf;
	}
	
	public function getCpf(){
		return $this->cpf;
	}						
}	

?>

