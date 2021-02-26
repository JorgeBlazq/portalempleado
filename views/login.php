<?php
session_start();
if (isset($_SESSION) && !empty($_SESSION) && isset($_SESSION['id']) && !empty($_SESSION['id'])){
	
	var_dump($_SESSION);

	//header("")//Llevarle a otro lao si la sesion esta iniciada
} else if (isset($_GET) && isset($_GET["logueao"])){
	$tried = $_GET['logueao'];//Si lo ha intentado y fallado se declara esta variable
}


?>



<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8" />
</head>
<body>
	<form action="../controllers/controller_login.php" method="POST">
		<label>Usuario:</label><br>
		<?php if (isset($tried) && $tried==1) {//Si lo ha intentado el usuario se mantiene escrito que ya lo hicimos la ultima vez y  queda bonico
			echo "<input type='text' name='user' value='".$usuario."'/ ><br>";//No se si puede pillar $usuario del controller espero que si jej
		} else{
		echo "<input type='text' name='user' / ><br>";
		}
		?>
		<label>Contraseña:</label><br>

		<input type="text" name="pass" / ><br>
		<input type="submit" name="iniciarSesion" value="Iniciar Sesión"/>
		<?php  if (isset($tried) && $tried<=1 && $tried>=0) {
			echo "Usuario o contraseña erroneos.";
		} ?>
</body>
</html>