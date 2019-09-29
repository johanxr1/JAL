<?php  

	include_once('../conexion/conexion.php');
	$con = new conectar();
	$con->conectarse();
	session_start();

$idusuario = $_SESSION['user_id'];
$v1 = $_REQUEST['v1'];
$v2 = $_REQUEST['v2'];

#-------------Actualización campo Nombre------------------------
$consulta = "INSERT INTO `relacionum`(`idma`, `idu`, `cantidad`) VALUES ('$v2','$idusuario','$v1')";
if ($resultado=mysqli_query($con->conectarse(), $consulta))
{
$resp['tipo'] = 'alert-success';
$resp['Mensaje'] = 'Se ha actualizado el valor';
}
else
{
echo "Ha ocurrido un error";
}
	mysqli_close($con->conectarse());

	$resp = json_encode($resp);

	echo $resp;
 ?>