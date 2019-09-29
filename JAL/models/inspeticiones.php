<?php  

	include_once('../conexion/conexion.php');
	$con = new conectar();
	$con->conectarse();
	session_start();

$idusuario = $_SESSION['user_id'];
$v1 = $_REQUEST['its'];
$v2 = $_REQUEST['itr'];

#-------------Actualización campo Nombre------------------------
$consulta = "INSERT INTO `peticiones`(  `idr`,`ide`, `mat`,`speti`) VALUES ('$idusuario','$v1',$v2,1)";
if ($resultado=mysqli_query($con->conectarse(), $consulta))
{
$resp['tipo'] = 'alert-success';
$resp['Mensaje'] = 'Se ha actualizado el valor';

		$sSqlId = "SELECT MAX(idp) as `id` FROM `peticiones`";

		if($respuesta = mysqli_query($con->conectarse(), $sSqlId)){
			foreach ($respuesta as $resp1) {
				$resp['idpm'] = $resp1['id'];
			}
		}
}
else
{
$resp['tipo'] = 'alert-danger';
$resp['Mensaje'] = 'NO se ha actualizado el valor';
}

	mysqli_close($con->conectarse());

	$resp = json_encode($resp);

	echo $resp;
 ?>