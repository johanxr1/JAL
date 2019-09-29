<?php
  session_start();
  require_once('../vendor/autoload.php');
  require_once('../Auth/Auth.php');
    $tipouser = "Participante";
  if($_SESSION['user_tipo'] == 2){
    $tipouser = "Lider";
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
	<link rel="stylesheet" href="../assets/fonts/icon.css">
	<link rel="stylesheet" href="../assets/css/show_events.css">
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

		<?php include('../views/navbar.php');  ?>

		<div class="cotainer">
   <div class="row">

    <div class="col s12 m4 l3">
      <br>
      <br>
     <?php include('perfilbar.php');  ?>
   </div>

      <div class="col s12 m8 l9">
				<br>
        <p>Denuncias</p>  
        <table id="listevent" class="highlight" style="font-size:15px">
          <thead>
            <tr>
              <th>Id Denuncia</th>
              <th>Denunciante</th>
              <th>Evento</th>
              <th>Denuncia</th>
              <th>Estatus</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table> 
      </div>
    </div>
		</div>

	</div><!-- felxbox-parent -->
  <!-- SCRIPTs -->
  <script src="../assets/js/jquery-3.2.1.min.js"></script>
  <script src="../assets/js/materialize.min.js"></script>
  <!-- CONTROLADOR -->
  <script src="../controllers/denuncias-controiller.js"></script>
  </script>

</body>
</html>