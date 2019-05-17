<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Registro de Pedidos</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.32" />
</head>

<body>
	<h3>Registro de Pedidos - Cadastrar Cliente</h3>
	<fieldset>
		<legend>Formul&aacute;rio de Cadastro</legend>
		<form method="post" action="../logic/cadClienteLogic.php">
			<table>
				<tr><td>CPF:</td><td><?=$_COOKIE["cpf"]?></td></tr>
				<tr><td>Informe seu nome:</td><td><input type="text" name="edtNome" required="required" /></td></tr>
				<tr><td colspan="2"><input type="submit" value="Prosseguir"></td></tr>
			</table>			 
		</form>
	</fieldset>	
</body>

</html>
