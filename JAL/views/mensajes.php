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
  $cnoti = 0;
  if(!empty($_SESSION['user_noti'])){$cnoti = $_SESSION['user_noti'];}
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
<!-- onmousedown="elemento(event);" -->
<body >
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
                <p>Enviar solicitud al Administrador</p>
								
                <ul id="listaconfig" class="collection with-header">
                <li class="collection-item"><div>Nivel: <?php if(!empty($tipouser))echo $tipouser?> - Solicitud para Cambiar de tipo de Usuario <a href="#modalsr" class="secondary-content modal-trigger"><i class="material-icons">border_color</i></a></div></li>
              </ul>
                <p>Respuestas recibidas</p>
              <ul id="listEvent" class="collapsible col m10 s12 offset-m1" data-collapsible="accordion" style='padding: 0 !important;'>

                </ul>

      </div>

    </div>


		</div>
                  <!-- MODAL NIVEL -->
                  <div id="modalsr" class="modal">
                    <button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
                  <form class="col s12" style="margin-top: 2rem;">
                  <div class="row">
                  <div class="input-field col s12">
                    <p>Solicitud para Cambiar de tipo de Usuario</p>
                  <form method="POST" id="form2" class="valing col s12" >             
                  <div class="row">
                          <div class="input-field col s12 m6 offset-m3">
                             <i class="material-icons prefix">announcement</i>
                             <textarea id="sruser" type="textarea" class="validate materialize-textarea"></textarea>
                              <label for="sruser">Explique detalladamente</label>
                           </div>
                          </div>
                          <!-- BOTON REGISTRAR -->
                            <div class="input-field col s6 m3 offset-m5">
                             <button id="dirsr" name="dirsr" class="btn waves-effect green darken-1" type="submit">Enviar</button>
                          </div>
                  </form> 
                  </div>        
                  </div>
                  </form>
                  </div>

	</div><!-- felxbox-parent -->
  <!-- SCRIPTs -->
  <script src="../assets/js/jquery-3.2.1.min.js"></script>
  <script src="../assets/js/handlebars.min.js"></script>
  <script src="../assets/js/snazzy-info-window.min.js"></script>
  <script src="../assets/js/materialize.min.js"></script>
  <!-- CONTROLADOR -->
  <script src="../controllers/basicos.js"></script>
  <!-- <script src="../controllers/configurar.js"></script> -->
  <script src="../controllers/mensajes.js"></script>
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