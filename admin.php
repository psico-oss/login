<?php 
include("conexion.php");
session_start();
if (!isset($_SESSION['id_usuario'])) {
	header("Location: index.php");
}
$iduser=$_SESSION['id_usuario'];
$sql="SELECT idusuarios, Nombre FROM usuarios WHERE idusuarios='$iduser' ";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="estilos.css">
	<title>Inicio</title>
</head>
<body>
	<div class="barra">
			<div class="boton">
			<a  href="salir.php"> <- Salir</a>
			</div>

			<div class="imagen">
			<img class="img" src="imagenes/img.png" alt="cargando...">
			</div>

		</div>
	<div class="contenedor">

		<div class="texto">

			<h2>
				Bienvenido,<?php
				echo utf8_decode($row['Nombre']); ?> ! 
				</h2>
				<h2>
				¡¡Gracias por registrarse!!
			</h2>

		
		</div>
	</div>
	
</body>
</html>