<?php
include("conexion.php");
if(isset($_POST["registrar"])){
    $nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
    $correo = mysqli_real_escape_string($conexion,$_POST['correo']);
    $usuario = mysqli_real_escape_string($conexion,$_POST['user']);
    $password = mysqli_real_escape_string($conexion,$_POST['pass']);
    $password_encriptada = sha1($password);
    $sqluser = "SELECT idusuarios FROM usuarios WHERE usuario='$usuario' ";
    $resultadouser = $conexion->query($sqluser);
    $filas = $resultadouser->num_rows;
    if($filas > 0){
        echo "<script>
        alert('El usuario ya existe')
        window.location = 'registrar.php'
        </script>";
    }else{
        $sqlusuario = "INSERT INTO usuarios(Nombre,Correo,Usuario,Password)
        VALUES ('$nombre','$correo','$usuario','$password_encriptada')" ;
        $resultadousuario = $conexion->query($sqlusuario);
        if ($resultadousuario > 0) {
           echo "<script>
            alert('Registro Exitoso')
            window.location = 'index.php'
            </script>";
        }
        else
        {
            echo "<script>
            alert('Error al registrar')
            window.location = 'registrar.php'
            </script>";
        }
    }
}
  ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registrar</title> 
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<link rel="stylesheet" href="estilos.css">
	

</head>  
<body>
  <div class="todo">  
   <div class="formulario">   
 <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" >   
    <h1>Registrarse</h1>
     <div class="contenedor">    
     <div class="input-contenedor">
         <i class="fas fa-user icon"></i>
         <input type="text" name="nombre" placeholder="Nombre Completo" required>
         
         </div>
         
         <div class="input-contenedor">
         <i class="fas fa-envelope icon"></i>
         <input type="text" name="correo" placeholder="Correo Electronico" required>
         
         </div>
          <div class="input-contenedor">
        <i class="fas fa-user-circle icon"></i>
              <input type="text"  name="user" placeholder="Usuario"  required />
          </div>
         <div class="input-contenedor">
        <i class="fas fa-key icon"></i>
         <input type="password" name ="pass" placeholder="Contraseña" required>
         </div>
         <button type="submit" name="registrar" class="button">
                        <span class="bigger-110">Registrar</span>
                    </button>
         <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
         <p>¿Ya tienes una cuenta?<a class="link" href="index.php">Iniciar Sesion</a></p>
     </div>
     
    </form>
    </div>
    <img class="pato" src="imagenes/pato.jpg" width="300px" height="583px"> </img>
     </div>
</body>
</html>