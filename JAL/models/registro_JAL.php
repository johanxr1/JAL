<?php 
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$con->conectarse();


	$email = $_REQUEST['emailUser'];
	$pass = $_REQUEST['password'];
	$name = $_REQUEST['name'];
	$addr = $_REQUEST['addres'];
	$teleph = $_REQUEST['telephone'];

	/*=============================================================================
	=           			 TRABAJANDO PASSWORD          						  =
	=============================================================================*/
	// Generamos un salt aleatoreo, de 22 caracteres para Bcrypt
	$salt = substr(base64_encode(openssl_random_pseudo_bytes('30')), 0, 22);

	// A Crypt no le gustan los '+' así que los vamos a reemplazar por puntos.
	$salt = strtr($salt, array('+' => '.')); 

	/*Generamos el hash 
	  el $2y$ Indica que vamos a usar BlowFish.
	  el$10$ Indica el costo del cálculo. Puede ir de 04 a 31. Generalmente 10 puede ser un buen valor.*/
	$hash = crypt($pass, '$2y$10$' . $salt);


	/*=============================================================================
	=           			 INSERT EN LA TABLA CONJUNTOS          				 =
	=============================================================================*/
	$sSql = "INSERT INTO `users` (`name`, `address`, `tlf`, `email`,`tipo`,`estatus`) 
				VALUES ('$name', '$addr', '$teleph', '$email',1,1)";

	if(!mysqli_query($con->conectarse(), $sSql)){
		$resp['tipo'] = 'alert-danger';
		$resp['Mensaje'] = 'error al registrar el Usuario';
	}else{ 

		/*=============================================================================
		=            SE SELECCIONA EL ULTIMO CONJUNTO INSERTADO				          =
		=============================================================================*/
	
		$sSqlId = "SELECT MAX(id) as `id` FROM `users`";

		if($respuesta = mysqli_query($con->conectarse(), $sSqlId)){
			foreach ($respuesta as $resp) {
				$idUsuario = $resp['id'];
			}

			/*=============================================================================
			=                      INSERT EN LA TABLA USUARIOS 							  =
			=============================================================================*/
			
			$sSqlMas = "INSERT INTO `users_social` (`users_id`, `social_id`, `service`, `imgUrl`) 
						VALUES ('$idUsuario', '$hash', 'JAL','http://localhost/tesis/assets/img/default_profile_normal2.png');";

			if (mysqli_query($con->conectarse(), $sSqlMas)) {
		        session_start();
		        $_SESSION['user_estatus']="1";
		        $_SESSION['user_tipo']='1';
		   		$_SESSION['user_id'] = $idUsuario;
		   		$_SESSION['user_name'] = $name;
		   		$_SESSION['user_email'] = $email;
		   		$_SESSION['user_img'] = 'http://localhost/tesis/assets/img/default_profile_normal2.png';
				$resp['tipo'] = 'alert-success';
				$resp['Mensaje'] = 'Se ha registrado correctamente el Usuario '.$name;
			} else {
				$resp['tipo'] = 'alert-danger';
				$resp['Mensaje'] = 'error al registrar usuario';
			}
		}else{
			$resp['tipo'] = 'alert-danger';
			$resp['Mensaje'] = 'error al capturar el Usuario intente nuevamente';
		}	
	}
	
	mysqli_close($con->conectarse());

	$resp = json_encode($resp);

	echo $resp;
?>