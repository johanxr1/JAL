<?php 
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$con->conectarse();


	$email = $_REQUEST['email'];
	$pass = $_REQUEST['psw'];
	$id = $_REQUEST['id'];


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
	$sSql = "UPDATE `users_social` SET `social_id`='$hash' WHERE `users_id`='$id'";

	if(mysqli_query($con->conectarse(), $sSql)){
		mysqli_close($con->conectarse());
		echo "true";
	}else{
		mysqli_close($con->conectarse());
		echo 'false';
	}	
	
	

?>