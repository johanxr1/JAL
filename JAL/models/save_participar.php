<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
    $count2=0;   

	$idEvento=$_REQUEST['idEvento'];
	
	session_start(); 
    $idusuario = $_SESSION['user_id'];
	


	$sql="INSERT INTO `participaciones`(`idEvento`, `idUsuario`) 
		VALUES ('$idEvento','$idusuario')";

	if ($respuesta = mysqli_query($con->conectarse(), $sql)) {
		$resp=true;
	}else{
    	$resp=false;
	}

	$resp = json_encode($resp);
	echo $resp;
	
?>