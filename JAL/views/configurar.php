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

								<br>    <!-- LISTA CONFIGURACION -->
                <p>Actualiza tus datos de perfil</p>
                <ul id="listaconfig" class="collection with-header">
                  <li class="collection-item"><div>Nombre: <?php echo $_SESSION['user_name']?><a href="#modalname" class="secondary-content modal-trigger"><i class="material-icons">border_color</i></a></div></li>
                  <li class="collection-item"><div>Teléfono: <?php if(!empty($_SESSION['user_tlf']))echo $_SESSION['user_tlf']?><a href="#modaltlf" class="secondary-content modal-trigger"><i class="material-icons">border_color</i></a></div></li>
                  <li class="collection-item"><div>Dirreción: <?php if(!empty($_SESSION['user_addres']))echo $_SESSION['user_addres']?><a href="#modaldir" class="secondary-content modal-trigger"><i class="material-icons">border_color</i></a></div></li>
                  <li class="collection-item"><div>Actualiza tu foto<a href="#modalfot" class="secondary-content modal-trigger"><i class="material-icons">border_color</i></a></div></li>
                  <?php if(!empty($_SESSION['user_log'])){ ?>
                    <li class="collection-item"><div>Cambiar tu contraseña<a href="#modalpsw" class="secondary-content modal-trigger"><i class="material-icons">border_color</i></a></div></li>

                  <?php }else{ ?>
                  
                    
                  <?php } ?>
                  
              </ul>
              <!-- MODALES -->
              <!-- MODAL NOMBRE -->
              <div id="modalname" class="modal">
                  <button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
                  <form class="col s12" style="margin-top: 2rem;">
                  <div class="row">
                  <div class="input-field col s12">
                    <p>Cambio de nombre</p>
                  <form method="POST" id="form" class="col s12" >
                  <div class="row">
                          <div class="input-field col s12 m6 offset-m3">
                             <i class="material-icons prefix">accessibility</i>
                             <input id="name" type="text" class="validate">
                              <label for="name">Nombre</label>
                           </div>
                          </div>
                            <div class="input-field col s12 m6 offset-m4">
                            <div class="row">
                             <button id="namebt" name="namebt" class="btn waves-effect green darken-1" type="submit">Actualizar</button>                          
                          </div>
                          </div>
                  </form> 
                  </div>        
                  </div>
                  </form>
                  </div>
                  <!-- MODAL TELEFONO -->
                  <div id="modaltlf" class="modal">
                  <button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
                  <form class="col s12" style="margin-top: 2rem;">
                  <div class="row">
                  <div class="input-field col s12">
                    <p>Cambio de teléfono</p>
                  <form method="POST" id="form1" class="valing col s12" >             
                  <div class="row">
                          <div class="input-field col s12 m6 offset-m3">
                             <i class="material-icons prefix">phone</i>
                             <input id="telephone" type="tel" class="validate">
                              <label for="telephone">Teléfono</label>
                           </div>
                          </div>
                            <div class="input-field col s6 m3 offset-m4">   
                             <button id="telbt" name="telbt" class="btn waves-effect green darken-1" type="submit">Actualizar</button>
                          </div>
                  </form> 
                  </div>        
                  </div>
                  </form>
                  </div>
                  <!-- MODAL DIRECCION -->
                  <div id="modaldir" class="modal">
                    <button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
                  <form class="col s12" style="margin-top: 2rem;">
                  <div class="row">
                  <div class="input-field col s12">
                    <p>Cambio de dirección</p>
                  <form method="POST" id="form2" class="valing col s12" >             
                  <div class="row">
                          <div class="input-field col s12 m6 offset-m3">
                             <i class="material-icons prefix">account_balance</i>
                             <input id="diruser" type="text" class="validate">
                              <label for="diruser">Dirección</label>
                           </div>
                          </div>
                            <div class="input-field col s6 m3 offset-m4">   
                             <button id="dirbt" name="dirbt" class="btn waves-effect green darken-1" type="submit">Actualizar</button>
                          </div>
                  </form> 
                  </div>        
                  </div>
                  </form>
                  </div>
                  <!-- MODAL FOTO -->
                  <div id="modalfot" class="modal">
                    <button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
                  <form class="col s12" style="margin-top: 2rem;">
                  <div class="row">
                  <div class="input-field col s12">
                    <p>Cambio de foto</p>
                  <form enctype="multipart/form-data" id="formuploadajax" method="post">              
                  <div class="row">
                          <div class="input-field col s12 m6 offset-m3">
                            Nombre de la foto: <input type="text" name="nombre" placeholder="Escribe tu nombre">
                             <i class="material-icons prefix">add_a_photo</i>
                             <input name='imagen_persona' id='imagen_persona' type='file' />
                           </div>
                          </div>
                            <div class="input-field col s6 m3 offset-m4">  
                            <input type="submit" value="Cambiar" id="agrefoto" class="modal-close btn waves-effect green darken-1" name="enviar" style="cursor: pointer"> 
                             <!-- <button id="fotbt" name="fotbt" class="modal-close btn waves-effect green darken-1" type="submit">Actualizar</button> -->
                          </div>
                  </form> 
                  </div>        
                  </div>
                  </form>
                  </div>
                  <!-- MODAL CLAVE -->
                  <div id="modalpsw" class="modal">
                    <button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
                  <form class="col s12" style="margin-top: 2rem;">
                  <div class="row">
                  <div class="input-field col s12">
                  <form method="POST" id="form2" class="valing col s12" > 
                  <p>Cambio de contraseña</p>            
                  <div class="row">
                          <div class="input-field col s12 m6 offset-m3">
                             <i class="material-icons prefix">account_box</i>
                             <input id="pswa" type="password" class="validate">
                              <label for="pswa">Contraseña Anterior</label>
                           </div>
                           <div class="input-field col s12 m6 offset-m3">
                             <i class="material-icons prefix">account_box</i>
                             <input id="pswn" type="password" class="validate">
                              <label for="pswn">Contraseña Nueva</label>
                           </div>
                           <div class="input-field col s12 m6 offset-m3">
                             <i class="material-icons prefix">account_box</i>
                             <input id="pswnr" type="password" class="validate">
                              <label for="pswnr">Repita contraseña</label>
                           </div>
                          <div class="input-field col s6 m3 offset-m4">
                             <button id="pswbt" name="pswbt" class="btn waves-effect green darken-1" type="submit">Actualizar</button>
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
  <script src="../controllers/configurar.js"></script>
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