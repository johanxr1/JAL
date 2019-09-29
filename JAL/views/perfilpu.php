<?php
session_start();
  require_once('../vendor/autoload.php');
  require_once('../Auth/Auth.php');
  $iduserpu = $_GET['iduserpu'];
  $_SESSION['iduserpu']= $iduserpu;
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
							
							<li class="tab col s6"><a href="#test-swipe-1">perfil</a></li>
							<li class="tab col s6"><a class="active" href="#test-swipe-2">eventos</a></li>
							
						</ul>
					</div>

					<div class="fill-area">

						<!-- AQUI VA JAL -->
						<div id="test-swipe-1" class="col s12 fill-area m-p-0" style="height: 100% !important; overflow-y:scroll;">
							<div class="container uno">	
							  <div class="row">
                  <input type="hidden" id="myText" value="<?php echo $iduserpu; ?>">
							  	<br>
							  	<ul id="listperfil" class="collection with-header" data-collapsible="accordion" style='padding: 0 !important;'>


								</ul>
							   <?php if(!empty($_SESSION['user_name'])){?>
                <div><a name="Volver" href="../views/home.php" class="btn waves-effect green darken-1"><i class="material-icons left fa fa-arrow-left" aria-hidden="true"></i>Volver
                </a></div>  
                <?php }
                else{ ?>
                <div><a name="Volver" href="../index.php" class="btn waves-effect green darken-1"><i class="material-icons left fa fa-arrow-left" aria-hidden="true"></i>Volver
                </a></div>
                <?php } ?>
							  </div>
							 
       						</div>	 
							
						</div>

						<!-- AQUI VA Nosotros -->
						<div id="test-swipe-2" class="col s12 fill-area m-p-0" style="height: 100% !important; overflow-y:scroll;">
							<div class="container">
    							<div class="row">
    							<p>Eventos</p>
								
								<ul id="listEvent" class="collapsible col m10 s12 offset-m1" data-collapsible="accordion" style='padding: 0 !important;'>

								</ul> 
                <?php if(!empty($_SESSION['user_name'])){?>
                <div><a name="Volver" href="../views/home.php" class="btn waves-effect green darken-1"><i class="material-icons left fa fa-arrow-left" aria-hidden="true"></i>Volver
                </a></div>  
                <?php }
                else{ ?>
                <div><a name="Volver" href="../views/index.php" class="btn waves-effect green darken-1"><i class="material-icons left fa fa-arrow-left" aria-hidden="true"></i>Volver
                </a></div>
                <?php } ?> 										   
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
	<script src="../assets/js/snazzy-info-window.min.js"></script>
	<script src="../assets/js/materialize.min.js"></script>
	<script src="../controllers/events-handler.js"></script>
	<script src="../controllers/index-controller.js"></script>
	<script src="../controllers/perfil-public.js"></script>
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
        $(".dropdown-button").dropdown();
      });
      $(".button-collapse").sideNav();  
    </script>
</body>
</html>
<!-- style="overflow-y:scroll;" -->