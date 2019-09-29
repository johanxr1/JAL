<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
    $count2=0;   

	$idDenuncia=$_REQUEST['idDenuncia'];
	$tipo=$_REQUEST['tipo'];


	if ($tipo=="1") {
		
		$sql="UPDATE `denuncias` SET `statusDenuncia`=1 
			  WHERE `idDenuncia`=$idDenuncia";
		if($respuesta = mysqli_query($con->conectarse(), $sql)){
			echo (true);
		}else{echo (false);}
	}else{
		$idevento=$_REQUEST['idevento'];

		$sql2="UPDATE `denuncias` SET `statusDenuncia`=2
			  WHERE `idDenuncia`=$idDenuncia";
		if($respuesta = mysqli_query($con->conectarse(), $sql2)){
			$sql3="UPDATE `eventos` SET `statusEvento`=2
				  WHERE `idevento`=$idevento";
			if($respuesta = mysqli_query($con->conectarse(), $sql3)){
				echo (true);
			}else{echo (false);}	
		}else{echo (false);}		
	}



?>