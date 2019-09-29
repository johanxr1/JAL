<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
    $count2=0;
    $count3=0;



	$sql="SELECT * FROM `denuncias` 
		  INNER JOIN users ON users.id=denuncias.idUsuario
          WHERE 1";

	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		if ($respuesta->num_rows!= 0) {
			while($resp = mysqli_fetch_array($respuesta)){
				$r[$count]['idDenuncia'] = $resp['idDenuncia'];
				$r[$count]['idUsuario'] = $resp['idUsuario'];
				$r[$count]['denuncia'] = $resp['denuncia'];
				$r[$count]['idEvento'] = $resp['idEvento'];
				$r[$count]['statusDenuncia'] = $resp['statusDenuncia'];
				$r[$count]['name'] = $resp['name'];		
				$count++;
			}
			$r = json_encode($r);
			echo $r;
		}else{echo (false);}
	}else{var_dump($respuesta) ;}
?>