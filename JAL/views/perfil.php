<?php
  session_start();
  require_once('../vendor/autoload.php');
  require_once('../Auth/Auth.php');
    $tipouser = "Participante";
  if($_SESSION['user_tipo'] == 2){
    $tipouser = "Lider";
  }
  if($_SESSION['user_tipo'] == 3){
    $tipouser = "Patrocinador";
  }
  if($_SESSION['user_tipo'] == 4){
    $tipouser = "Admin";
  }
    if($_SESSION['user_estatus'] == 1){
    $statususer = "Activo";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../assets/css/show_events.css">
  <link rel="stylesheet" href="../assets/fonts/icon.css">
	<link rel="stylesheet" href="../assets/css/materialize.min.css">
	<link rel="stylesheet" href="../assets/css/materialize-social.css">
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
	<title>Proyecto JAL</title>
  <style>
.vertical-menu {
    width: 250px;
}

.vertical-menu a {
  font-size: 16px;
    background-color: #eee;
    color: black;
    display: block;
    padding: 12px;
    text-decoration: none;
}

.vertical-menu a:hover {
    background-color: #ccc;
}

.vertical-menu a.active {
    background-color: #4CAF50;
    color: white;
}
</style>

</head>

<body>
	<div class="flexbox-parent">
	<nav class="nav-extended ">
		<?php include('../views/navbar.php');  ?>
		</nav>
		<div class="cotainer">
   <div class="row">

      <div class="col s12 m4 l3">
	<br><br>
<?php include('perfilbar.php');  ?>

      </div>

      <div class="col s12 m8 l9">

								<br><br>
								<img align="left" style="height: 64px;" src=<?php echo "'".$_SESSION['user_img']."'" ?> alt="" class="circle"><p>&nbsp; Bienvenido <?php echo $_SESSION['user_name'] ?></p>

							    <ul class="collection with-header">
        						
        						<li class="collection-item"><div>Nombre: <?php echo $_SESSION['user_name']?></div></li>
        						<li class="collection-item"><div>Correo: <?php echo $_SESSION['user_email']?></div></li>
        						<li class="collection-item"><div>Dirrección: <?php if(!empty($_SESSION['user_addres']))echo $_SESSION['user_addres']?></div></li>
        						<li class="collection-item"><div>Teléfono: <?php if(!empty($_SESSION['user_tlf']))echo $_SESSION['user_tlf']?></div></li>
        						<li class="collection-item"><div>Tipo de usuario: <?php if(!empty($tipouser))echo $tipouser?></div></li>
        						<li class="collection-item"><div>Estatus: <?php if(!empty($statususer))echo $statususer?></div></li>
      							</ul>

      </div>

    </div>


		</div>

	</div><!-- felxbox-parent -->
  <!-- SCRIPTs -->
  <script src="../assets/js/jquery-3.2.1.min.js"></script>
  <script src="../assets/js/handlebars.min.js"></script>
  <script src="../assets/js/snazzy-info-window.min.js"></script>
  <script src="../assets/js/materialize.min.js"></script>
  <!-- CONTROLADOR -->
  <script src="../controllers/basicos.js"></script>
      <script id="marker-content-template" type="text/x-handlebars-template">
        <div class="custom-img" style="background-image: url({{{bgImg}}})"></div>
        <section class="custom-content">
            <h1 class="custom-header">
                {{title}}
                <small>{{subtitle}}</small>
            </h1>
            <div class="custom-body">{{{body}}}</div>
        </section>
    </script>

</body>
</html>