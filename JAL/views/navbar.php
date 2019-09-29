
<?php
if(!empty($_SESSION['user_tipo'])){
include_once('../models/notifica.php');
$nme = 0;
$npe = 0;
if($_SESSION['nuevo'] >= 1){
  $nme = $_SESSION['nuevo'];
  //echo $nme;
}
if(!empty($_SESSION['ide'])){
  $npe = $_SESSION['ide'];
}

}


(strpos($_SERVER['REQUEST_URI'],'views')) ? $path="./" : $path="./views/";
if(!empty($_SESSION['user_tipo']) && ($_SESSION['user_tipo'] == "1") && ($_SESSION['user_estatus'] == "1")){
?> 
<!-- Usuario Participante -->
 <nav class="nav-extended ">
      <div class=" nav-wrapper green lighten-1">
        <a href="../views/home.php" style="padding-left: 15px;" class="brand-logo hide-on-med-and-down"><i class="fa fa-envira" aria-hidden="true"></i></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a  href="../views/home.php">Inicio</a></li>
          <li><a  href="../views/aboutus.php">Conócenos</a></li>
          <li><a  href="../views/cont.php">Contenido</a></li>
          <li><a href="../views/perfil.php">Hola <?php echo $_SESSION['user_name'];  ?></a></li>

          <!-- Dropdown Trigger -->
            <li >
              <a style="height: 64px;" class="dropdown-button" href="#!" data-activates="dropdown1">
                <img style="height: 64px;" src=<?php echo "'".$_SESSION['user_img']."'" ?> alt="" class="circle">
              </a>
            </li>   
        </ul> 
       
        <ul class="side-nav" id="mobile-demo">
          <li >
              <a style="height: 64px;" class="dropdown-button" href="#!" data-activates="dropdown2">
                <img class="center" style="height: 64px;" src=<?php echo "'".$_SESSION['user_img']."'" ?> alt="" class="circle " >
              </a>
            </li> 
          <li><a  href="../views/home.php">Inicio</a></li>
          <li><a  href="../views/aboutus.php">Conócenos</a></li>
          <li><a  href="../views/cont.php">Contenido</a></li>
          <!-- Dropdown Trigger -->
        </ul>
      </div>
      <ul id="dropdown1" class="dropdown-content">
      <li><a href="../views/perfil.php">Perfil</a></li>
      <li class="divider"></li>
      <li><a href="../conexion/logout.php">Cerrar sesión</a></li>
    </ul>
    <ul id="dropdown2" class="dropdown-content">
      <li><a href="../views/perfil.php">Perfil</a></li>
      <li class="divider"></li>
      <li><a href="../conexion/logout.php">Cerrar sesión</a></li>
    </ul>
    </nav>

      <?php }
      if(!empty($_SESSION['user_tipo']) && ($_SESSION['user_tipo'] == "2") && ($_SESSION['user_estatus'] == "1")){?>
    <!-- Usuario Lider -->
 <nav class="nav-extended ">
      <div class=" nav-wrapper green lighten-1">
        <a href="../views/home.php" style="padding-left: 15px;" class="brand-logo hide-on-med-and-down"><i class="fa fa-envira" aria-hidden="true"></i></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a  href="../views/home.php">Inicio</a></li>
          <li><a  href="../views/save_event.php">Crear evento</a></li>
          <li><a  href="../views/aboutus.php">Cónócenos</a></li>
          <li><a  href="../views/cont.php">Contenido</a></li>
          <li><a href="../views/perfil.php">Hola <?php echo $_SESSION['user_name'];  ?></a></li>
          <li><?php if($nme >0 || $npe >0 ){
            ?><a  href="#modalala" class="modal-trigger"><i class="material-icons prefix" style="color: #ff0000 !important;">add_alert</i></a>
          <?php } 
          else {?>
            <a  href="#" class="modal-trigger"><i class="material-icons prefix" style="color: #fff !important;">add_alert</i></a>
        <?php } ?>
        </li>
          <!-- Dropdown Trigger -->
            <li >
              <a style="height: 64px;" class="dropdown-button" href="#!" data-activates="dropdown1">
                <img style="height: 64px;" src=<?php echo "'".$_SESSION['user_img']."'" ?> alt="" class="circle">
              </a>
            </li>   
        </ul> 
       
        <ul class="side-nav" id="mobile-demo">
          <li >
              <a style="height: 64px;" class="dropdown-button" href="#!" data-activates="dropdown2">
                <img style="height: 64px;" src=<?php echo "'".$_SESSION['user_img']."'" ?> alt="" class="circle " >
              </a>
            </li> 
          <li><a  href="../views/home.php">Inicio</a></li>
          <li><a  href="../views/save_event.php">Crear evento</a></li>
          <li><a  href="../views/aboutus.php">Conócenos</a></li>
          <li><a  href="../views/cont.php">Contenido</a></li>
          <li><a href="../views/perfil.php">Hola <?php echo $_SESSION['user_name'];  ?></a></li>
          <!-- Dropdown Trigger -->
        </ul>
      </div>
      <ul id="dropdown1" class="dropdown-content">
      <li><a href="../views/perfil.php">Perfil</a></li>
      <li class="divider"></li>
      <li><a href="../conexion/logout.php">Cerrar sesión</a></li>
    </ul>
    <ul id="dropdown2" class="dropdown-content">
      <li><a href="../views/perfil.php">Perfil</a></li>
      <li class="divider"></li>
      <li><a href="../conexion/logout.php">Cerrar sesión</a></li>
    </ul>
    </nav>
          <?php }
      if(!empty($_SESSION['user_tipo']) && ($_SESSION['user_tipo'] == "3") && ($_SESSION['user_estatus'] == "1")){?>
    <!-- Usuario Patrocinador -->
 <nav class="nav-extended ">
      <div class=" nav-wrapper green lighten-1">
        <a href="../views/home.php" style="padding-left: 15px;" class="brand-logo hide-on-med-and-down"><i class="fa fa-envira" aria-hidden="true"></i></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a  href="../views/home.php">Inicio</a></li>
          <li><a  href="../views/busquedas.php">Adquirir Material</a></li>
          <li><a  href="../views/aboutus.php">Conócenos</a></li>
          <li><a  href="../views/cont.php">Contenido</a></li>
          
          
          <li><a href="../views/perfil.php">Hola <?php echo $_SESSION['user_name'];  ?></a></li>
          <li><?php if($nme >0 || $npe >0 ){
            ?><a  href="#modalal" class="modal-trigger"><i class="material-icons prefix" style="color: #ff0000 !important;">add_alert</i></a>
          <?php } 
          else {?>
            <a  href="#" class="modal-trigger"><i class="material-icons prefix" style="color: #000000 !important;">add_alert</i></a>
        <?php } ?>
        </li>
          <!-- Dropdown Trigger -->
            <li >
              <a style="height: 64px;" class="dropdown-button" href="#!" data-activates="dropdown1">
                <img style="height: 64px;" src=<?php echo "'".$_SESSION['user_img']."'" ?> alt="" class="circle">
              </a>
            </li>   
        </ul> 
       
        <ul class="side-nav" id="mobile-demo">
          <li >
              <a style="height: 64px;" class="dropdown-button" href="#!" data-activates="dropdown2">
                <img style="height: 64px;" src=<?php echo "'".$_SESSION['user_img']."'" ?> alt="" class="circle " >
              </a>
            </li> 
          <li><a  href="../views/home.php">Inicio</a></li>
          <li><a  href="../views/busquedas.php">Adquirir Material</a></li>
          <li><a  href="../views/aboutus.php">Conócenos</a></li>
          <li><a  href="../views/cont.php">Contenido</a></li>
          <li><a href="../views/perfil.php">Hola <?php echo $_SESSION['user_name'];  ?></a></li>

          <!-- Dropdown Trigger -->
        </ul>
      </div>
      <ul id="dropdown1" class="dropdown-content">
      <li><a href="../views/perfil.php">Perfil</a></li>
      <li class="divider"></li>
      <li><a href="../conexion/logout.php">Cerrar sesión</a></li>
    </ul>
    <ul id="dropdown2" class="dropdown-content">
      <li><a href="../views/perfil.php">Perfil</a></li>
      <li class="divider"></li>
      <li><a href="../conexion/logout.php">Cerrar sesión</a></li>
    </ul>
    </nav>
          <?php }
      if(!empty($_SESSION['user_tipo']) && ($_SESSION['user_tipo'] == "4") && ($_SESSION['user_estatus'] == "1")){?>
    <!-- Usuario Administrador -->
 <nav class="nav-extended ">
      <div class=" nav-wrapper green lighten-1">
        <a href="../views/home.php" style="padding-left: 15px; font-size: 20px;" class="brand-logo hide-on-med-and-down"><i class="fa fa-envira" aria-hidden="true"></i>Administrador</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a  href="../views/home.php">Inicio</a></li>
          <li><a  href="../views/save_event.php">Crear evento</a></li>          
          <li><a  href="../views/aboutus.php">Conócenos</a></li>
          <li><a  href="../views/cont.php">Contenido</a></li>
          <li><a href="../views/perfil.php">Hola <?php echo $_SESSION['user_name'];  ?></a></li>
          <!-- <li><a  href="../views/admin.php">Reportes</a></li>
          <li><a  href="../views/buzon.php">Buzon</a></li> -->
          <li><?php if($nme >0 || $npe >0 ){
            ?><a  href="#modalale" class="modal-trigger"><i class="material-icons prefix" style="color: #ff0000 !important;">add_alert</i></a>
          <?php } 
          else {?>
            <a  href="#" class="modal-trigger"><i class="material-icons prefix" style="color: #000000 !important;">add_alert</i></a>
        <?php } ?>
        </li>
          <!-- Dropdown Trigger -->
            <li >
              <a style="height: 64px;" class="dropdown-button" href="#!" data-activates="dropdown1">
                <img style="height: 64px;" src=<?php echo "'".$_SESSION['user_img']."'" ?> alt="" class="circle"></a>
            </li>   
        </ul> 
       
        <ul class="side-nav" id="mobile-demo">
          <li >
              <a style="height: 64px;" class="dropdown-button" href="#!" data-activates="dropdown2">
                <img style="height: 64px;" src=<?php echo "'".$_SESSION['user_img']."'" ?> alt="" class="circle " >
              </a>
            </li> 
          <li><a  href="../views/home.php">Inicio</a></li>
          <li><a  href="../views/save_event.php">Crear evento</a></li>
          <li><a  href="../views/aboutus.php">Conócenos</a></li>
          <li><a  href="../views/cont.php">Contenido</a></li>
          <li><a href="../views/perfil.php">Hola <?php echo $_SESSION['user_name'];  ?></a></li>
                   
          <!-- Dropdown Trigger -->
        </ul>
      </div>
      <ul id="dropdown1" class="dropdown-content">
      <li><a href="../views/perfil.php">Perfil</a></li>
      <li class="divider"></li>
      <li><a href="../conexion/logout.php">Cerrar sesión</a></li>
    </ul>
    <ul id="dropdown2" class="dropdown-content">
      <li><a href="../views/perfil.php">Perfil</a></li>
      <li class="divider"></li>
      <li><a href="../conexion/logout.php">Cerrar sesión</a></li>
    </ul>
    </nav>
          <?php }

      if(empty($_SESSION['user_tipo'])){ ?>
    <!-- Usuario Libre   brand-logo hide-on-med-and-down -->
      <nav class="nav-extended ">
      <div class="nav-wrapper green lighten-1">
        <a href="<?php echo $path ?>" style="padding-left: 15px;" class="brand-logo hide-on-med-and-down"><i class="fa fa-envira" aria-hidden="true"></i></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a class="modal-trigger" href="<?php echo $path; ?>aboutus.php">Conócenos</a></li>
          <li><a class="modal-trigger" href="<?php echo $path; ?>cont.php">Contenido</a></li>
          <li><a class="modal-trigger" href="#modal">Iniciar Sesión</a></li>
          <li><a class="modal-trigger" href="<?php echo $path; ?>registro.php">Registrarse</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="sass.html">Iniciar Sesión</a></li>
          <li><a href="badges.html">Registrarse</a></li>
        </ul>
      </div>
    </nav>

    <!-- Modal Structure -->
    <div id="modal" class="modal">
      <button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
      <div style="margin: 4rem;">
            <!-- COLLAPSIBLE -->
              <ul class="collapsible popout col s12 m6 offset-m3 m-p-0 collapsible-accordion" data-collapsible="accordion">
                   <!-- REGISTRO CON REDES -->
                  <li class="active">
                      <div class="collapsible-header active"><i class="material-icons">chat</i>Inico con Redes sociales</div>
                      <div class="collapsible-body" >
                          <div class="row">
                              <a  href="?auth=Google" style="margin-bottom: 1rem;" class="waves-effect waves-light btn col s12 social google">
                                  <i class="fa fa-google"></i> Inicia Sesión con Google
                              </a>
                              <a href="?auth=Twitter" class="waves-effect waves-light btn col s12 social twitter">
                                  <i class="fa fa-twitter"></i> Inicia Sesión con Twitter
                              </a>
                          </div>
                      </div>
                  </li>

                  <!-- INICIO CON JAL -->
                  <li class="">
                      <div class="collapsible-header"><i class="fa fa-envira" aria-hidden="true"></i>Inicio con JAL</div>
                      <div class="collapsible-body" >
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input id="emailUser" type="email" class="validate">
                            <label for="emailUser">Correo</label>
                          </div>
                          <div class="input-field col s12">
                            <i class="material-icons prefix">vpn_key</i>
                            <input id="psw" type="password" class="validate">
                            <label for="psw">Contraseña</label>
                          </div>
                          <div class="row">
                            <a style="font-size: 1rem;" href="./views/recuperar-contrasena.php" class="col s4 offset-s1">¿Olvidaste tu Contraseña? </a>
                          </div>
                          <div class="row">
                            <div class="input-field col s6 offset-s4 ">
                              <button id="send" name="send" class="btn waves-effect green darken-1" type="submit">Iniciar Sesión
                              </button>          
                            </div>            
                          </div>
                        </div>
                      </div>
                  </li>
              </ul>       
      </div>
    </div>  

              <?php }

      if(!empty($_SESSION['user_tipo']) && ($_SESSION['user_estatus'] == "0")){ ?>
 <nav class="nav-extended ">
      <div class=" nav-wrapper green lighten-1">
        <a href="../views/home.php" style="padding-left: 15px;" class="brand-logo hide-on-med-and-down"><i class="fa fa-envira" aria-hidden="true"></i></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a  href="../views/home.php">Mapa</a></li>
          <li><a  href="../views/aboutus.php">Conócenos</a></li>
          <li><a  href="../views/cont.php">Contenido</a></li>
          <!-- Dropdown Trigger -->
            <li >
              <a style="height: 64px;" class="dropdown-button" href="#!" data-activates="dropdown1">
                <img style="height: 64px;" src=<?php echo "'".$_SESSION['user_img']."'" ?> alt="" class="circle">
              </a>
            </li>   
        </ul> 
       
        <ul class="side-nav" id="mobile-demo">
          <li >
              <a style="height: 64px;" class="dropdown-button" href="#!" data-activates="dropdown2">
                <img style="height: 64px;" src=<?php echo "'".$_SESSION['user_img']."'" ?> alt="" class="circle " >
              </a>
            </li> 
          <li><a  href="../views/home.php">Inicio</a></li>
          <li><a  href="../views/aboutus.php">Conócenos</a></li>
          <li><a  href="../views/cont.php">Contenido</a></li>
          <!-- Dropdown Trigger -->
        </ul>
      </div>
      <ul id="dropdown1" class="dropdown-content">
      <li><a href="../views/perfil.php">Perfil</a></li>
      <li class="divider"></li>
      <li><a href="../conexion/logout.php">Cerrar sesión</a></li>
    </ul>
    <ul id="dropdown2" class="dropdown-content">
      <li><a href="../views/perfil.php">Perfil</a></li>
      <li class="divider"></li>
      <li><a href="../conexion/logout.php">Cerrar sesión</a></li>
    </ul>
    </nav>
    <?php } ?>
        <!-- Modal Structure -->
    <div id="modalal" class="modal">
          <button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
          <div class="container">
          <div class="row">
            <br>
          <h5 style= "color:black;" >Notificaciones</h5>
            <ul>

              <li><a  href="../views/mensajes.php" class="btn waves-effect green darken-1">Mensajes nuevos: <?php echo $nme ?></a></li>
              <br>
              <li><a  href="../views/operacionesp.php" class="btn waves-effect green darken-1">Operaciones nuevas: <?php echo $npe ?></a></li>

            </ul>
            </div>
            </div>
    </div>
    <div id="modalala" class="modal">
          <button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
          <div class="container">
          <div class="row">
            <br>
          <h5 style= "color:black;" >Notificaciones</h5>
            <ul>

              <li><a  href="../views/mensajes.php" class="btn waves-effect green darken-1">Mensajes nuevos: <?php echo $nme ?></a></li>
              <br>
              <li><a  href="../views/operaciones.php" class="btn waves-effect green darken-1">Operaciones nuevas: <?php echo $npe ?></a></li>

            </ul>
            </div>
            </div>
    </div>
        <div id="modalale" class="modal">
          <button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
          <div class="container">
          <div class="row">
            <br>
          <h5 style= "color:black;" >Notificaciones</h5>
            <ul>

              <li><a  href="../views/amensajes.php" class="btn waves-effect green darken-1">Mensajes nuevos: <?php echo $nme ?></a></li>
              <br>
              <li><a  href="../views/operaciones.php" class="btn waves-effect green darken-1">Operaciones nuevas: <?php echo $npe ?></a></li>

            </ul>
            </div>
            </div>
    </div>