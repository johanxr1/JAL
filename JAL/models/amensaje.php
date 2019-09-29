<?php  

	include_once('../conexion/conexion.php');
	$con = new conectar();
	$con->conectarse();
	session_start();

$idusuario = $_SESSION['user_id'];
$v1 = $_REQUEST['v1'];
$mensa = $_REQUEST['mensa'];

#-------------Actualización campo Nombre------------------------
$consulta = "INSERT INTO `mensaje`(`receptor`, `emisor`, `mensaje`, `fechae`) VALUES ('$v1','$idusuario','$mensa',CURRENT_DATE)";
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