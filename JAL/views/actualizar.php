<?php
  session_start();
  require_once('../vendor/autoload.php');
  require_once('../Auth/Auth.php');
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
</head>
<style>
.flex-around{
	display: flex;
	justify-content: space-around;
}
.material-icons{
	color: #ED1E1E;
	border-color: #4d90fe;
}
</style>
<body>
	<div class="flexbox-parent">
			<?php include('../views/navbar.php');  ?>
		<!--Contenido interno-->
		<div class="fill-area">
			<div class="row m-p-0 all-size-w">
				<!-- CONTENIDO -->
				<div class="col s12 flexbox-parent m-p-0">
					<!-- AQUI VA EL TAB -->
					<div  class="nav-content green darken-1">
						<ul  id="tabs-swipe-demo" class="tabs tabs-transparent">
							<li class="tab col s12"><a class="active" href="#test-swipe-1">Actualizar perfil</a>
							</li>
						</ul>
					</div>
					<div class="fill-area">
						<!-- AQUI VA EL CONTENIDO 1 -->
						<div id="test-swipe-1" class="col s12 fill-area m-p-0" style="height: 100% !important;">

							<div class="container">
								<br>
								<ul id="listEvent" class="collection with-header">

									<li class="collection-header"><p>Actualiza tus datos de perfil</p></li>

									<li class="collection-item"><div>Nombre: <?php echo $_SESSION['user_name']?><a href="#modalname" class="secondary-content modal-trigger"><i class="material-icons">border_color</i></a></div>
																 <!--Modal Structure--> 
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
          							  <!-- BOTON ACTUALIZAR -->
                						<div class="input-field col s12 m6 offset-m1">
                						<div class="row">
                   					 <button id="namebt" name="namebt" class="btn waves-effect green darken-1" type="submit">Actualizar</button>                					
                					</div>
                					</div>
									</form>	
									</div>				
									</div>
									</form>
									</div>
								</li>
								<li class="collection-item">
									<!--CAMBIAR TELEFONO-->
									<div>Telefono: <?php if(!empty($_SESSION['user_tlf']))echo $_SESSION['user_tlf']?><a href="#modaltlf" class="secondary-content modal-trigger"><i class="material-icons">border_color</i></a></div>
																 <!--Modal Structure--> 
									<div id="modaltlf" class="modal">
										<button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
									<form class="col s12" style="margin-top: 2rem;">
									<div class="row">
									<div class="input-field col s12">
										<p>Cambio de telefono</p>
									<form method="POST" id="form1" class="valing col s12" >							
									<div class="row">
                					<div class="input-field col s12 m6 offset-m3">
                   					 <i class="material-icons prefix">phone</i>
                   					 <input id="telephone" type="tel" class="validate">
                  					  <label for="telephone">Telefono</label>
               						 </div>
          							  </div>
          							  <!-- BOTON REGISTRAR -->
                						<div class="input-field col s6 m3 offset-m1">   
                   					 <button id="telbt" name="telbt" class="btn waves-effect green darken-1" type="submit">Actualizar</button>
                					</div>
									</form>	
									</div>				
									</div>
									</form>
									</div>
								</li>
								<li class="collection-item"><div>Dirrecion: <?php if(!empty($_SESSION['user_addres']))echo $_SESSION['user_addres']?><a href="#modaldir" class="secondary-content modal-trigger"><i class="material-icons">border_color</i></a></div>
																 <!--Modal Structure--> 
									<div id="modaldir" class="modal">
										<button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
									<form class="col s12" style="margin-top: 2rem;">
									<div class="row">
									<div class="input-field col s12">
										<p>Cambio de direccion</p>
									<form method="POST" id="form2" class="valing col s12" >							
									<div class="row">
                					<div class="input-field col s12 m6 offset-m3">
                   					 <i class="material-icons prefix">account_balance</i>
                   					 <input id="diruser" type="text" class="validate">
                  					  <label for="diruser">Direccion</label>
               						 </div>
          							  </div>
          							  <!-- BOTON REGISTRAR -->
                						<div class="input-field col s6 m3 offset-m1">   
                   					 <button id="dirbt" name="dirbt" class="btn waves-effect green darken-1" type="submit">Actualizar</button>
                					</div>
									</form>	
									</div>				
									</div>
									</form>
									</div>
								</li>
								<li class="collection-item"><div>Estatus: <?php if(!empty($_SESSION['user_tipo']))echo $_SESSION['user_tipo']?> - Solicitar subir rango<a href="#modalsr" class="secondary-content modal-trigger"><i class="material-icons">border_color</i></a></div>
																 <!--Modal Structure--> 
									<div id="modalsr" class="modal">
										<button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
									<form class="col s12" style="margin-top: 2rem;">
									<div class="row">
									<div class="input-field col s12">
										<p>Espesifique el por que quiere subir de rango</p>
									<form method="POST" id="form2" class="valing col s12" >							
									<div class="row">
                					<div class="input-field col s12 m6 offset-m3">
                   					 <i class="material-icons prefix">account_balance</i>
                   					 <input id="sruser" type="textarea" class="validate">
                  					  <label for="sruser">Explique detalladamente</label>
               						 </div>
          							  </div>
          							  <!-- BOTON REGISTRAR -->
                						<div class="input-field col s6 m3 offset-m1">   
                   					 <button id="dirsr" name="dirsr" class="btn waves-effect green darken-1" type="submit">Enviar</button>
                					</div>
									</form>	
									</div>				
									</div>
									</form>
									</div>
								</li>
								<li class="collection-item"><div>Actualiza tu foto<a href="#modalfot" class="secondary-content modal-trigger"><i class="material-icons">border_color</i></a></div>
																 <!--Modal Structure--> 
									<div id="modalfot" class="modal">
										<button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
									<form class="col s12" style="margin-top: 2rem;">
									<div class="row">
									<div class="input-field col s12">
										<p>Cambio de foto</p>
									<form method="POST" action="foto_post.php" enctype="multipart/form-data" id="form3" class="valing col s12" >							
									<div class="row">
                					<div class="input-field col s12 m6 offset-m3">
                   					 <i class="material-icons prefix">add_a_photo</i>
                   					 <input name="imagen" type="file" maxlength="150">
                  					  <!-- <label for="fotuser">Foto</label> -->
               						 </div>
          							  </div>
          							  <!-- BOTON REGISTRAR -->
                						<div class="input-field col s6 m3 offset-m1">  
                						<input type="submit" value="Agregar" name="enviar" style="cursor: pointer"> 
                   					 <!-- <button id="fotbt" name="fotbt" class="modal-close btn waves-effect green darken-1" type="submit">Actualizar</button> -->
                					</div>
									</form>	
									</div>				
									</div>
									</form>
									</div>
								</li>
								<li class="collection-item"><div>Cambiar tu Clave<a href="#modalpsw" class="secondary-content modal-trigger"><i class="material-icons">border_color</i></a></div>
										<!--Cambio clave-->
									
																 <!--Modal Structure--> 
									<div id="modalpsw" class="modal">
										<button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
									<form class="col s12" style="margin-top: 2rem;">
									<div class="row">
									<div class="input-field col s12">
									<form method="POST" id="form2" class="valing col s12" >	
									<p>Cambio de clave</p>						
									<div class="row">
                					<div class="input-field col s12 m6 offset-m3">
                   					 <i class="material-icons prefix">account_box</i>
                   					 <input id="pswa" type="password" class="validate">
                  					  <label for="pswa">Clave Anterior</label>
               						 </div>
               						 <div class="input-field col s12 m6 offset-m3">
                   					 <i class="material-icons prefix">account_box</i>
                   					 <input id="pswn" type="password" class="validate">
                  					  <label for="pswn">Clave Nueva</label>
               						 </div>
               						 <div class="input-field col s12 m6 offset-m3">
                   					 <i class="material-icons prefix">account_box</i>
                   					 <input id="pswnr" type="password" class="validate">
                  					  <label for="pswnr">Repita Clave</label>
               						 </div>
          							  
          							  <!-- BOTON REGISTRAR -->
                					<div class="input-field col s6 m3 offset-m1">   
                   					 <button id="pswbt" name="pswbt" class="modal-close btn waves-effect green darken-1" type="submit">Actualizar</button>
                					</div>
                					</div>
									</form>	
									</div>	 <!-- imput -->			
									</div> <!-- row modal -->
									</form> <!-- primerform -->
									</div> <!-- modal -->
								</li> <!-- bien -->
							</ul> <!-- bien -->
							<!-- BOTON VOLVER -->
							<div><a name="Volver" href="../views/perfil.php" class="btn waves-effect green darken-1"><i class="material-icons left fa fa-arrow-left" aria-hidden="true"></i>Volver
								</a></div>

							</div> <!-- Container Cntenido1 -->
						</div>	<!-- contenido1 -->

					</div> <!-- fillarea tap -->
				</div> <!-- COL1 -->
			</div> <!-- ROW1 -->
		</div>		<!-- FilArea -->
	</div> <!-- FLetBOX -->

	<!-- SCRIPTs -->
	<script src="../assets/js/jquery-3.2.1.min.js"></script>
	<script src="../assets/js/handlebars.min.js"></script>
	<script src="../assets/js/snazzy-info-window.min.js"></script>
	<script src="../assets/js/materialize.min.js"></script>
	<script src="../controllers/showEvents-model.js"></script>
	<script src="../controllers/update-controller.js"></script> 
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
    <script>
	$(document).ready(function(){
		$('.collapsible').collapsible();
		$(".button-collapse").sideNav();
		$('.modal').modal();
		$('.modal').openModal();
		$('ul.tabs').tabs({
		  swipeable : true,
		  responsiveThreshold : Infinity
		});
	});
    </script>    <script>
      $(document).ready(function(){
        $(".dropdown-button").dropdown();
      });
      $(".button-collapse").sideNav();  
    </script>
