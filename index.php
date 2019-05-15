<?php
/*
 * index.php
 * 
 * Copyright 2019 Brunno <brunno@brunno-Vostro-5470>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */

?>
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
				<tr><td>Informe seu cpf:</td><td><input type="text" name="edtCpf" required="required" pattern="[0-9]+$"/></td></tr>
				<tr><td colspan="2"><input type="submit" value="Prosseguir"></td></tr>
			</table>			 
		</form>
	</fieldset>	
</body>

</html>
