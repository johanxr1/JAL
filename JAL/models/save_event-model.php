<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	session_start();
	$conn=$con->conectarse();

	$latLng=$_REQUEST['geoPicked']['latLng'];
	$tileCoordinate=$_REQUEST['geoPicked']['tileCoordinate'];
	$address=$_REQUEST['address'];
	$referencia=$_REQUEST['referencia'];			
	$startDate=$_REQUEST['startDate'];
	$endDate=$_REQUEST['endDate'];
	$startHour=$_REQUEST['startHour'];
	$endHour=$_REQUEST['endHour'];
	$typeEvent=$_REQUEST['typeEvent'];
	$description=$_REQUEST['description'];
	$users_id=$_SESSION['user_id'];


	$sql1="INSERT INTO `eventos`(`lat`, `lng`, `tileX`, `tileY`, `address`, `reference`, `startDate`, `endDate`,`startHour`, `endHour`, `typeEvent`, `description`, `users_id`) 
			VALUES ('".$latLng["lat"]."','".$latLng["lng"]."',
					'".$tileCoordinate['x']."','".$tileCoordinate['y']."',
					'$address','$referencia','$startDate','$endDate',
					'$startHour','$endHour','$typeEvent','$description','$users_id')";

	if ($r1 = mysqli_query($con->conectarse(),$sql1)) {
		$sSqlId = "SELECT MAX(idevento) as `id` FROM `eventos`";
		$respuesta = mysqli_query($con->conectarse(), $sSqlId);
		foreach ($respuesta as $resp) {
			$idEvento = $resp['id'];
		}
		$resp['idEvento'] = $idEvento;
		if (isset($_REQUEST['typeMaterials'])) {
			$typeMaterials=json_decode(stripslashes($_REQUEST['typeMaterials']));
			$sql2="INSERT INTO `eventos_has_materiales`(`eventos_idevento`, `eventos_users_id`, `materiales_idmateriales`) VALUES ";
			
			for ($i=0; $i<count($typeMaterials) ; $i++) { 
				$sql2 .= "('$idEvento','$users_id','".$typeMaterials[$i]."'),";
			}

			$sql2 = substr($sql2, 0, -1);
			if ($respuesta2 = mysqli_query($con->conectarse(), $sql2)) {
				$resp['tipo'] = 'alert-success';
				$resp['Mensaje'] = 'Se ha registrado el evento satisfactoriamente';
			} else {
				$resp['tipo'] = 'alert-danger';
				$resp['Mensaje'] = 'error al registrar evento';
			}
	
			if(isset($_REQUEST['tlfContacto']) && isset($_REQUEST['addressContacto'])) {
				$tlfContacto=$_REQUEST['tlfContacto'];
				$addressContacto=$_REQUEST['addressContacto'];
				$sql3="UPDATE `users` SET `address`='$addressContacto',`tlf`='$tlfContacto' WHERE `id`='$users_id'";
				if (mysqli_query($con->conectarse(),$sql3)) {
					$resp['tipo'] = 'alert-success';
					$resp['Mensaje'] = 'Se ha registrado el evento satisfactoriamente';
				}else{
					$resp['tipo'] = 'alert-danger';
					$resp['Mensaje'] = 'Hubo un error al registrar los datos de contacto, pero su evento fue guardado satisfactoriamente';
				}
			}else{
				$resp['tipo'] = 'alert-success';
				$resp['Mensaje'] = 'Se ha registrado el evento satisfactoriamente';
			}
		}else{
			if(isset($_REQUEST['tlfContacto']) && isset($_REQUEST['addressContacto'])) {
				$tlfContacto=$_REQUEST['tlfContacto'];
				$addressContacto=$_REQUEST['addressContacto'];
				$sql3="UPDATE `users` SET `address`='$addressContacto',`tlf`='$tlfContacto' WHERE `id`='$users_id'";
				if (mysqli_query($con->conectarse(),$sql3)) {
					$resp['tipo'] = 'alert-success';
					$resp['Mensaje'] = 'Se ha registrado el evento satisfactoriamente';
				}else{
					$resp['tipo'] = 'alert-danger';
					$resp['Mensaje'] = 'Hubo un error al registrar los datos de contacto, pero su evento fue guardado satisfactoriamente';
				}
			}else{
				$resp['tipo'] = 'alert-success';
				$resp['Mensaje'] = 'Se ha registrado el evento satisfactoriamente';
			}
		}
	}else{
		$resp['tipo'] = 'alert-danger';
		$resp['Mensaje'] = 'error al registrar evento';
	}

	mysqli_close($con->conectarse());

	$resp = json_encode($resp);

	echo $resp;
?>
