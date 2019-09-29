<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
    $count2=0;   

	$idevento=$_REQUEST['idevento'];
	$comentario=$_REQUEST['comentario'];
	
	session_start(); 
    $idusuario = $_SESSION['user_id'];
	


	$sql="INSERT INTO `comentarios`(`comentario`, `eventos_idevento`, `idUsuario`) 
	VALUES ('$comentario','$idevento','$idusuario')";

	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		echo (true);
	}else{echo (false);}
?>