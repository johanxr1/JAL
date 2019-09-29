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
  <!-- NAV BAR -->
	<div class="flexbox-parent">
	<nav class="nav-extended ">
		<?php include('../views/navbar.php');  ?>
		</nav>
		<div class="cotainer">
   <div class="row">

      <div class="col s12 m4 l3">
        <!-- SIDE BAR -->
	<br><br>
<?php include('perfilbar.php');  ?>

      </div>
      <!-- CONTENIDO -->
      <div class="col s12 m8 l9">

								<br><br>    <!-- LISTA CONFIGURACION -->
                <p>Actualiza datos de usuarios</p>
                <ul id="listaconfig" class="collection with-header">
                  <li class="collection-header"><div>Actualizar nivel de un usuarios por id<a href="#modalnu" class="secondary-content modal-trigger"><i class="material-icons">border_color</i></a></div></li>
                  <li class="collection-item"><div>Actualizar estado de un usuario por id<a href="#modaleu" class="secondary-content modal-trigger"><i class="material-icons">border_color</i></a></div></li>
              </ul>
              <!-- MODALES -->
              <!-- MODAL BUSCAR USUARIO -->
                  <div id="modalbu" class="modal">
                  <button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
                  <form class="col s12" style="margin-top: 2rem;">
                  <div class="row">
                  <div class="input-field col s12">
                    <p>Actualizar tipo de un usuario</p>
                  <form method="POST" id="form" class="col s12" >
                  <div class="row">
                           <div class="input-field col s12 m6 offset-m3">
                            <i class="material-icons prefix">accessibility</i>
                    <select id="select" name="select">
                    
                    </select>
                    <label>Usuarios</label>
                           </div>
                          </div>
                          <!-- BOTON NIVEL DE USUARIO -->
                            <div class="input-field col s12 m6 offset-m4">
                            <div class="row">
                             <button id="bubtn" name="bubtn" class="btn waves-effect green darken-1" type="submit">Usar</button>                          
                          </div>
                          </div>
                  </form> 
                  </div>        
                  </div>
                  </form>
                  </div>
              <!-- MODAL NIVEL DE USUARIO -->
                  <div id="modalnu" class="modal">
                  <button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
                  <form class="col s12" style="margin-top: 2rem;">
                  <div class="row">
                  <div class="input-field col s12">
                    <p>Actualizar tipo de un usuario</p>
                  <form method="POST" id="form" class="col s12" >
                  <div class="row">
                          <div class="input-field col s12 m6 offset-m3">
                             <i class="material-icons prefix">accessibility</i>
                             <input id="idnu" type="text" class="validate">
                              <label for="idnu">ID del usuario</label>
                           </div>
                           <div class="input-field col s12 m6 offset-m3">
                    <select id="select1" name="select1">
                    <option value="1" selected>Participante</option>
                    <option value="2">Lider</option>
                    <option value="3">Patrocinador</option>
                    </select>
                    <label>Nivel de usuario</label>
                           </div>
                          </div>
                          <!-- BOTON NIVEL DE USUARIO -->
                            <div class="input-field col s12 m6 offset-m4">
                            <div class="row">
                             <button id="nubtn" name="nubtn" class="btn waves-effect green darken-1" type="submit">Actualizar</button>                          
                          </div>
                          </div>
                  </form> 
                  </div>        
                  </div>
                  </form>
                  </div>
                  <!-- MODAL ESTADO DE UN USUARIO -->
                  <div id="modaleu" class="modal">
                  <button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
                  <form class="col s12" style="margin-top: 2rem;">
                  <div class="row">

                  <div class="input-field col s12">
                    <p>Actualizar estado de un usuario</p>
                  <form method="POST" id="form" class="col s12" >
                  <div class="row">
                          <div class="input-field col s12 m6 offset-m3">
                             <i class="material-icons prefix">accessibility</i>
                             <input id="ideu" type="text" class="validate">
                              <label for="ideu">ID del usuario</label>
                           </div>
                           <div class="input-field col s12 m6 offset-m3">
                             <select id="select2" name="select2">
                    <option value="1" selected>Activo</option>
                    <option value="0">Inactivo</option>
                    </select>
                    <label>Nivel de usuario</label>
                           </div>
                          </div>
                          <!-- BOTON ESTADO DE UN USUARIO -->
                            <div class="input-field col s12 m6 offset-m4">
                            <div class="row">
                             <button id="eubtn" name="eubtn" class="btn waves-effect green darken-1" type="submit">Actualizar</button>                          
                          </div>
                          </div>
                  </form> 
                  </div>        
                  </div>
                  </form>
                  </div>
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
  <script src="../controllers/usuarios.js"></script>
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