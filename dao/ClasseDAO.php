<?php

require_once "ConnectionFactory.php";

class ClasseDAO{
	
	protected $conexao;
	
	public function __construct(){
		$this->conexao = ConnectionFactory::getConnectionFatory();
	}	
	
}	 

?>
