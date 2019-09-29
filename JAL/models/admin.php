<?php  

	include_once('../conexion/conexion.php');
	$con = new conectar();
	$con->conectarse();
	//session_start();
$ideu = $_REQUEST['ideu'];
$idnu = $_REQUEST['idnu'];
$stu = $_REQUEST['stu'];

#-------------ACTUALIZAR NIVEL------------------------
if(!empty($idnu)){
$consulta = "UPDATE users SET tipo='$stu' WHERE id='$idnu'";
if ($resultado=mysqli_query($con->conectarse(), $consulta))
{
$resp1['tipo'] = 'alert-success';
$resp1['Mensaje'] = 'Se ha actualizado';
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
#-------------ACTUALIZAR ESTADO------------------------
if(!empty($ideu)){
$consulta = "UPDATE users SET estatus='$stu' WHERE id='$ideu'";
if ($resultado=mysqli_query($con->conectarse(), $consulta))
{
$resp1['tipo'] = 'alert-success';
$resp1['Mensaje'] = 'Se ha actualizado';
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
 ?>