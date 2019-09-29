<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
    $count2=0;   

	$idEvento=$_REQUEST['idEvento'];
	
	session_start(); 
    $idusuario = $_SESSION['user_id'];
	


	$sql="SELECT `idDenuncia` FROM `denuncias` 
		  WHERE `idUsuario`=$idusuario AND `idEvento`=$idEvento";

	$respuesta = mysqli_query($con->conectarse(), $sql);
	if ($row_cnt = mysqli_num_rows($respuesta)) {
		$resp='true';
	}else{
    	$resp='false';
	}

	$resp = json_encode($resp);
	echo $resp;
	
?>