<?php  

	include_once('../conexion/conexion.php');
	$con = new conectar();
	$con->conectarse();
	session_start();

$idusuario = $_SESSION['user_id'];
$nombre = $_REQUEST['name'];
//$telefono = $_POST['tlfuser'];
$telefono = $_REQUEST['telephone'];
$direccion = $_REQUEST['diruser'];
$pswa = $_REQUEST['pswa'];
//$pswn = $_REQUEST['pswn'];
$pswnr = $_REQUEST['pswnr'];

#-------------Actualización campo Nombre------------------------
if(!empty($nombre)){
$consulta = "UPDATE users SET name='$nombre' WHERE id='$idusuario'";
if ($resultado=mysqli_query($con->conectarse(), $consulta))
{
$resp['tipo'] = 'alert-success';
$resp['Mensaje'] = 'Se ha actualizado el nombre';
$_SESSION['user_name']=$nombre;
$resp['sename'] = $nombre;

}
else
{
echo "Ha ocurrido un error";
}
	mysqli_close($con->conectarse());

	$resp = json_encode($resp);

	echo $resp;
}
#-------------Actualización campo Telefono------------------------
if(!empty($telefono)){
$consulta = "UPDATE users SET tlf='$telefono' WHERE id='$idusuario'";
if ($resultado=mysqli_query($con->conectarse(), $consulta))
{
//echo "Actualización realizada ", $telefono;
//header('Location: ../views/home.php');
$resp1['tipo'] = 'alert-success';
$resp1['Mensaje'] = 'Se ha actualizado el telefono';
$_SESSION['user_tlf']=$telefono;
}
else
{
$resp1['tipo'] = 'alert-danger';
$resp1['Mensaje'] = 'ERROR';
}
	mysqli_close($con->conectarse());

	$resp1 = json_encode($resp1);

	echo $resp1;
}
#-------------Actualización campo Direccion------------------------
if(!empty($direccion)){
$consulta = "UPDATE users SET address='$direccion' WHERE id='$idusuario'";
if ($resultado=mysqli_query($con->conectarse(), $consulta))
{
$resp2['tipo'] = 'alert-success';
$resp2['Mensaje'] = 'Se ha actualizado la direccion';
$_SESSION['user_addres']=$direccion;
}
else
{
$resp2['tipo'] = 'alert-danger';
$resp2['Mensaje'] = 'ERROR';
}
	mysqli_close($con->conectarse());

	$resp2 = json_encode($resp2);

	echo $resp2;
}
#-------------Actualización campo Clave------------------------

if(!empty($pswnr)){

	$sSql = "SELECT social_id FROM users 
			INNER JOIN users_social ON users.id =users_social.users_id 
			WHERE users.id ='$idusuario' 
			AND users_social.service='JAL'";
	

		if($result=mysqli_query($con->conectarse(), $sSql)){
			if ($row_cnt = mysqli_num_rows($result)) {
				foreach ($result as $dato) {
					$dbPass = $dato['social_id'];
				}
				// Recalculamos a ver si el hash coincide.
				if (substr(crypt($pswa, $dbPass), 0, -15) == $dbPass){
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
	$hash = crypt($pswnr, '$2y$10$' . $salt);

	$consulta = "UPDATE users_social SET social_id='$hash' WHERE users_id ='$idusuario' 
			AND users_social.service='JAL'";
		if ($resultado=mysqli_query($con->conectarse(), $consulta))
	{
		$resp3['tipo'] = 'alert-success';
		$resp3['Mensaje'] = 'Se ha actualizado la direccion';
		}
			else
		{
		$resp3['tipo'] = 'alert-danger';
		$resp3['Mensaje'] = 'ERROR';
		}
	mysqli_close($con->conectarse());

	$resp3 = json_encode($resp3);

	echo $resp3;



			     //    $resp3['estado'] ='true';
				    // $resp3['Mensaje'] = "Contraseña Actualizada\n";
				    // echo $resp3;
				}else{
					$cal=substr(crypt($pswa, $dbPass), 0, -15);
					$resp3['estado'] ='false';
				   	$resp3['Mensaje'] = "CLAVE INCORRECTA \n";
				   	echo $resp3;
				}
			}//if_row_cnt
		}//ifresult



}

 ?>