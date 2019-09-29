<?php  

	include_once('../conexion/conexion.php');
	$con = new conectar();
	$con->conectarse();
	session_start();

$nombre = $_POST['name'];
//$telefono = $_POST['tlfuser'];
$email = $_POST['email'];
$msj = $_POST['msj'];

#-------------Actualización campo Nombre------------------------
if(!empty($nombre)){
$consulta = "INSERT INTO `mensaje`(`nombre`, `email`, `mensaje`) VALUES ('$nombre','$email','$msj')";
if ($resultado=mysqli_query($con->conectarse(), $consulta))
{
echo "listo";
header('Location: ../views/home.php');
}
else
{
echo "Ha ocurrido un error";
}
	mysqli_close($con->conectarse());

}
 ?>