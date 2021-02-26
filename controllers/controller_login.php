<?php
require_once("../views/login.php");

if (isset($_POST) && !empty($_POST) && isset($_POST["user"]) && isset($_POST["pass"])) {
	$usuario = $_POST["user"];
	$clave = $_POST["pass"];

require_once("../models/model_login.php");

	$idsesion = checarInicioSesion($usuario,$clave);

	if ($idsesion != null) {
		$logueao = iniciarSesion($idsesion);
	}
} else {
	$logueao = false;
}



//Pasamos $logueao por Get con un condicional, pasamos 1 o 0 en caso de true o false
header("Location: ../views/login.php?logueao=". ($logueao ? "1" : "0") );


?>