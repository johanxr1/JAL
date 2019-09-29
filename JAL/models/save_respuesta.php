<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
    $count2=0;   

	$idPeticion=$_REQUEST['idPeticion'];
	$idPregunta=$_REQUEST['idPregunta'];
	$respuesta=$_REQUEST['respuesta'];
	session_start(); 
    $idusuario = $_SESSION['user_id'];
	


	$sql="INSERT INTO `respuestas`(`respuesta`, `idUsuario`, `idPregunta`) 
		VALUES ('$respuesta','$idusuario','$idPregunta')";

	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		echo (true);
	}else{echo (false);}
?>