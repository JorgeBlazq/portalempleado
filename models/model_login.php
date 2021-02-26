<?php
require_once("../db/db.php");//$conexion(PDO)

/*
Funcion checarInicioSesion
Parametros: Usuario y contraseña
funcion: conectarse a la bbdd y comprobar la existencia del usuario
devuelve: empno o null
Dev by Jorge Blazquez
*/
function checarInicioSesion($user, $pass){

	global $conexion;
	try{
	$stmt = $conexion->prepare("SELECT emp_no FROM employees WHERE emp_no = :username AND last_name = :password");
	$stmt->bindParam(":username", $user);
	$stmt->bindParam(":password", $pass);
	$stmt->execute();

	return $stmt->fetch(PDO::FETCH_ASSOC)["emp_no"];
	} catch (PDOException $ex) {
		return null;
	}
}
/*
Funcion iniciarSesion
Asi es, inicia sesion
Dev by Jorge Blazquez
*/
function iniciarSesion($id){
session_start();
$_SESSION['id']=$id;
$_SESSION['rrhh']=recursosHumanos($id);
}

/*
Funcion recursosHumanos
True o false dependiendo de su puesto
dev by Jorge Blazquez
*///d003
function recursosHumanos($id){
	global $conexion;

	$stmt= $conexion->prepare("SELECT dept_no FROM dept_emp WHERE emp_no = :id");
	$stmt->bindParam(":id",$id);
	$stmt->execute();
	if ($stmt->fetch(PDO::FETCH_ASSOC)['dept_no']=='d003'){
		return true;
	} else{
		return false;
	}
}





?>