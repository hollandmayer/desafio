<?php

class Pedido{
	
	private $id;
	private $valorTotal;
	private $qtdParcelas;
	private $formaPagto;
	private $localIpCadPedido;
	private $cliente;
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setValorTotal($valorTotal){
		$this->valorTotal = $valorTotal;	
	}
	
	public function getValorTotal(){
		return $this->valorTotal;			
	}
	
	public function setQtdParcelas($qtdParcelas){
		$this->qtdParcelas = $qtdParcelas;	
	}
	
	public function getQtdParcelas(){
		return $this->qtdParcelas;			
	}
	
	public function setFormaPagto($formaPagto){
		$this->formaPagto = $formaPagto;	
	}
	
	public function getFormaPagto(){
		return $this->formaPagto;			
	}
	
	public function setLocalIpCadPedido($localIpCadPedido){
		$this->localIpCadPedido = $localIpCadPedido;
	}	
	
	public function getLocalIpCadPedido(){
		return $this->localIpCadPedido;
	}
	
	//Recebe um objeto do tipo cliente
	public function setCliente($cliente){
		$this->cliente = $cliente;
	}
	
	//Retorna um objeto do tipo cliente
	public function getCliente(){
		return $this->cliente;
	}			
		
}	

?>
