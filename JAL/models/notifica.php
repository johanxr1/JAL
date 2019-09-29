<?php  

	include_once('../conexion/conexion.php');
	$con = new conectar();
	$con->conectarse();
	// session_start();
	// $email = $_REQUEST['emailUser'];
	// $pass = $_REQUEST['password'];
	$idUsuario = $_SESSION['user_id'];

	/*==========================================================================
	=            			 Consultando todas las notificaciones			   =
	==========================================================================*/

	// Mensajes
	$sSql = "SELECT SUM(nuevo) FROM mensaje WHERE mensaje.receptor = '$idUsuario' AND mensaje.nuevo = 1";
	

		if($result=mysqli_query($con->conectarse(), $sSql)){
			if ($row_cnt = mysqli_num_rows($result)) {
				foreach ($result as $dato) {
					//$idmensaje = $dato['idmensaje'];
					$nuevo = $dato['SUM(nuevo)'];
					}
		   			//$_SESSION['idmensaje'] = $idmensaje;
		   			$_SESSION['nuevo'] = $nuevo;
		   			//echo $_SESSION['nuevo'];

			     //    $resp['estado'] ='true';
				    // //$resp[0]['idmensaje'] = $idmensaje;
				    // $resp[0]['nuevo'] = $nuevo;
		}else{
		    $resp['estado'] ='false';
			$resp['Mensaje'] = "Error al hacer la consulta a la base de datos";	
		}
	}//
	// peticiones
	$sSql = "SELECT SUM(speti) FROM `peticiones` WHERE idr = '$idUsuario' AND speti = 1";
	

		if($result=mysqli_query($con->conectarse(), $sSql)){
			if ($row_cnt = mysqli_num_rows($result)) {
				foreach ($result as $dato) {
					//$idp = $dato['idp'];
					$ide = $dato['SUM(speti)'];
					}
		   			//$_SESSION['idp'] = $idp;
		   			$_SESSION['ide'] = $ide;

			     //    $resp['estado'] ='true';
				    // $resp[0]['idp'] = $idp;
				    // $resp[0]['ide'] = $ide;
		}else{
		    $resp['estado'] ='false';
			$resp['Mensaje'] = "Error al hacer la consulta a la base de datos";	
		}
	}
 ?>