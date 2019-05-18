<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Registro de Pedidos</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.32" />
</head>

<body>
	<h3>Registro de Pedidos</h3>
	Para efetuar seu pedido preencha o formul&aacute;rio abaixo:<br><br>
	<fieldset>
		<legend>Formul&aacute;rio de Acesso</legend>
		<form method="post" action="logic/acessoLogic.php">
			<table>
				<tr><td>Informe seu cpf:</td><td><input type="text" name="edtCpf" required="required" pattern="[0-9]+$" placeholder="Digite apenas números" /></td></tr>
				<tr><td colspan="2"><input type="submit" value="Prosseguir"></td></tr>
			</table>			 
		</form>
	</fieldset>	
</body>

</html>
