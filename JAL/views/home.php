<?php
  require_once('../conexion/seguridad.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
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
</style>
<body >


  <div class="flexbox-parent">
    <!-- Dropdown Structure -->
    <nav class="nav-extended ">
    <?php include('../views/navbar.php');  ?>
  </nav>
    <!-- Barra de navegacion -->
    

 

    <div class="fill-area">
      <div class="row m-p-0 all-size-w">

        <!-- CONTENIDO -->
        <div class="col s12 flexbox-parent m-p-0">
          <!-- AQUI VA EL TAB -->
          <div  class="nav-content green darken-1">
            <ul  id="tabs-swipe-demo" class="tabs tabs-transparent">
              <li class="tab col s6"><a class="active" href="#test-swipe-1">MAPA</a></li>
              <li class="tab col s6"><a href="#test-swipe-2">LISTADO</a></li>
            </ul>
          </div>

          <div class="fill-area">

            <!-- AQUI VA EL MAPA -->
            <div id="test-swipe-1" class="col s12 fill-area m-p-0" style="height: 100% !important;">
              <input id="pac-input" class="controls z-depth-5" type="text" placeholder="Escribe una direccion.">
              <div id="map" class="all-size-h"></div>
              <!-- boton opciones del mapa -->
              <div class="fixed-action-btn horizontal">
                <a class="btn-floating btn-large red">
                  <i class="large material-icons">filter_list</i>
                </a>
                <ul>
                  <li><a style="background-color: #578d95;" class="btn-floating filter educativo"><i class="material-icons">school</i></a></li>
                  <li><a style="background-color: #4f324d;" class="btn-floating filter voluntario"><i class="material-icons">supervisor_account</i></a></li>
                  <li><a style="background-color: #599357;" class="btn-floating filter reciclaje"><i class="material-icons">autorenew</i></a></li>
                </ul>
              </div>
            </div>

            <!-- AQUI VA EL LISTADO -->
            <div id="test-swipe-2" class="col s12 fill-area m-p-0" style="height: 100% !important; overflow-y:scroll;">

              <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="material-icons prefix">search</i>
                      <input id="inputAddress" type="search" required>
                    </div>
                  </div>
                </div>
              </div>
              <!-- listado de eventos -->
              <div class="row">
                <ul id="listEvent" class="collapsible col m10 s12 offset-m1" data-collapsible="accordion" style='padding: 0 !important;'>

                </ul>                 
              </div>

            </div>            
          </div>
        </div>
      </div>
    </div>    
  </div>




  <!-- SCRIPTs -->
  <script src="../assets/js/jquery-3.2.1.min.js"></script>
  <script src="../assets/js/materialize.min.js"></script>  
  <script src="../assets/js/handlebars.min.js"></script>
  <script src="../assets/js/js.cookie.min.js"></script>
  <script src="../controllers/events-handler.js"></script>
  <script  src="https://maps.googleapis.com/maps/api/js?v=3&key=&libraries=places&callback=initMap"></script>
  <script src="../assets/js/snazzy-info-window.min.js"></script>
  
  
  <script src="../controllers/index-controller.js"></script>
  <script id="marker-content-template" type="text/x-handlebars-template">
    <!-- <div class="custom-img" style="background-image: url({{{bgImg}}})"></div> -->
    <section class="custom-content" style="padding-top: 0;">
      <h4 id="color" class="custom-header" >
        {{title}}
        <small >{{startDate}}</small>
        <small>{{endDate}}</small>
      </h4>
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
