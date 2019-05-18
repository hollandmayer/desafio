function verificaOpcao(){
	var formaPgto = frmCadPedido.slcFormaPgto.value;
	if(formaPgto == 1){
		window.alert("O valor total do seu pedido sofrerá um acrescimo de 3%");
		frmCadPedido.slcQtdParcelas.disabled = false;	
	}else{
		if(formaPgto == 2){
			window.alert("O valor total do seu pedido sofrerá um desconto de 5%");
		}else{
			window.alert("O valor total do seu pedido sofrerá um desconto de 10%");
		}		
		frmCadPedido.slcQtdParcelas.disabled = true;
		frmCadPedido.slcQtdParcelas.options[0].selected = true;
	}		
}

function confirmaExclusao(idPedido){
	var resultado = window.confirm("Deseja realmente excluir o pedido?");
	if(resultado){
		window.location = "../logic/excluiPedidoLogic.php?idPedido="+idPedido;
	}
}	
