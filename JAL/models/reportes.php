<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
    $count1=0;
    $count2=0;
    $variable = $_REQUEST['iduser1'];

//---------------------Informes--------------------
    if($variable == 1){
		$sql="SELECT * FROM users";
    
	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		if ($respuesta->num_rows!= 0) {
			while($resp = mysqli_fetch_array($respuesta)){
				$r[$count]['id'] = $resp['id'];
				$r[$count]['name'] = $resp['name'];
				$r[$count]['email'] = $resp['email'];
				$r[$count]['address'] = $resp['address'];
				$r[$count]['tlf'] = $resp['tlf'];
				if($resp['tipo'] == 1 ){
				$r[$count]['tipo'] = "Participante";		
				}
				if($resp['tipo'] == 2){
				$r[$count]['tipo'] = "Lider";		
				}
				if($resp['tipo'] == 3){
				$r[$count]['tipo'] = "Patrocinador";		
				}
				if($resp['tipo'] == 4){
				$r[$count]['tipo'] = "Administrador";		
				}
				if($resp['estatus'] == 1 ){
				$r[$count]['estatus'] = "Activo";		
				}
				if($resp['estatus'] == 0){
				$r[$count]['estatus'] = "Inactivo";		
				}
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
}
    if($variable == 2){
		$sql="SELECT * FROM eventos INNER JOIN users ON users.id=eventos.users_id";    
	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		if ($respuesta->num_rows!= 0) {
			while($resp = mysqli_fetch_array($respuesta)){
				$r[$count]['idevento'] = $resp['idevento'];
				$r[$count]['name'] = $resp['typeEvent'];
				$r[$count]['typeEvent'] = $resp['typeEvent'];
				$r[$count]['address'] = $resp['address'];
				$r[$count]['name'] = $resp['name'];
				$r[$count]['startDate'] = $resp['startDate'];
				$r[$count]['endDate'] = $resp['endDate'];
				$r[$count]['reference'] = $resp['reference'];
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
}
    if($variable == 3){
		$sql="SELECT *,SUM(cantidad) from relacionum INNER JOIN users ON users.id = relacionum.idu INNER JOIN materiales ON materiales.idmateriales=relacionum.idma GROUP BY materiales.idmateriales";
	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		if ($respuesta->num_rows!= 0) {
			while($resp = mysqli_fetch_array($respuesta)){
				$r[$count]['idmateriales'] = $resp['idmateriales'];
				$r[$count]['namem'] = $resp['namem'];
				$r[$count]['cantidad'] = $resp['SUM(cantidad)'];
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
}
    if($variable == 4){
		$sql="SELECT mat,idp,fecha,des,speti,address,name,email,tlf FROM peticiones INNER JOIN users ON users.id=peticiones.ide";    
	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		if ($respuesta->num_rows!= 0) {
			while($resp = mysqli_fetch_array($respuesta)){
				$r[$count]['fecha'] = $resp['fecha'];
				$r[$count]['idp'] = $resp['idp'];
				$r[$count]['des'] = $resp['des'];
				$r[$count]['mat'] = $resp['mat'];
				$r[$count]['speti'] = $resp['speti'];
				$r[$count]['address'] = $resp['address'];
				$r[$count]['name'] = $resp['name'];
				$r[$count]['email'] = $resp['email'];
				$r[$count]['tlf'] = $resp['tlf'];
				
				if($r[$count]['mat'] == 1){
					$r[$count]['material'] = "Papeles";
				}
				if($r[$count]['mat'] ==2){
					$r[$count]['material'] = "Plasticos";
				}
				if($r[$count]['mat'] ==3){
					$r[$count]['material'] = "Cartones";
				}
				if($r[$count]['mat'] ==4){
					$r[$count]['material'] = "Electronicos";
				}
				if($r[$count]['mat'] ==5){
					$r[$count]['material'] = "Vidrios";
				}
				if($r[$count]['speti'] ==1){
					$r[$count]['spetic'] = "Espera";
				}
				if($r[$count]['speti'] ==2){
					$r[$count]['spetic'] = "Aceptado";
				}
				if($r[$count]['speti'] ==3){
					$r[$count]['spetic'] = "Negado";
				}
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
}
    if($variable == 5){
		$sql="SELECT * FROM mensaje INNER JOIN users ON users.id=mensaje.emisor ORDER BY fechae ASC";    
	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		if ($respuesta->num_rows!= 0) {
			while($resp = mysqli_fetch_array($respuesta)){
				$r[$count]['idmensaje'] = $resp['idmensaje'];
				$r[$count]['name'] = $resp['name'];
				$r[$count]['mensaje'] = $resp['mensaje'];
				$r[$count]['nuevo'] = $resp['nuevo'];
				$r[$count]['fechae'] = $resp['fechae'];
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
}
    if($variable == 6){
		$sql="SELECT *,SUM(cantidad) from relacionum INNER JOIN users ON users.id = relacionum.idu INNER JOIN materiales ON materiales.idmateriales=relacionum.idma GROUP BY relacionum.idma";
	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		if ($respuesta->num_rows!= 0) {
			while($resp = mysqli_fetch_array($respuesta)){
				$r[$count]['id'] = $resp['id'];
				$r[$count]['name'] = $resp['name'];
				$r[$count]['email'] = $resp['email'];
				$r[$count]['address'] = $resp['address'];
				$r[$count]['tlf'] = $resp['tlf'];
				$r[$count]['tipo'] = $resp['tipo'];
				$r[$count]['idrmu'] = $resp['idrmu'];
				$r[$count]['idma'] = $resp['idma'];
				$r[$count]['idu'] = $resp['idu'];
				$r[$count]['cantidad'] = $resp['SUM(cantidad)'];
				$r[$count]['idmateriales'] = $resp['idmateriales'];
				$r[$count]['namem'] = $resp['namem'];
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
}
    if($variable == 7){
		$sql="SELECT * FROM `denuncias` INNER JOIN users ON users.id= denuncias.idUsuario ORDER BY denuncias.idDenuncia ASC";    
	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		if ($respuesta->num_rows!= 0) {
			while($resp = mysqli_fetch_array($respuesta)){
				$r[$count]['idDenuncia'] = $resp['idDenuncia'];
				$r[$count]['denuncia'] = $resp['denuncia'];
				$r[$count]['statusDenuncia'] = $resp['statusDenuncia'];
				$r[$count]['name'] = $resp['name'];
				$r[$count]['idEvento'] = $resp['idEvento'];
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
}

?>
