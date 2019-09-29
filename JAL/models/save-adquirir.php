<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
    $count2=0;   

	$idPeticion=$_REQUEST['idPeticion'];
	$cantidad=$_REQUEST['cantidad'];
	session_start(); 
    $idusuario = $_SESSION['user_id'];
	$ide=$_REQUEST['ide'];
	$idma=$_REQUEST['idma'];

   
	$sql="UPDATE `peticiones` SET `speti`=4, `des`='$cantidad' 
			WHERE `idp` ='$idPeticion'";

	if ($respuesta = mysqli_query($con->conectarse(), $sql)) {
		$resp=true;

		// $sql2="INSERT INTO `relacionum`(`idma`, `idu`, `cantidad`) 
		// 		VALUES ('$idma','$ide','$cantidad')";
		// mysqli_query($con->conectarse(), $sql2);
	}else{
    	$resp=false;
	}

	$resp = json_encode($resp);
	echo $resp;
	
?>