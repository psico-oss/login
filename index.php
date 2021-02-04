<?php 
include("conexion.php");
session_start();
if (isset($_SESSION['id_usuario'])) {
	header("Location: admin.php");
}
//Login
if (!empty($_POST)) {
	$usuario = mysqli_real_escape_string($conexion, $_POST["user"]);
	$password = mysqli_real_escape_string($conexion, $_POST["pass"]);
	$password_encriptada = sha1($password);
	$sql = "SELECT idusuarios FROM usuarios WHERE usuario = '$usuario' AND password = '$password_encriptada' ";
	$resultado =$conexion->query($sql);
	$rows = $resultado->num_rows;
	if ($rows > 0) {
		$row = $resultado->fetch_assoc();
		$_SESSION['id_usuario'] = $row["idusuarios"];
		header("Location: admin.php");
	}
	else{
		echo "<script>
		alert('Usuario o Password Incorrecto');
		window.location = 'index.php';
		</script>";
	}
}
 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<link rel="stylesheet" href="estilos.css">
	<title>Inicio Sesion</title>
</head>
<body>
	<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" class="formularioi">
		<div class="contenedor">											
									
									<h1>Iniciar Sesion</h1>
									<div class="input-contenedor">
										<i class="fas fa-user-circle icon"></i>
													<label >

														<span>
															<input  type="text" class=".input-contenedor" name="user"placeholder="Usuario" required="" />
													
														</span>
													</label>
												</div>
													<div class="input-contenedor">
													<i class="fas fa-key icon"></i>
													<label>		
								 					<input  type="password" name="pass" placeholder="Contraseña" required="">
														</label>

															</div>

													
														<p> 
															<a href="#" class="lbl">¿Has olvidado tu contraseña?</a>
														</p>
												


											<button type="submit" name="ingresar" class="button">
												<span class="bigger-110">Ingresar</span>
											</button>

														
														<p>
															<span>¿No tienes usuario?</span>
															<a href="registrar.php">Registrate</a>
														
													</p>
												</div>

											</form>
</body>
</html>