<?php
	include_once('../conexion/conexion.php');
	$con = new conectar();
	$conn=$con->conectarse();
    $count=0;
    $count2=0;   
    
	$idevento=$_REQUEST['idevento'];
	


	$sql="SELECT * FROM `comentarios` 
			INNER JOIN users ON comentarios.idUsuario=users.id 
			INNER JOIN users_social ON users.id=users_social.users_id
			WHERE comentarios.eventos_idevento ='$idevento'";


	if($respuesta = mysqli_query($con->conectarse(), $sql)){
		if ($respuesta->num_rows!= 0) {
			while($resp = mysqli_fetch_array($respuesta)){
				$r[$count]['idcomentarios'] = $resp['idcomentarios'];
				$r[$count]['comentario'] = $resp['comentario'];
				$r[$count]['eventos_idevento'] = $resp['eventos_idevento'];
				$r[$count]['id'] = $resp['id'];
				$r[$count]['name'] = $resp['name'];
				$r[$count]['email'] = $resp['email'];
				$r[$count]['address'] = $resp['address'];
				$r[$count]['tlf'] = $resp['tlf'];
				$r[$count]['tipo'] = $resp['tipo'];
				$r[$count]['estatus'] = $resp['estatus'];
				$r[$count]['users_id'] = $resp['id'];
				$r[$count]['users_id'] = $resp['users_id'];
				$r[$count]['social_id'] = $resp['social_id'];
				$r[$count]['service'] = $resp['service'];
				$r[$count]['imgUrl'] = $resp['imgUrl'];
				$r[$count]['dateComentario'] = $resp['dateComentario'];				
				$count++;
			}
			$r = json_encode($r);
			echo $r;
		}else{echo (false);}
	}else{echo ("error");}
?>