</body>
</html>







<!---<a class="waves-effect waves-light btn modal-trigger" href="#modaltlf">Modal</a>
							 Modal Structure 
		<div id="modaltlf" class="modal">
			<form class="col s12" style="margin-top: 2rem;">
				<div class="row">
					<div class="input-field col s12">
							<form action="../models/actualizar.php" method="post">
									<input type="text" name="nameuser" value="">
									<label for="nameuser">Nombre</label>
									<div class="row">
									<div class="input-field col s6 offset-s4 ">
									<input type="submit" />
									</div>            
									</div>
									</form>	
					</div>				
				</div>
			</form>
		</div>



$telefono = $_POST['tlfuser'];
if(!empty($telefono)){
$consulta = "UPDATE users SET tlf='$telefono' WHERE id='$idusuario'";
if ($resultado=mysqli_query($con->conectarse(), $consulta))
{
echo "Actualización realizada ", $telefono;
header('Location: ../views/home.php');
}
else
{
echo "Ha ocurrido un error";
}
}

										Cambio telefono
									<form method="POST" id="form2" class="valing col s12" >
										
									<div class="row">
                					<div class="input-field col s12 m6 offset-m3">
                   					 <i class="material-icons prefix">phone</i>
                   					 <input id="telephone" type="tel" class="validate">
                  					  <label for="telephone">Telefono</label>
               						 </div>
          							  </div>
          							 BOTON REGISTRAR 
                						<div class="input-field col s6 m3 offset-m1">   
                   					 <button id="telbt" name="telbt" class="btn waves-effect green darken-1" type="submit">Actualizar</button>
                					</div>
									</form>










		-->