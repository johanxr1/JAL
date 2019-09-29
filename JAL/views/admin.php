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
	.indicator{
		background-color: #fb4646 !important;
	}
</style>
    <style>

      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
    	-webkit-box-shadow: 0 6px 10px 0 rgba(0,0,0,0.14), 0 1px 18px 0 rgba(0,0,0,0.12), 0 3px 5px -1px rgba(0,0,0,0.3) !important;
    	box-shadow: 0 6px 10px 0 rgba(0,0,0,0.14), 0 1px 18px 0 rgba(0,0,0,0.12), 0 3px 5px -1px rgba(0,0,0,0.3) !important;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin: 12px 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
      #target {
        width: 345px;


      }
      .logojal{
      	width: 75px;
      	height: 120px;
      }
      .logojal1{
      	width: 120px;
      	height: 120px;
      }
      .uno{
      	padding: 30px;
      }
      h2{
      	color: #000;
      }
      h5{
      	color:#1a237e;
      }
    </style>
<body >
	<div class="flexbox-parent">

		<!-- Barra de navegacion -->
		<nav class="nav-extended ">
<?php include('../views/navbar.php');  ?>
		</nav>

		<div class="fill-area">
			<div class="row m-p-0 all-size-w">
				
				<!-- CONTENIDO -->
				<div class="col s12 flexbox-parent m-p-0">
					<!-- AQUI VA EL TAB -->
					<div  class="nav-content green darken-1">
						<ul  id="tabs-swipe-demo" class="tabs tabs-transparent">
							
							<li class="tab col s4"><a href="#test-swipe-1">Usuarios</a></li>
							<li class="tab col s4"><a class="active" href="#test-swipe-2">Eventos</a></li>
							<li class="tab col s4"><a class="active" href="#test-swipe-3">Configuracion</a></li>
							
						</ul>
					</div>

					<div class="fill-area">

						<!-- AQUI VA Usuarios -->
						<div id="test-swipe-1" class="col s12 fill-area m-p-0" style="height: 100% !important; overflow-y:scroll;">
							<div class="container uno">	
							  <div class="row">

                    <table id="listuser" class="highlight">
                    </table>
								<!-- <ul id="listuser" class="collapsible col m10 s12 offset-m1" data-collapsible="accordion" style='padding: 0 !important;'>
								</ul> -->		
							  </div>
       						</div>
						</div>
						<!-- AQUI VA EVENTOS -->
						<div id="test-swipe-2" class="col s12 fill-area m-p-0" style="height: 100% !important; overflow-y:scroll;">
							<div class="container">
    							<div class="row">
                    <br>
                    <div><h5>Buscar eventos por su direccion</h5></div>
                <form method="POST" id="form12" class="col s12" >
                  
                  <div class="row">
