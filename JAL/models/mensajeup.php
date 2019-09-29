<?php  
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$con->conectarse();
	session_start();
$idusuario = $_SESSION['user_id'];
$idmen = $_REQUEST['idmen'];
#-------------Actualización mensaje leido------------------------

$consulta = "UPDATE mensaje SET nuevo = 0 WHERE idmensaje= '$idmen'";
if ($resultado=mysqli_query($con->conectarse(), $consulta))
{
$resp['tipo'] = 'alert-success';
$resp['Mensaje'] = 'Mensaje leido';
}
else
{
echo "Ha ocurrido un error";
}
	mysqli_close($con->conectarse());
	$resp = json_encode($resp);
	echo $resp;
 ?>