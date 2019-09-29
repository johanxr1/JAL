<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
    $count1=0; 
	session_start();

$iduser = $_SESSION['user_id'];

	$sql="SELECT *, eventos.address AS direccion FROM eventos INNER JOIN users_social ON eventos.users_id= users_social.users_id INNER JOIN users ON users.id = users_social.users_id INNER JOIN participaciones ON participaciones.idEvento = eventos.idevento WHERE participaciones.idUsuario = 6 AND eventos.endDate >= CURRENT_DATE GROUP by eventos.idevento";

	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		if ($respuesta->num_rows != 0) {
			while($resp = mysqli_fetch_array($respuesta)){
				$ra[$count]['idevento'] = $resp['idevento'];
				$ra[$count]['lat'] = $resp['lat'];
				$ra[$count]['lng'] = $resp['lng'];
				$ra[$count]['tileX'] = $resp['tileX'];
				$ra[$count]['tileY'] = $resp['tileY'];
				$ra[$count]['address'] = $resp['direccion'];
				$ra[$count]['reference'] = $resp['reference'];
				$ra[$count]['startDate'] = $resp['startDate'];
				$ra[$count]['endDate'] = $resp['endDate'];
				$ra[$count]['startHour'] = $resp['startHour'];
				$ra[$count]['endHour'] = $resp['endHour'];
				$ra[$count]['typeEvent'] = $resp['typeEvent'];
				$ra[$count]['description'] = $resp['description'];
				$ra[$count]['name'] = $resp['name'];
				$ra[$count]['imgUrl'] = $resp['imgUrl'];	
				$ra[$count]['users_id'] = $resp['users_id'];				
				$count++;
			}
			$respf['ractivo'] = $ra;
			
		}else{$respf['ractivo'] = false;}
			$count =0;
			$sql1="SELECT *, eventos.address AS direccion FROM eventos INNER JOIN users_social ON eventos.users_id= users_social.users_id INNER JOIN users ON users.id = users_social.users_id INNER JOIN participaciones ON participaciones.idEvento = eventos.idevento WHERE participaciones.idUsuario = 6 AND eventos.endDate < CURRENT_DATE GROUP by eventos.idevento";
			if($respuesta1 = mysqli_query($con->conectarse(), $sql1)){
				if ($respuesta1->num_rows!= 0) {
					while($resp1 = mysqli_fetch_array($respuesta1)){
						$ri[$count]['idevento'] = $resp1['idevento'];
						$ri[$count]['lat'] = $resp1['lat'];
						$ri[$count]['lng'] = $resp1['lng'];
						$ri[$count]['tileX'] = $resp1['tileX'];
						$ri[$count]['tileY'] = $resp1['tileY'];
						$ri[$count]['address'] = $resp1['direccion'];
						$ri[$count]['reference'] = $resp1['reference'];
						$ri[$count]['startDate'] = $resp1['startDate'];
						$ri[$count]['endDate'] = $resp1['endDate'];
						$ri[$count]['startHour'] = $resp1['startHour'];
						$ri[$count]['endHour'] = $resp1['endHour'];
						$ri[$count]['typeEvent'] = $resp1['typeEvent'];
						$ri[$count]['description'] = $resp1['description'];
						$ri[$count]['name'] = $resp1['name'];
						$ri[$count]['imgUrl'] = $resp1['imgUrl'];	
						$ri[$count]['users_id'] = $resp1['users_id'];			
						$count++;
					}
					
					$respf['rinactivo'] = $ri;

				}else{$respf['rinactivo'] = false;}
			}else{echo ("error");}
	}else{echo ("error");}

	mysqli_close($con->conectarse());
			$respf = json_encode($respf);
			echo $respf;








		
//---------------------Informes--------------------

?>
