<?php  

	include_once('../conexion/conexion.php');
	$con = new conectar();
	$con->conectarse();
	$db=$con->conectarse();

	$email = $_REQUEST['email'];


	/*==========================================================================
	=   					 TRABAJANDO PASSWORD          					   =
	==========================================================================*/
	if (isset($_REQUEST['recuperar'])) {
		// Extraemos el hash de la base de datos
		$sSql1 = "SELECT id, pregSeguriada1,respSeguriada1,pregSeguriada2,respSeguriada2 FROM `users` WHERE users.email='$email'";

		if($result1=mysqli_query($con->conectarse(), $sSql1)){
			if ($row_cnt = mysqli_num_rows($result1)) {
				$cont=0;
				foreach ($result1 as $dato) {
					$resp['pregunta1']=$dato['pregSeguriada1'];
					$resp['respuesta1']=$dato['respSeguriada1'];
					$resp['pregunta2']=$dato['pregSeguriada2'];
					$resp['respuesta2']=$dato['respSeguriada2'];
					$resp['id']=$dato['id'];
				}
				$resp1 = json_encode($resp);
				echo $resp1;
				die();
			}else{
		    	$resp='false';
		    	echo $resp;
			}
		}else{
			echo $result;
		}		
	}else{
		// Extraemos el hash de la base de datos
		$sSql = "SELECT users_social.service AS servi FROM `users_social` 
				INNER JOIN users ON users_social.users_id = users.id 
				WHERE users.email='$email'";

		if($result=mysqli_query($con->conectarse(), $sSql)){
			if ($row_cnt = mysqli_num_rows($result)) {
				$cont=0;
				foreach ($result as $dato) {
					$resp[$cont]['service'] = $dato['servi'];
					$cont++;
				}
			}else{
		    	$resp='false';
			}
		}else{
			echo $result;
		}		
		
		$resp = json_encode($resp);

		echo $resp;		
	}


 ?>