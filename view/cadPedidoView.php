<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Registro de Pedidos</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.32" />
	<script type="text/javascript" src="../scripts/javascript.js"></script>
</head>

<body>
	<h3>Registro de Pedidos - Cadastro de Pedido</h3>
	Cliente: <?=$_COOKIE["cpf"]." - ".$_COOKIE["nome"]?><br><br>
	<fieldset>
		<legend>Formul&aacute;rio de Cadastro</legend>
		<form method="post" action="../logic/cadPedidoLogic.php" name="frmCadPedido">
			<table>
				<tr><td>Valor Total:</td><td><input type="text" name="edtValorTotal" required="required"></td></tr>
				<tr><td>Forma de Pagamento:</td>
					<td>
						<select name="slcFormaPgto" onclick="verificaOpcao()">
							<option value="0">Selecione uma opção</option>
							<option value="1">Crédito</option>
							<option value="2">Débito</option>
							<option value="3">À Vista</option>
						</select>
					</td>
				</tr>
				<tr><td>Quantidade de Parcelas:</td><td><input type="text" name="edtQtdParcelas" required="required" disabled value="1"></td></tr>
				<tr><td colspan="2"><input type="submit" value="Prosseguir"></td></tr>
			</table>			 
		</form>	
	</fieldset>	
</body>

</html>
