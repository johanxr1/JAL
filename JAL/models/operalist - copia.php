<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0; 
	session_start();
$idusuario = $_SESSION['user_id'];
//---------------------Informes--------------------
	$sql="SELECT mat,idp,fecha,des,speti,address,name,email,tlf FROM peticiones INNER JOIN users ON users.id=peticiones.ide where peticiones.ide = '$idusuario'";

	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		if ($respuesta->num_rows!= 0) {
			while($resp = mysqli_fetch_array($respuesta)){
				$r[$count]['fecha'] = $resp['fecha'];
				$r[$count]['idp'] = $resp['idp'];
				$r[$count]['des'] = $resp['des'];
				$r[$count]['speti'] = $resp['speti'];
				$r[$count]['mat'] = $resp['mat'];
				$r[$count]['address'] = $resp['address'];
				$r[$count]['name'] = $resp['name'];
				$r[$count]['email'] = $resp['email'];
				$r[$count]['tlf'] = $resp['tlf'];
				
				if($r[$count]['mat']==1){
					$r[$count]['material'] = "Papeles";
				}
				if($r[$count]['mat']==2){
					$r[$count]['material'] = "Plasticos";
				}
				if($r[$count]['mat']==3){
					$r[$count]['material'] = "Cartones";
				}
				if($r[$count]['mat']==4){
					$r[$count]['material'] = "Electronicos";
				}
				if($r[$count]['mat']==5){
					$r[$count]['material'] = "Vidrios";
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
?>
