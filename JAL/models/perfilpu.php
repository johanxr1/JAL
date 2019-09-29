<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
    $count1=0;

    $idusuario=$_REQUEST["idusera"];
//---------------------Informes--------------------
	$sql="SELECT * FROM eventos WHERE eventos.users_id ='$idusuario'";

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
				$count++;
			}
		}
	}
$sql1="SELECT * FROM `users` INNER JOIN users_social ON users_social.users_id=users.id WHERE users.id ='$idusuario'";

	if($respuesta1 = mysqli_query($con->conectarse(), $sql1)){
		if ($respuesta1->num_rows!= 0) {
			while($resp1 = mysqli_fetch_array($respuesta1)){
				$r[$count1]['addres'] = $resp1['address'];
				$r[$count1]['tlf'] = $resp1['tlf'];
				$r[$count1]['name'] = $resp1['name'];
				$r[$count1]['email'] = $resp1['email'];
				$r[$count1]['imgUrl'] = $resp1['imgUrl'];
				$count1++;
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
	//header('Location: ../views/perfilpu.php');
	?>