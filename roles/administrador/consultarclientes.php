<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<title>JSJ Accesorios</title>
<style type="text/css">

</style>
</head>
<body><?php
session_start();
$usuario= $_SESSION['usuario'];
if ($usuario==""){
	header('Location: ..\..\index.php');
}else{
?>
<div id="container">
	<?php
		include "navbar.php";
	?>
	</div>
	<div class="container">
		<h3 class="text-center">Formulario para listar los Clientes</h3>
	</div>
	<div class="container">
		<form id="form1" name="form1" method="post" action=""> 
			<div class="form-group">
	</div>	
	<div class="form-group">
  	<label>Seleccione Cliente</label>
  	<select size="5" name="idcliente" class="form-control" required>
	<?php
	include "conectar.php";
	$clientes=mysql_query("select * from clientes ORDER BY nombrecliente ASC",$conectar);
	while($fila=mysql_fetch_array($clientes)){
    echo "<option value='".$fila['idcliente']."'>".$fila['nombrecliente']."</option>";
	}
	echo "</select>";
				?>
				</div>
	<input class="btn btn-success" type="submit" name="consultar" id="boton" value="Consultar"/></center>
	</div>
		</form>
		<div class="container">
		<table class="table table-striped table-responsive table-hover table-bordered text-center">
	<?php
if (isset($_REQUEST['consultar'])){
	$idcliente=$_REQUEST ["idcliente"];
	include "conectar.php";
		?>
		<h3 class="text-center">Informacion del Cliente</h3>
 <tr>
<td> <strong>Numero</strong> </td>
<td> <strong>Identificacion</strong> </td>
<td> <strong>Nombres</strong> </td>
<td> <strong>Telefono</strong> </td>
<td> <strong>Direccion CLiente</strong> </td>
<td> <strong>Tienda</strong> </td>

</tr> 
 <?php
 $num=0;
      $asig= mysql_query("Select * from clientes where idcliente=$idcliente" ,$conectar);
	While($concoti = mysql_fetch_array($asig)){
	$iden=$concoti ["idcliente"];
	$nom=$concoti["nombrecliente"];
	$tel=$concoti["telcliente"];
	$dir=$concoti["dircliente"];
	$idtienda=$concoti["idtienda"];
	$tienda= mysql_query("SELECT * FROM tiendas WHERE idtienda=$idtienda",$conectar);
	While($contienda = mysql_fetch_array($tienda)){
	$nomtienda=$contienda["nombretienda"];
	echo("<tr>");
	echo ("<td>".$num=$num+1);
	echo("<td> $iden</td>");
	echo("<td> $nom</td>");
	echo("<td> $tel</td>");
	echo("<td> $dir</td>");
	echo("<td> $nomtienda</td>");
	echo("</tr>");
	}
}
	?>
	</table>
	</div>
	<?php
}
}
	
include "footer.html";
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>