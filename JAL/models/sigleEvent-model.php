<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
    $count2=0;
    $count3=0;

	$idevento=$_REQUEST['idevento'];
	session_start(); 
    $idusuario = $_SESSION['user_id'];	


	$sql="SELECT  *, eventos.address AS direccion FROM eventos 
		  INNER JOIN users_social ON eventos.users_id= users_social.users_id
		  INNER JOIN users ON users.id = users_social.users_id
		  WHERE idevento='$idevento'  GROUP by eventos.idevento";

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

			if ($r[0]['typeEvent'] ==='reciclaje') {

				$sql2="SELECT idmateriales, namem FROM `eventos_has_materiales` 
					   INNER JOIN materiales ON materiales.idmateriales=eventos_has_materiales.materiales_idmateriales 
					   WHERE `eventos_idevento`=$idevento";

				$respuesta2 = mysqli_query($con->conectarse(), $sql2);

				while($resp = mysqli_fetch_array($respuesta2)){
					$materiales[$count2]['idmateriales'] = $resp['idmateriales'];
					$materiales[$count2]['name'] = $resp['namem'];
					$count2++;
				}
				$r[$count]['materiales'] =$materiales;				
			}else{
				$r[$count]['materiales'] =false;
			}

			$sql3="SELECT `idDenuncia` FROM `denuncias` 
		 		 WHERE `idUsuario`=$idusuario AND `idEvento`=$idevento";
			$respuesta3 = mysqli_query($con->conectarse(), $sql3);
			if ($row_cnt = mysqli_num_rows($respuesta3)) {
				$r[$count]['denuncia'] =true;
			}else{
		    	$r[$count]['denuncia'] =false;
			}

			$sql4="SELECT `idParticipacion` FROM `participaciones` 
		 		 WHERE `idUsuario`=$idusuario AND `idEvento`=$idevento";
			$respuesta4 = mysqli_query($con->conectarse(), $sql4);
			if ($row_cnt = mysqli_num_rows($respuesta4)) {
				$r[$count]['participacion'] =true;
			}else{
		    	$r[$count]['participacion'] =false;
			}

			$sql5="SELECT `puntaje` FROM `calificaciones` 
				   WHERE `idEvento`=$idevento";

			$respuesta5 = mysqli_query($con->conectarse(), $sql5);
			if ($row_cnt = mysqli_num_rows($respuesta5)) {
				while($resp = mysqli_fetch_array($respuesta5)){
					$reputacion[$count3]['puntaje'] = $resp['puntaje'];
					$count3++;
				}
				$r[$count]['reputacion'] =$reputacion;
			}else{
		    	$r[$count]['reputacion'] =false;
			}

			
			$r = json_encode($r);
			echo $r;
		}else{echo (false);}
	}else{echo ("error");}
?>