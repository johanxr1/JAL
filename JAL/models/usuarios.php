<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0; 
//---------------------Informes--------------------
	$sql="SELECT * FROM `users`";

	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		if ($respuesta->num_rows!= 0) {
			while($resp = mysqli_fetch_array($respuesta)){
				$r[$count]['id'] = $resp['id'];
				$r[$count]['name'] = $resp['name'];
				$r[$count]['email'] = $resp['email'];
				$r[$count]['address'] = $resp['address'];
				$r[$count]['tlf'] = $resp['tlf'];
				$count++;
			}
				mysqli_close($con->conectarse());
			$r = json_encode($r);
			echo $r;
		}else{
			echo (false);
			 }
	}else{
		echo ("error");
	}
?>
