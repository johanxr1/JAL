<?php  
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$con->conectarse();
	session_start();
$idusuario = $_SESSION['user_id'];
$its = $_REQUEST['its'];
$itn = $_REQUEST['itn'];
#-------------Actualización mensaje leido------------------------
//Estatus 2
if(!empty($its)){
$consulta = "UPDATE `peticiones` SET `speti` = 2 WHERE `idp` = '$its'";
if ($resultado=mysqli_query($con->conectarse(), $consulta))
{
$r1['tipo'] = 'alert-success';
$r1['Mensaje'] = 'Mensaje leido';
}
else
{
echo "Ha ocurrido un error";
}
	mysqli_close($con->conectarse());
	$r1 = json_encode($r1);
	echo $r1;
}
//Estatus 3
if(!empty($itn)){
$consulta = "UPDATE `peticiones` SET `speti` = 3 WHERE `idp` = '$itn'";
if ($resultado=mysqli_query($con->conectarse(), $consulta))
{
$r1['tipo'] = 'alert-success';
$r1['Mensaje'] = 'Mensaje leido';
}
else
{
echo "Ha ocurrido un error";
}
	mysqli_close($con->conectarse());
	$r1 = json_encode($r1);
	echo $r1;
}
 ?>