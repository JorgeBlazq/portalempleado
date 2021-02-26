<?php
session_start();
require_once("../controllers/controller_altaemp.php");
?>



<!DOCTYPE html>
<html>
<head>
	<title>Alta Empleado</title>
	<meta charset="utf-8" />
</head>
<body>
	<form action="../controllers/controller_altaemp.php" method="POST">
		<select id="departamento">
			<?php
			 foreach ($departamentos as $row) {
				echo "<option value='".$row['dept_no']."'>".$row['dept_name']."</option>";
			}  ?>
		</select>
		
		<label>Contraseña:</label><br>

		<input type="text" name="pass" / ><br>
		<input type="submit" name="iniciarSesion" value="Iniciar Sesión"/>
		
</body>
</html>