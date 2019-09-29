<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;   

	$requesTile=json_decode($_REQUEST['requesTile']);
	$sqlr="";

	foreach($requesTile as $clave => $valor) {
		$sqlr.="(`tileX`=".$valor->x." AND `tileY`=".$valor->y.") OR ";
	}
	$sqlr = substr($sqlr, 0, -3);
// SELECT  *, eventos.address AS direccion FROM eventos 
// 		  INNER JOIN users_social ON eventos.users_id= users_social.users_id
// 		  INNER JOIN users ON users.id = users_social.users_id
// 		  WHERE ((`tileX`=9861 AND `tileY`=15403) OR (`tileX`=9862 AND `tileY`=15403) OR (`tileX`=9863 AND `tileY`=15403) OR (`tileX`=9864 AND `tileY`=15403) OR (`tileX`=9865 AND `tileY`=15403) OR (`tileX`=9866 AND `tileY`=15403) OR (`tileX`=9861 AND `tileY`=15404) OR (`tileX`=9862 AND `tileY`=15404) OR (`tileX`=9863 AND `tileY`=15404) OR (`tileX`=9864 AND `tileY`=15404) OR (`tileX`=9865 AND `tileY`=15404) OR (`tileX`=9866 AND `tileY`=15404) OR (`tileX`=9861 AND `tileY`=15405) OR (`tileX`=9862 AND `tileY`=15405) OR (`tileX`=9863 AND `tileY`=15405) OR (`tileX`=9864 AND `tileY`=15405) OR (`tileX`=9865 AND `tileY`=15405) OR (`tileX`=9866 AND `tileY`=15405) OR (`tileX`=9861 AND `tileY`=15402) OR (`tileX`=9861 AND `tileY`=15403) OR (`tileX`=9861 AND `tileY`=15404) OR (`tileX`=9861 AND `tileY`=15405) OR (`tileX`=9862 AND `tileY`=15402) OR (`tileX`=9862 AND `tileY`=15403) OR (`tileX`=9862 AND `tileY`=15404) OR (`tileX`=9862 AND `tileY`=15405) OR (`tileX`=9863 AND `tileY`=15402) OR (`tileX`=9863 AND `tileY`=15403) OR (`tileX`=9863 AND `tileY`=15404) OR (`tileX`=9863 AND `tileY`=15405) OR (`tileX`=9864 AND `tileY`=15402) OR (`tileX`=9864 AND `tileY`=15403) OR (`tileX`=9864 AND `tileY`=15404) OR (`tileX`=9864 AND `tileY`=15405) ) AND CURDATE() <= `endDate` GROUP by eventos.idevento
	$sql="SELECT  *, eventos.address AS direccion FROM eventos 
		  INNER JOIN users_social ON eventos.users_id= users_social.users_id
		  INNER JOIN users ON users.id = users_social.users_id
		  WHERE ($sqlr) AND CURDATE() <= `endDate`  AND `statusEvento`=0 
		  GROUP by eventos.idevento";

	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		if ($respuesta->num_rows!= 0) {
			while($resp = mysqli_fetch_array($respuesta)){
				$r[$count]['idevento'] = $resp['idevento'];
				$r[$count]['lat'] = $resp['lat'];
				$r[$count]['lng'] = $resp['lng'];
				$r[$count]['tileX'] = $resp['tileX'];
				$r[$count]['tileY'] = $resp['tileY'];
				$r[$count]['address'] = $resp['direccion'];
				$r[$count]['reference'] = $resp['reference'];
				$r[$count]['startDate'] = $resp['startDate'];
				$r[$count]['endDate'] = $resp['endDate'];
				$r[$count]['startHour'] = $resp['startHour'];
				$r[$count]['endHour'] = $resp['endHour'];
				$r[$count]['typeEvent'] = $resp['typeEvent'];
				$r[$count]['description'] = $resp['description'];
				$r[$count]['name'] = $resp['name'];
				$r[$count]['imgUrl'] = $resp['imgUrl'];	
				$r[$count]['users_id'] = $resp['users_id'];			
				$count++;
			}
			$r = json_encode($r);
			echo $r;
		}else{echo (false);}
	}else{echo ("error");}
?>