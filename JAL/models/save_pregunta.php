<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
    $count2=0;   

	$idPeticion=$_REQUEST['idPeticion'];
	$pregunta=$_REQUEST['pregunta'];
	
	session_start(); 
    $idusuario = $_SESSION['user_id'];
	


	$sql="INSERT INTO `preguntas`(`pregunta`, `idOperacion`, `idUsuario`) 
			VALUES ('$pregunta','$idPeticion','$idusuario')";

	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		echo (true);
	}else{echo (false);}
?>