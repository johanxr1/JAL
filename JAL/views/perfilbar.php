
<?php
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
if(!empty($_SESSION['user_tipo']) && ($_SESSION['user_tipo'] == "1") && ($_SESSION['user_estatus'] == "1")){

?> 
<!-- Usuario Participante -->
<div class="vertical-menu">
  <a href="./perfil.php" class="active"><i class="Small material-icons" >accessibility</i>Perfil</a>
  <a href="./configurar.php"><i class="Small material-icons">build</i> Configuración</a>
  <a href="./historial.php"><i class="Small material-icons">chat</i> Historial</a>
  <a href="./mensajes.php"><i class="Small material-icons">class</i> Mensajes<?php if(!empty($_SESSION['nuevo'])){echo '<span class="red new badge">';?>
      <?php echo $_SESSION['nuevo'] ?>
      </span> <?php } ?> </a>
</div>
      <?php }
      if(!empty($_SESSION['user_tipo']) && ($_SESSION['user_tipo'] == "2") && ($_SESSION['user_estatus'] == "1")){?>
    <!-- Usuario Lider -->
<div class="vertical-menu">
  <a href="./perfil.php" class="active"><i class="Small material-icons" >accessibility</i>Perfil</a>
  <a href="./configurar.php"><i class="Small material-icons">build</i> Configuración</a>
  <a href="./lhistorial.php"><i class="Small material-icons">chat</i> Historial</a>
  <a href="./mensajes.php"><i class="Small material-icons">class</i> Mensajes<?php if(!empty($_SESSION['nuevo'])){echo '<span class="red new badge">';?>
      <?php echo $_SESSION['nuevo'] ?>
      </span> <?php } ?> </a>
  <a href="./materiales.php"><i class="Small material-icons">public</i> Materiales</a>
  <a href="./operaciones.php"><i class="Small material-icons">room</i> Operaciones</a>
</div>
          <?php }
      if(!empty($_SESSION['user_tipo']) && ($_SESSION['user_tipo'] == "3") && ($_SESSION['user_estatus'] == "1")){?>
    <!-- Usuario Patrocinador -->
    <div class="vertical-menu">
  <a href="./perfil.php" class="active"><i class="Small material-icons" >accessibility</i>Perfil</a>
  <a href="./configurar.php"><i class="Small material-icons">build</i> Configuración</a>
  <a href="./historial.php"><i class="Small material-icons">chat</i> Historial</a>
  <a href="./mensajes.php"><i class="Small material-icons">class</i> Mensajes<?php if(!empty($_SESSION['nuevo'])){echo '<span class="red new badge">';?>
      <?php echo $_SESSION['nuevo'] ?>
      </span> <?php } ?> </a>
  <a href="./busquedas.php"><i class="Small material-icons">public</i> Busquedas</a>
  <a href="./operacionesp.php"><i class="Small material-icons">room</i> Operaciones<?php if(!empty($_SESSION['ide'])){echo '<span class="red new badge">';?>
      <?php echo $_SESSION['ide'] ?>
      </span> <?php } ?> </a>
</div>
          <?php }
      if(!empty($_SESSION['user_tipo']) && ($_SESSION['user_tipo'] == "4") && ($_SESSION['user_estatus'] == "1")){?>
    <!-- Usuario Administrador -->
    <div class="vertical-menu">
  <a href="./perfil.php" class="active"><i class="Small material-icons" >accessibility</i>Perfil</a>
  <a href="./configurar.php"><i class="Small material-icons">build</i> Configuración</a>
  <a href="./historial.php"><i class="Small material-icons">chat</i> Historial</a>
  <a href="./amensajes.php"><i class="Small material-icons">class</i> Mensajes<?php if(!empty($_SESSION['nuevo'])){echo '<span class="red new badge">';?>
      <?php echo $_SESSION['nuevo'] ?>
      </span> <?php } ?> </a>
  <a href="./reportes.php"><i class="Small material-icons">assignment</i> Reportes</a>
  <a href="./denuncias.php"><i class="Small material-icons">feedback</i> Denuncias</a>
  <a href="./usuarios.php"><i class="Small material-icons">assignment_ind</i> Usuarios</a>
  <a href="./materiales.php"><i class="Small material-icons">public</i> Materiales</a>
  <a href="./operaciones.php"><i class="Small material-icons">room</i> Operaciones<?php if(!empty($_SESSION['ide'])){echo '<span class="red new badge">';?>
      <?php echo $_SESSION['ide'] ?>
      </span> <?php } ?> </a>
</div>
          <?php }

      if(!empty($_SESSION['user_tipo']) && ($_SESSION['user_estatus'] == "0")){ ?>
<div class="vertical-menu">
  <a href="./perfil.php" class="active"><i class="Small material-icons" >accessibility</i>Perfil</a>
  <a href="./configurar.php"><i class="Small material-icons">build</i> Configuración</a>
  <a href="./historial.php"><i class="Small material-icons">chat</i> Historial</a>
  <a href="./mensajes.php"><i class="Small material-icons">class</i> Notificaciones</a>
</div>
    <?php } ?>



<!--  <a href="./mensajes.php" class="active"><i class="Small material-icons">class</i>
    <?php if($cnoti!=0){
      echo '<span class="red new badge">',$cnoti;}
      ?></span>Mensajes</a>  -->
