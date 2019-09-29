<?php  

	include_once('../conexion/conexion.php');
	$con = new conectar();
	$con->conectarse();


	$email = $_REQUEST['emailUser'];
	$pass = $_REQUEST['password'];

	/*==========================================================================
	=            			 TRABAJANDO PASSWORD          					   =
	==========================================================================*/

	// Extraemos el hash de la base de datos
	$sSql = "SELECT users.id AS idUsuario,address,tlf,name,social_id,service, imgUrl,tipo,estatus FROM users 
			INNER JOIN users_social ON users.id =users_social.users_id 
			WHERE users.email ='$email' 
			AND users_social.service='JAL'";
	

		if($result=mysqli_query($con->conectarse(), $sSql)){
			if ($row_cnt = mysqli_num_rows($result)) {
				foreach ($result as $dato) {
					$dbPass = $dato['social_id'];
					$idUsuario = $dato['idUsuario'];
					$name = $dato['name'];
					$user_img = $dato['imgUrl'];
					$user_address = $dato['address'];
					$user_tlf = $dato['tlf'];
					$user_tipo = $dato['tipo'];
					$user_estatus = $dato['estatus'];
					$user_log = 1;

				}
				// Recalculamos a ver si el hash coincide.
				if (substr(crypt($pass, $dbPass), 0, -15) == $dbPass){
			        session_start();
		   			$_SESSION['user_id'] = $idUsuario;
		   			$_SESSION['user_name'] = $name;
		   			$_SESSION['user_email'] = $email;
		   			$_SESSION['user_img'] = $user_img;
		   			$_SESSION['user_addres'] = $user_address;
		   			$_SESSION['user_tlf'] = $user_tlf;
		   			$_SESSION['user_tipo'] = $user_tipo;
		   			$_SESSION['user_estatus'] = $user_estatus;
		   			$_SESSION['user_log'] = $user_log;

			        $resp['estado'] ='true';
				    $resp[0]['user_id'] = $idUsuario;
				    $resp[0]['user_name'] = $name;
				    $resp[0]['user_email'] = $email;
				    $resp[0]['user_img'] = $user_img;
				    $resp[0]['user_addres'] = $user_address;
				    $resp[0]['user_tlf'] = $user_tlf;
				    $resp[0]['user_tipo'] = $user_tipo;
				    $resp[0]['user_estatus'] = $user_estatus;
				}else{
					$cal=substr(crypt($pass, $dbPass), 0, -15);
					$resp['estado'] ='false';
				   	$resp['Mensaje'] = "CLAVE INCORRECTA \n";
				}
			}else{
				$resp['estado'] ='false';
				$resp['Mensaje'] = "CORREO INCORRECTO";
			}
		}else{
		    $resp['estado'] ='false';
			$resp['Mensaje'] = "Error al hacer la consulta a la base de datos";	
		}
				
		mysqli_close($con->conectarse());

		$resp = json_encode($resp);

		echo $resp;	

 ?>