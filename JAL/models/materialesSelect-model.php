<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	session_start();
	$users_id=$_SESSION['user_id'];
	$count=0;
	$conn=$con->conectarse();


	$sql1="SELECT * FROM `materiales` WHERE 1";

	if ($r1 = mysqli_query($con->conectarse(),$sql1)) {

		while($resp = mysqli_fetch_array($r1)){
			$r[$count]['idmateriales'] = $resp['idmateriales'];
			$r[$count]['name'] = $resp['namem'];
			$count++;
		}
		$sqlDatos="SELECT `id` FROM `users` 
				   WHERE `address` IS NOT NULL AND `tlf` 
				   IS NOT NULL AND `id`='$users_id'";
		if ($r2 = mysqli_query($con->conectarse(),$sqlDatos)) {

			if (mysqli_num_rows($r2) != 0) {
				$r[$count]['datos'] = true;
			}else{
				$r[$count]['datos'] = false;
			}
		}
	}else{
		$resp['tipo'] = 'alert-danger';
		$resp['Mensaje'] = 'error al registrar evento';
	}

	mysqli_close($con->conectarse());

	$resp = json_encode($r);

	echo $resp;
?>
