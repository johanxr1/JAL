<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
	session_start();

$iduser = $_SESSION['user_id'];

	$sql="SELECT  `address`, `tlf` FROM `users` 
	      WHERE `id` = '$iduser'";

	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		if ($respuesta->num_rows!= 0) {
			while($resp = mysqli_fetch_array($respuesta)){
				$r5[$count]['address'] = $resp['address'];
				$r5[$count]['tlf'] = $resp['tlf'];
				$_SESSION['user_addres'] = $r5[$count]['address'];
				$_SESSION['user_tlf'] = $r5[$count]['tlf'];
				echo $_SESSION['user_tlf'];
				echo $_SESSION['user_addres'];
			}
			mysqli_close($con->conectarse());
		}else{echo (false);}
	}else{echo ("error");}
//---------------------Informes--------------------

?>
