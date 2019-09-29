<?php
class conectar{
	function conectarse(){
		if(!($link = new mysqli("localhost","root","","tesis"))){
			console.log("fallo");
			exit();
		}
		mysqli_set_charset($link,"utf8");
		return $link;
	}
}
?>