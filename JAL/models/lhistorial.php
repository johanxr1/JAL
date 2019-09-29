<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
    $count1=0; 
	session_start();

$iduser = $_SESSION['user_id'];

	$sql="SELECT `idevento`, `lat`, `lng`, `tileX`, `tileY`, `address`, `reference`, `startDate`, `endDate`, `startHour`, `endHour`, `typeEvent`, `description`, `users_id` FROM `eventos` 
	      WHERE `users_id` = '$iduser'";

	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		if ($respuesta->num_rows!= 0) {
			while($resp = mysqli_fetch_array($respuesta)){
				$r[$count]['idevento'] = $resp['idevento'];
				$r[$count]['lat'] = $resp['lat'];
				$r[$count]['lng'] = $resp['lng'];
				$r[$count]['tileX'] = $resp['tileX'];
				$r[$count]['tileY'] = $resp['tileY'];
				$r[$count]['address'] = $resp['address'];
				$r[$count]['reference'] = $resp['reference'];
				$r[$count]['startDate'] = $resp['startDate'];
				$r[$count]['endDate'] = $resp['endDate'];
				$r[$count]['startHour'] = $resp['startHour'];
				$r[$count]['endHour'] = $resp['endHour'];
				$r[$count]['typeEvent'] = $resp['typeEvent'];
				$r[$count]['description'] = $resp['description'];
				$r[$count]['users_id'] = $resp['users_id'];			
				$count++;
			}
			mysqli_close($con->conectarse());
			$r = json_encode($r);
			echo $r;
		}else{echo (false);}
	}else{echo ("error");}
//---------------------Informes--------------------

?>
