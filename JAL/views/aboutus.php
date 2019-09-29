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
	<link rel="stylesheet" href="../assets/fonts/icon.css">
	<link rel="stylesheet" href="../assets/css/show_events.css">
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
		<?php include('../views/navbar.php');  ?>


		<div class="fill-area">
			<div class="row m-p-0 all-size-w">
				
				<!-- CONTENIDO -->
				<div class="col s12 flexbox-parent m-p-0">
					<!-- AQUI VA EL TAB -->
					<div  class="nav-content green darken-1">
						<ul  id="tabs-swipe-demo" class="tabs tabs-transparent">
							
							<li class="tab col s4"><a href="#test-swipe-1">JAL</a></li>
							<li class="tab col s4"><a class="active" href="#test-swipe-2">Nosotros</a></li>
							<li class="tab col s4"><a class="active" href="#test-swipe-3">Contáctanos</a></li>
							
						</ul>
					</div>

					<div class="fill-area">

						<!-- AQUI VA JAL -->
						<div id="test-swipe-1" class="col s12 fill-area m-p-0" style="height: 100% !important; overflow-y:scroll;">
							<div class="container uno">	
							  <div class="row center">
											<div class="col s12">
												<div class="section-title text-center">
													
													<div class="card-panel grey lighten-3 z-depth-5">
														<p class="flow-text blac-text"><b>Herramienta Informática Bajo Plataforma Web Para la Diligencia de Material Reutilizable en Comunidades Urbanas</b></p>
													</div>	
														<h2>¿Qué es J.A.L?</h2>
														<img class="light logojal"  src="../assets/img/Imagen2.png">
														<p class="flow-text"> J.A.L, es una herramienta informática bajo plataforma web que se propone para mejorar los procesos de información que involucren a las personas de comunidades a participar en diferentes tipos de eventos, entre los se encuentran: 
															<br><b>Eventos de Recolección</b>  de materialReutilizable. 
															<br><b>Eventos  Educativas</b> con charlas sobre ambientalismo, reciclaje.
															<br> <b>Eventos de Voluntariados</b> para servicios comunitarios. 
															<br>Los eventos deben ser creados por Líderes de comunidades que incentiven a los usuarios del sistema a participar en las diferentes actividades. 

														<br><br>Del mismo modo, la herramienta debe ofrecer a los usuarios registrados como Patrocinadores (personas que adquieren el material que se recolecta ya sea para trasladarlo, comprarlo o reutilizarlo),la manera de contactar a las personas encargadas de los eventos y tener acceso a cualquier tipo de información relacionada con eventos o jornadas creadas a través de la Aplicación Web.
														<br><br>Esta Herramienta cuenta con un completo listado de reportes y funciones de seguridad, que el Usuario Administrador puede verificar y contrlar, con el fín de hacer funcionar el sitio de una manera dinamica, amena y que las personas se sientan incentivadas a participar y escalar de rango para líderar actividades.<br>Asimismo, esta web cuenta con secciones de educación, arte e ideas geniales para practicar en el hogar y tambien con contenido relevante relacionado sobre las funciones que se desempeñan y como ayudar en las comunidades para evitar los cúmulos de basura y la contaminación de las mismas. </p>

													
												</div>
											</div>
										</div>
							 
       						</div>	 
							
						</div>

						<!-- AQUI VA Nosotros -->
						<div id="test-swipe-2" class="col s12 fill-area m-p-0 grey lighten-4" style="height: 100% !important; overflow-y:scroll;">
							<div class="container">
    							<div class="section">

     									 <!--   Icon Section   -->
      									<div class="card-panel grey lighten-5 z-depth-3 ">
      									<div class="row center">
											<div class="col s12">
												<div class="section-title text-center">
													<h2>Equipo JAL</h2>
													<p class="flow-text"><b>TESISTAS</b></p>
													
												</div>
											</div>
										</div>
										
      									<div class="row center">

       										<div class="col s12 m4">
       											<div class="section-title text-center">
          											<div class="icon-block">
            										<img class="light center logojal1 circle"  src="../assets/img/contact.jpeg">
            										
            										<h5 class="center">Alejandro Chávez</h5>
          											</div>
          										</div>
        									</div>
        									<div class="col s12 m4">
          										<div class="icon-block">
            										<img class="center logojal1 circle"  src="../assets/img/lif1.jpg">
            										
            										<h5 class="center">Lifranny Alvarado</h5>
          										</div>
        									</div>
        									<div class="col s12 m4">
          										<div class="icon-block">
            										<img class="light center logojal1 circle"  src="../assets/img/contact.jpeg">
            										<h5 class="center">Johandry Cabrera</h5>
          										</div>
        									</div>
    									</div>
    								</div>
    									<div class="row center ">
											<div class="col s12">
												<div class="section-title text-center">
													<P class="flow-text"> <b>Estudiantes de la Universidad Privada Dr. Rafael Belloso Chacín, Facultad de Ingeniería, Escuela de Informática, Cursantes del Décimo Segundo Trimestre de la carrera, Desarrollando "JAL" como Trabajo Especial de Grado para optar por el Título de Ingenieros en Informática.</b></P>
												</div>
											</div>
										</div>
    										   
  								</div>	
							
							</div>

						<!-- AQUI VA Contactanos -->
						<div id="test-swipe-3" class="col s12 fill-area m-p-0" style="height: 100% !important; overflow-y:scroll;">						
						     <div class="container">
										<div class="row center">
											<div class="col s12">
												<div class="section-title text-center">
													<h2>Contactanos</h2>
													<p>Dejanos saber como podemos ayudarte...</p>
												</div>
											</div>
										</div>
										
										<div class="row text-center ">

											<div class="col s12 m6 valign-wrapper">
													<img class="img-responsive" style="width: 100%;" src="../assets/img/contactanos.jpg" alt=""> 
													
												</div>


											<div class=" container col s12 m6">
		   												<!-- Form itself--> 
          										<form action="../models/mensaje.php" name="sentMessage" id="contactForm" method="post" novalidate> 
		 											<div class="input-field"> 
														<input type="text" name="name" class="form-control" id="name" required
			           										data-validation-required-message="Please enter your name" />
					   									<label for="name" class="">   Nombre </label> 
			  											<p class="help-block"></p>
		        									</div> 	
                									<div class="input-field"> 
														<input type="email" name="email" class="form-control" id="email" required
			   		  									 data-validation-required-message="Please enter your email" /> 
					   										<label for="name" class="">   Correo </label> 
	    														</div> 	
			  
               											<div class="input-field"> 
				 											<textarea id="msj" name="msj" rows="10" cols="100" required class="form-control materialize-textarea" 
                      											 idation-required-message="Please enter your message" minlength="5" 
                      											 data-validation-minlength-message="Min 5 characters" 
                       											 maxlength="999" style="resize:none"></textarea>
																	 <label for="name" class="">   Mensaje </label> 
		  												</div> 		 
	     												<div id="success"> </div> <!-- For success/fail messages-->
	   														 <button type="submit" class="btn btn-success waves-effect waves-dark pull-right">Send</button><br />
         				 							</form>
												</div>
												
										</div>						
									</div>
						</div>						
					</div>
				</div>
			</div>
		</div>		
	</div>


	<!-- SCRIPTs -->
	<script src="../assets/js/jquery-3.2.1.min.js"></script>
	<script src="../assets/js/materialize.min.js"></script>S
	<script src="../controllers/index-controller.js"></script>
	<script>
		$(document).ready(function(){
			$(".dropdown-button").dropdown();
		});
		$(".button-collapse").sideNav();  
	</script>
</body>
</html>
<!-- style="overflow-y:scroll;" -->