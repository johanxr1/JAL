<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
    $count2=0;   

	$idEvento=$_REQUEST['idEvento'];
	$denuncia=$_REQUEST['denuncia'];
	
	session_start(); 
    $idusuario = $_SESSION['user_id'];
	


	$sql="INSERT INTO `denuncias`(`idUsuario`, `denuncia`, `idEvento`) 
		VALUES ('$idusuario','$denuncia','$idEvento')";

	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		echo (true);
	}else{echo (false);}
?>