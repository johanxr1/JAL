<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
    $count1=0; 
//---------------------Informes--------------------

	if(isset($_REQUEST['iduser1'])){
		$idusere=$_REQUEST['iduser1'];
		/*$sql="SELECT `id` FROM `users` 
	      WHERE `name` LIKE '$iduser1'";

	if($respuesta = mysqli_query($con->conectarse(), $sql)){
			if($resp = mysqli_fetch_array($respuesta)){
				$idusere=$resp;
				//echo $resp;
		}
	}*/




	$sql1="SELECT `idevento`, `lat`, `lng`, `tileX`, `tileY`, `address`, `reference`, `startDate`, `endDate`, `startHour`, `endHour`, `typeEvent`, `description`, `users_id` FROM `eventos` 
	      WHERE `address` LIKE '%$idusere%'";

	if($respuesta1 = mysqli_query($con->conectarse(), $sql1)){
		if ($respuesta1->num_rows!= 0) {
			while($resp1 = mysqli_fetch_array($respuesta1)){
				$r1[$count1]['idevento'] = $resp1['idevento'];
				$r1[$count1]['lat'] = $resp1['lat'];
				$r1[$count1]['lng'] = $resp1['lng'];
				$r1[$count1]['tileX'] = $resp1['tileX'];
				$r1[$count1]['tileY'] = $resp1['tileY'];
				$r1[$count1]['address'] = $resp1['address'];
				$r1[$count1]['reference'] = $resp1['reference'];
				$r1[$count1]['startDate'] = $resp1['startDate'];
				$r1[$count1]['endDate'] = $resp1['endDate'];
				$r1[$count1]['startHour'] = $resp1['startHour'];
				$r1[$count1]['endHour'] = $resp1['endHour'];
				$r1[$count1]['typeEvent'] = $resp1['typeEvent'];
				$r1[$count1]['description'] = $resp1['description'];
				$r1[$count1]['users_id'] = $resp1['users_id'];			
				$count1++;
			}
				mysqli_close($con->conectarse());
			$r1 = json_encode($r1);
			echo $r1;			
		}else{echo $r1 = false;}
	}else{

		echo ("error");
	}


}//if
?>
