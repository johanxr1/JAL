<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
    $count2=0;   
    
	$idOperacion=$_REQUEST['idPeticion'];
	// $idOperacion=1;
	


	$sqlPreguntas="SELECT * FROM `preguntas`
					INNER JOIN users ON preguntas.idUsuario=users.id 
					INNER JOIN users_social ON users.id=users_social.users_id
					WHERE `idOperacion`='$idOperacion'";

	if($preguntas = mysqli_query($con->conectarse(), $sqlPreguntas)){
		if ($preguntas->num_rows!= 0) {
			while($resp = mysqli_fetch_array($preguntas)){
				$listPreguntas[$count]['idPregunta'] = $resp['idPregunta'];
				$listPreguntas[$count]['pregunta'] = $resp['pregunta'];
				$listPreguntas[$count]['idOperacion'] = $resp['idOperacion'];
				$listPreguntas[$count]['idUsuario'] = $resp['idUsuario'];
				$listPreguntas[$count]['datePregunta'] = $resp['datePregunta'];
				$listPreguntas[$count]['id'] = $resp['id'];
				$listPreguntas[$count]['name'] = $resp['name'];
				$listPreguntas[$count]['email'] = $resp['email'];
				$listPreguntas[$count]['address'] = $resp['address'];
				$listPreguntas[$count]['tlf'] = $resp['tlf'];
				$listPreguntas[$count]['users_id'] = $resp['id'];
				$listPreguntas[$count]['social_id'] = $resp['social_id'];
				$listPreguntas[$count]['service'] = $resp['service'];
				$listPreguntas[$count]['imgUrl'] = $resp['imgUrl'];					
				$count++;
			}
			$sqlRespuestas="SELECT * FROM `respuestas` 
							INNER JOIN users ON respuestas.idUsuario=users.id 
							INNER JOIN users_social ON users.id=users_social.users_id
							WHERE ";

			foreach($listPreguntas as $clave => $valor) {
				$sqlRespuestas.="(`idPregunta` = ".$valor['idPregunta'].") OR ";
			}
			$sqlRespuestas = substr($sqlRespuestas, 0, -4);			

			if($respuestas = mysqli_query($con->conectarse(), $sqlRespuestas)){
				if ($respuestas->num_rows!= 0) {
					while($resp = mysqli_fetch_array($respuestas)){
						$listRespuestas[$count2]['idRespuesta'] = $resp['idRespuesta'];
						$listRespuestas[$count2]['respuesta'] = $resp['respuesta'];
						$listRespuestas[$count2]['idUsuario'] = $resp['idUsuario'];
						$listRespuestas[$count2]['idPregunta'] = $resp['idPregunta'];
						$listRespuestas[$count2]['dateRespuesta'] = $resp['dateRespuesta'];
						$listRespuestas[$count2]['name'] = $resp['name'];
						$listRespuestas[$count2]['imgUrl'] = $resp['imgUrl'];				
						$count2++;
					}
					$flag['listPreguntas'] = true;
					$flag['listRespuestas'] = true;
					$r[0]=$flag;
					$r[1]=$listPreguntas;
					$r[2]=$listRespuestas;
					$r = json_encode($r);
					echo $r;
				}else{
					$flag['listPreguntas'] = true;
					$flag['listRespuestas'] = false;
					$r[0]=$flag;
					$r[1]=$listPreguntas;
					$r = json_encode($r);
					echo $r;
				}
			}else{
				$r=false;
				$r = json_encode($r);
				echo $r;
			}
		}else{
			$flag['listPreguntas'] = false;
			$flag['listRespuestas'] = false;
			$r[0]=$flag;
			$r = json_encode($r);
			echo $r;
		}
	}else{
		$r=false;
		$r = json_encode($r);
		echo $r;
	}
?>