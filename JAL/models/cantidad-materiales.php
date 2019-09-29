<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $countp=0;
    $countpl=0;
    $countc=0;
    $counte=0;
    $countv=0;
    $count1=0; 
	session_start();
	$idusuario = $_REQUEST['user_id'];

	$sql="SELECT idmateriales,namem,idrmu,idma,idu,cantidad FROM `relacionum` INNER JOIN materiales ON materiales.idmateriales=relacionum.idma	WHERE relacionum.idu = '$idusuario'";

	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		if ($respuesta->num_rows!= 0) {
			while($resp = mysqli_fetch_array($respuesta)){
				$r3[$count1]['idmateriales'] = $resp['idmateriales'];
				$r3[$count1]['namem'] = $resp['namem'];
				$r3[$count1]['idrmu'] = $resp['idrmu'];
				$r3[$count1]['idma'] = $resp['idma'];
				$r3[$count1]['idu'] = $resp['idu'];
				$r3[$count1]['cantidad'] = $resp['cantidad'];
				$count1++;
			}
			for ($i=0; $i <$count1 ; $i++) { 
				if($r3[$i]['namem']=="Papel"){
					$countp = $countp + $r3[$i]['cantidad'];
				}
				if($r3[$i]['namem']=="Plastico"){
					$countpl = $countpl + $r3[$i]['cantidad'];
				}
				if($r3[$i]['namem']=="Carton"){
					$countc = $countc + $r3[$i]['cantidad'];
				}
				if($r3[$i]['namem']=="Electronicos"){
					$counte = $counte + $r3[$i]['cantidad'];
				}
				if($r3[$i]['namem']=="Vidrios"){
					$countv = $countv + $r3[$i]['cantidad'];
				}
			}
			$r[0]['namem']= "Papel";
			$r[0]['cantidad'] = $countp;
			$r[1]['namem']= "Plastico";
			$r[1]['cantidad'] = $countpl;
			$r[2]['namem']= "Carton";
			$r[2]['cantidad'] = $countc;
			$r[3]['namem']= "Electronicos";
			$r[3]['cantidad'] = $counte;
			$r[4]['namem']= "Vidrios";
			$r[4]['cantidad'] = $countv;
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