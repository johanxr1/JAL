<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
    $count2=0;
    $count3=0;

	$idOpera=$_REQUEST['idPeticion'];
	session_start(); 
    $idusuario = $_SESSION['user_id'];	

	/*------------------------------------------*/
	/*		PEDIMOS LA FILA DE LA PETICION 		*/
	/*------------------------------------------*/
	$sql="SELECT * FROM `peticiones`
		INNER JOIN  materiales ON peticiones.mat=materiales.idmateriales
		WHERE (`idp`=$idOpera AND `ide`=$idusuario)
		OR (`idp`=$idOpera AND `idr`=$idusuario)";

	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		if ($respuesta->num_rows!= 0) {
			while($resp = mysqli_fetch_array($respuesta)){
				$r['idp'] = $resp['idp'];//id operacion
				$r['ide'] = $resp['ide'];//id emisor o lider
				$r['idr'] = $resp['idr'];//id receptor o patrocinador
				$r['fecha'] = $resp['fecha'];
				$r['des'] = $resp['des'];//cantidad
				$r['speti'] = $resp['speti'];//status peticion
				$r['namem'] = $resp['namem'];//tipo material
				$r['mat'] = $resp['mat'];//tipo material
			}
			$contenedor['peticion']=$r;//ENVIO LA FILA PETICION
			if ($r['ide']!=$idusuario) {
				$tipoVisitante='comprador';
			}else{
				$tipoVisitante='vendedor';
			}
			$contenedor['tipoVisitante']=$tipoVisitante;

			/*------------------------------------------*/
			/*		PIDO DATOS DEL VENDEDOR 	 		*/
			/*------------------------------------------*/
			$idVendedor=$r['ide'];
			$sql2="SELECT * FROM `users` 
						INNER JOIN users_social ON users.id=users_social.users_id
						WHERE users.id= '$idVendedor'";
			if($respuesta = mysqli_query($con->conectarse(), $sql2)){
				if ($respuesta->num_rows!= 0) {
					while($resp = mysqli_fetch_array($respuesta)){
						$r2['name'] = $resp['name'];
						$r2['idVendedor'] = $idVendedor;
						$r2['email'] = $resp['email'];
						$r2['address'] = $resp['address'];
						$r2['tlf'] = $resp['tlf'];
						$r2['tipo'] = $resp['tipo'];
						$r2['imgUrl'] = $resp['imgUrl'];
					}					
				}
			}
			$contenedor['vendedor']=$r2;//ENVIO LOS DATOS DEL VENDEDOR


			/*------------------------------------------*/
			/*	PIDO LAS CALIFICACIONES DEL VENDEDOR 	*/
			/*------------------------------------------*/
			$sql3="SELECT `puntaje` FROM `calificaciones` 
					INNER JOIN eventos ON calificaciones.idEvento=eventos.idevento
					WHERE eventos.users_id='$idVendedor'";
			if($respuesta = mysqli_query($con->conectarse(), $sql3)){
				if ($respuesta->num_rows!= 0) {
					while($resp = mysqli_fetch_array($respuesta)){
						$r2[$count]['puntaje'] = $resp['puntaje'];
						$count++;
					}
					$contenedor['reputacion']=$r2;//ENVIO REPUTACION				
				}else{
					$contenedor['reputacion']=false;//ENVIO REPUTACION						
				}
			}

			/*------------------------------------------*/
			/*			PEDIMOS LAS PREGUNTAS 			*/
			/*------------------------------------------*/
			$sql4="SELECT * FROM `preguntas`
					INNER JOIN users ON preguntas.idUsuario=users.id 
					INNER JOIN users_social ON users.id=users_social.users_id
					WHERE `idOperacion`='$idOpera'";
			if($preguntas = mysqli_query($con->conectarse(), $sql4)){
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

					/*------------------------------------------*/
					/*			PEDIMOS LAS PREGUNTAS 			*/
					/*------------------------------------------*/
					$sqlRespuestas="SELECT * FROM `respuestas` WHERE ";
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
								$count2++;
							}
							$contenedor['respuestas']=$listRespuestas;//ENVIO LAS RESPUESTAS	
						}
					}				
				}else{
					$contenedor['preguntas']=false;
					$contenedor['respuestas']=false;						
				}

			}
			$r = json_encode($contenedor);
			echo $r;
		}else{echo (false);}
	}else{echo ("error");}
?>