<!-- <div class="row">
                <div class="input-field col s12">
                    <select id="typeEvent">
                        <option value="" disabled selected>Elige el tipo de evento</option>
                        <option value="reciclaje">Reciclaje</option>
                        <option value="voluntario">Voluntario</option>
                        <option value="educativo">Educativo</option>
                    </select>
                    <label>Tipo de evento</label>
                </div>
            </div> -->
                          <div class="input-field col s12 m6 offset-m3">
                             
                             <i class="material-icons prefix">account_balance</i>
                             <input id="iduser" type="text" class="validate">
                              <label for="iduser">Buscar direccion</label>

                           </div>
                          </div>
                           <!-- BOTON ACTUALIZAR --> 
                            <div class="input-field col s12 m6 offset-m1">
                            <div class="row">
                             <button id="list" name="list" class="btn waves-effect green darken-1" type="submit">Listar</button>
                             <button id="pdf" name="pdf" class="btn waves-effect green darken-1" type="submit">pdf</button>                           
                          </div>
                          </div>
                  </form> 

              <table id="listevent" class="highlight">
              </table>


								<!-- <ul id="listevent" class="collapsible col m10 s12 offset-m1" data-collapsible="accordion" style='padding: 0 !important;'>
								</ul> -->	
	   
  								</div>
							</div>
            </div>

						<!-- AQUI VA configuracion -->
						<div id="test-swipe-3" class="col s12 fill-area m-p-0" style="height: 100% !important; overflow-y:scroll;">		
						    <div class="container">
								<div class="row">
								<br>
							    <ul class="collection with-header">
        						<li class="collection-header"><div>Actualizar usuario<a href="#modaleu" class="secondary-content modal-trigger"><i class="material-icons">border_color</i></a></div></li>
        						<li class="collection-item"><div>Eliminar evento<a href="#modalee" class="secondary-content modal-trigger"><i class="material-icons">border_color</i></a></div></li>
        						<li class="collection-item"><div>Agregar material<a href="#modalam" class="secondary-content modal-trigger"><i class="material-icons">border_color</i></a></div></li>
        						<li class="collection-item"><div>Eliminar material<a href="#modalem" class="secondary-content modal-trigger"><i class="material-icons">border_color</i></a></div></li>
        						<li class="collection-item"><div>Hacer respaldos<a href="#modalhr" class="secondary-content modal-trigger"><i class="material-icons">border_color</i></a></div></li>
      							</ul>
								</div>					
							</div>
                  <!-- Modales -->

                  <!-- Modal tipo Usuario -->
            <div id="modaleu" class="modal">
                  <button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
                  <form class="col s12" style="margin-top: 2rem;">
                  <div class="row">

                  <div class="input-field col s12">
                    <p>Actualizar tipo Usuario</p>
                  <form method="POST" id="form" class="col s12" >
                  <div class="row">
                          <div class="input-field col s12 m6 offset-m3">
                             <i class="material-icons prefix">accessibility</i>
                             <input id="ideu" type="text" class="validate">
                              <label for="ideu">ID del usuario</label>
                           </div>
                           <div class="input-field col s12 m6 offset-m3">
                             <i class="material-icons prefix">accessibility</i>
                             <input id="tieu" type="text" class="validate">
                              <label for="tieu">Nuevo estatus</label>
                           </div>
                          </div>
                          <!-- BOTON ELIMINAR USUARIO -->
                            <div class="input-field col s12 m6 offset-m1">
                            <div class="row">
                             <button id="eubtn" name="eubtn" class="btn waves-effect green darken-1" type="submit">Actualizar</button>                          
                          </div>
                          </div>
                  </form> 
                  </div>        
                  </div>
                  </form>
                  </div>

                    <!-- Modal Eliminar Evento -->
          <div id="modalee" class="modal">
                  <button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
                  <form class="col s12" style="margin-top: 2rem;">
                  <div class="row">

                  <div class="input-field col s12">
                    <p>Eliminar Evento</p>
                  <form method="POST" id="form2" class="col s12" >
                  <div class="row">
                          <div class="input-field col s12 m6 offset-m3">
                             <i class="material-icons prefix">cloud_off</i>
                             <input id="idee" type="text" class="validate">
                              <label for="idee">ID del evento</label>
                           </div>
                          </div>
                          <!-- BOTON ELIMINAR EVENTO -->
                            <div class="input-field col s12 m6 offset-m1">
                            <div class="row">
                             <button id="eebtn" name="eebtn" class="btn waves-effect green darken-1" type="submit">Eliminar</button>                          
                          </div>
                          </div>
                  </form> 
                  </div>        
                  </div>
                  </form>
                  </div>
                  <!-- Modal Agregar Material -->
                  <div id="modalam" class="modal">
                  <button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
                  <form class="col s12" style="margin-top: 2rem;">
                  <div class="row">

                  <div class="input-field col s12">
                    <p>Agregar Material</p>
                  <form method="POST" id="form3" class="col s12" >
                  <div class="row">
                          <div class="input-field col s12 m6 offset-m3">
                             <i class="material-icons prefix">cloud_upload</i>
                             <input id="idam" type="text" class="validate">
                              <label for="idam">Nombre del material</label>
                           </div>
                          </div>
                          <!-- BOTON AGREGAR MATERIAL -->
                            <div class="input-field col s12 m6 offset-m1">
                            <div class="row">
                             <button id="ambtn" name="ambtn" class="btn waves-effect green darken-1" type="submit">Agregar</button>                          
                          </div>
                          </div>
                  </form> 
                  </div>        
                  </div>
                  </form>
                  </div>
                  <!-- Modal Eliminar Material -->
                  <div id="modalem" class="modal">
                  <button class="modal-close btn-flat" style="position:absolute;top:0;right:0;margin-top: 1rem;"><i class="large material-icons">close</i></button>
                  <form class="col s12" style="margin-top: 2rem;">
                  <div class="row">

                  <div class="input-field col s12">
                    <p>Eliminar Material</p>
                  <form method="POST" id="form4" class="col s12" >
                  <div class="row">
                          <div class="input-field col s12 m6 offset-m3">
                             <i class="material-icons prefix">cloud_download</i>
                             <input id="idem" type="text" class="validate">
                              <label for="idem">Nombre del material</label>
                           </div>
                          </div>
                          <!-- BOTON ELIMINAR MATERIAL -->
                            <div class="input-field col s12 m6 offset-m1">
                            <div class="row">
                             <button id="embtn" name="embtn" class="btn waves-effect green darken-1" type="submit">Eliminar</button>                          
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
			</div>
		</div>		
	</div>	

	<!-- SCRIPTs -->
	<script src="../assets/js/jquery-3.2.1.min.js"></script>
	<script src="../assets/js/handlebars.min.js"></script>
  <script src="../assets/js/jspdf.min.js"></script>
	<script src="../assets/js/snazzy-info-window.min.js"></script>
	<script src="../assets/js/materialize.min.js"></script>
	<script src="../controllers/events-handler.js"></script>
	<script src="../controllers/list-admin.js"></script>

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
    $('.modal').modal({
    dismissible: true, // Modal can be dismissed by clicking outside of the modal
    opacity: .5, // Opacity of modal background
    inDuration: 300, // Transition in duration
    outDuration: 200, // Transition out duration
    startingTop: '4%', // Starting top style attribute
    endingTop: '10%', // Ending top style attribute
  });
    $('.modal').openmodal();
    $('ul.tabs').tabs({
      swipeable : true,
      responsiveThreshold : Infinity
    });
        $(".dropdown-button").dropdown();
      });
      $(".button-collapse").sideNav();  
    </script>
</body>
</html>
<!-- style="overflow-y:scroll;" -->