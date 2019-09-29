<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>J.A.L</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto:300,400,500" rel="stylesheet">
	<link rel="stylesheet" href="fonts/bootstrap.min.css">
	<link rel="stylesheet" href="fonts/font-awesome.css">
	<link rel="stylesheet" href="fonts/font-awesome.min.css">
	<link rel="stylesheet" href="fonts/fontello.css">
	<link rel="stylesheet" type="text/css" href="css/estilosindex2.css">
</head>
<body>
	<div class="container-fluid">

		<header class="row justify-content-between align-items-center">
			<div class="col columna col-auto logo">
				<h2><i class="fa fa-leaf">J.A.L</i> </h2>
			</div>
			<div class="col columna col-auto inicio-sesion hidden-sm-down">
				<div class="row">
				<!-- <button type="button" class="btn btn-outline-warning"></button> -->
					<button type="button" class="btn btn-outline-success">Iniciar Sesión</button>

				</div>
			</div>
		</header>
<!-- ***************Barra Lateral**************** -->
		<div class="row">
			<div class="barra-lateral col-12 col-sm-auto">
				<nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
          <a href="registro.php"><i class="icon-home"></i><span class="hidden-md-down">Registro</span></a>
          <a href="login.php"><i class="icon-doc-text"></i><span class="hidden-md-down">Login</span></a>
          <a href="#"><i class="icon-users"></i><span class="hidden-md-down">Usuarios</span></a>
          <a href="#"><i class="icon-cog-alt"></i><span class="hidden-md-down">Configuracion</span></a>
          <a href="index.php"><i class="icon-logout"></i><span class="hidden-md-down">Salir</span></a>
        </nav>
			</div>
			<!-- +Area de Mapa -->
						<main class="col">
				<div class="row">
					<div class=" mapa col-auto align-self-center">
					 <div class="panel panel-center">
<div class="col-md-6">
		<h2>Login</h2>

		<form role="form" name="login" action="php/login.php" method="post">
		  <div class="form-group">
		    <label for="username">Nombre de usuario o email</label>
		    <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
		  </div>
		  <div class="form-group">
		    <label for="password">Contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
		  </div>

		  <button type="submit" class="btn btn-default">Acceder</button>
		</form>
		</div>
		</div>
					</div>
				</div>
			</main>
		</div>
		<footer class="row justify-content-center align-items-center"> 
			<div class=" col-auto">
				<small><i class="fa fa-desktop hidden-md-down"></i></small>
			</div>
			<div class="col-auto hidden-md-down">
				<small>Herramienta Informática Bajo Plataforma Web para Diligenciar Material Reutilizable en Comunidades Urbanas </small>
			</div>	
			<div class="col-sm-auto">
				<small><i class="fa fa-leaf"></i>J.A.L</small>
			</div>	
		</footer>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!--<script src="js/valida_registro.js"></script>-->
	<script type="text/javascript" src="js/master.js"></script>
</body>
</html>