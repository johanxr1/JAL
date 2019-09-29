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
  <img id="logohoja" style="height: 50px; display:none;" src="../img/envira.png" alt="" class="circle">
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

                    
                    <br>
                    <div><h5>Listados de reportes</h5></div>
                    <form method="POST" id="form12" class="col s12" >
                    <div class="row">
                    <div class="input-field col s6">
                    <select id="select" name="select">
                    <option value="" disabled selected>Seleccione una Opción</option>
                    <option value="1">Usuarios</option>
                    <option value="2">Eventos</option>
                    <option value="3">Materiales</option>
                    <option value="4">Operaciones</option>
                    <option value="5">Mensajes</option>
                    <option value="6">Usuarios-Materiales</option>
                    <option value="7">Denuncias</option>
                    </select>
                    <label>Tipo de listado</label>
                    </div>
                    <div class="input-field col s6">
                    <button id="lists" name="lists" class="btn waves-effect green darken-1" type="submit">Listar</button>
                    <button id="pdf" name="pdf" class="btn waves-effect green darken-1" type="submit">PDF</button>
                    
                    </div>
                    <table id="listevent" class="highlight" style="font-size:15px; ">
                    </table>
                    </div>
                    </form> 
                    
      </div>
    </div>
		</div>
	</div><!-- felxbox-parent -->
  <!-- SCRIPTs -->
  <script src="../assets/js/jquery-3.2.1.min.js"></script>
  <script src="../assets/js/handlebars.min.js"></script>
  <script src="../assets/js/snazzy-info-window.min.js"></script>
  <script src="../assets/js/materialize.min.js"></script>
  <script src="../assets/js/jspdf.min.js"></script>
  <script src="../assets/js/jspdf.plugin.autotable.js"></script>
  <script src="../controllers/basicos.js"></script>
  <script src="../controllers/reportes.js"></script>
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