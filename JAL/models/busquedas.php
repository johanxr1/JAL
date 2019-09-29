<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
    $count1=0;
    $count2=0;
    $variable = $_REQUEST['iduser1'];

//---------------------Informes--------------------
	$sql="SELECT *,SUM(cantidad) from relacionum INNER JOIN users ON users.id = relacionum.idu INNER JOIN materiales ON materiales.idmateriales=relacionum.idma WHERE relacionum.idma = '$variable' GROUP BY relacionum.idu";

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
?>
