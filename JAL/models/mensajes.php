<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
    $count1=0; 
	session_start();
$iduser = $_SESSION['user_id'];

	$sql="SELECT idmensaje,name,emisor,mensaje,nuevo,fechae,tipo FROM `mensaje` INNER JOIN users ON users.id = mensaje.emisor WHERE `receptor` = '$iduser' ORDER BY idmensaje DESC";

	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		if ($respuesta->num_rows!= 0) {
			while($resp = mysqli_fetch_array($respuesta)){
				$r[$count]['idmensaje'] = $resp['idmensaje'];
				$r[$count]['name'] = $resp['name'];
				$r[$count]['tipo'] = $resp['tipo'];
				$r[$count]['emisor'] = $resp['emisor'];
				$r[$count]['mensaje'] = $resp['mensaje'];
				$r[$count]['nuevo'] = $resp['nuevo'];				
				$r[$count]['fechae'] = $resp['fechae'];
				if($resp['nuevo'] == 1){
				$count1++;
				}		
				$count++;
			}
			$_SESSION['user_noti']=$count1;
			mysqli_close($con->conectarse());
			$r = json_encode($r);
			echo $r;
		}else{echo (false);}
	}else{echo ("error");}
//---------------------Informes--------------------

?>
