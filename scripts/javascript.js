function verificaOpcao(){
	var formaPgto = frmCadPedido.slcFormaPgto.value;
	if(formaPgto == 1){
		frmCadPedido.slcQtdParcelas.disabled = false;	
	}else{
		frmCadPedido.slcQtdParcelas.disabled = true;
		frmCadPedido.slcQtdParcelas.options[0].selected = true;
	}			
		
}	
