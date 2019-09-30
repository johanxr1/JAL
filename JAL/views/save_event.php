<?php
  require_once('../conexion/seguridad.php');
?>
<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../assets/css/materialize.min.css">
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="../assets/css/materialize-social.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <title>Proyecto JAL</title>
</head>

<body >

    <!-- Dropdown Structure -->
<?php include('../views/navbar.php');  ?>


    <!--==================================================================================
    =                                  MODAL MENSAJE                                     =
    ===================================================================================-->
    <div id="modal-msj" class="modal">
        <div class="modal-content">
            <div class="row">
                <form class="col s12" >
                    <h5 style="margin-bottom: 2rem;" id="mensaje" align="center"></h5>
                    <div class="row">
                        <div class="input-field col s5 m4  offset-s1 offset-m1">
                            <button id="redirec-evento" name="redirec" class="col s12 m12 btn waves-effect green darken-1">
                            Ver Evento
                            </button>          
                        </div> 
                        <div class="input-field col s4 m4  offset-s1 offset-m2">
                            <button id="redirec-inicio" name="redirec" class="col s12 m12 btn waves-effect green darken-1">
                            Inicio
                            </button>          
                        </div>             
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Structure -->
    <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Seleccionar Ubicación</h4>
            <div class="row" style="margin-bottom: 0 !important;">
                <div class="input-field col s12" >
                    <input placeholder="Ingresa una direccion" id="addressModal" type="text" class="validate">
                    <label for="addressModal">Direccion</label>
                </div>
            </div>
            <div class="row">
                <div id="map" style="height: 100%;" class="col s12"></div>
            </div>
        </div>
        <div class="modal-footer">
            <a id="save-geo" class="modal-action modal-close waves-effect waves-green btn-flat disabled">Guardar</a>
        </div>
    </div>

    <!-- Seccion de formulario -->
    <div style="padding: 5rem 0;" class="row container">
        <div id="bla" class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input id="addressForm" type="text" class="validate">
                    <label for="addressForm">Dirección</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <textarea id="referencia" class="materialize-textarea" data-length="120"></textarea>
                    <label for="referencia">Puntos de referencia</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <label for="startDate" >Fecha de inicio</label>
                    <input id="startDate" type="text" class="datepicker" >
                </div>
                <div class="input-field col s6">
                    <label for="startHour" >Hora de inicio</label>
                    <input id="startHour" type="text" class="timepicker" onchange="checkDate()">
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <label for="endDate" >Fecha de final</label>
                    <input id="endDate" type="text" class="datepicker" >
                </div>
                <div class="input-field col s6">
                    <label for="endHour" >Hora final</label>
                    <input id="endHour" type="text" class="timepicker" onchange="checkDate()">
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <select id="typeEvent">
                        <option value="" disabled selected>Elige el tipo de evento</option>
                        <option value="reciclaje">Reciclaje</option>
                        <option value="voluntario">Voluntario</option>
                        <option value="educativo">Educativo</option>
                    </select>
                    <label>Tipo de evento</label>
                </div>
            </div>

            <div class="row" id="selectMaterial" style="display: none;">
                <div class="input-field col s12">
                    <select multiple id="typeMaterials">
                        <option value="" disabled selected>Elige los tipos de materiales</option>
                    </select>
                    <label>Tipo de Material</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <textarea id="description" class="materialize-textarea" data-length="256"></textarea>
                    <label for="description">Descripción</label>
                </div>
            </div>

            <div class="row" id="inputAddres-contacto" style="display: none;" >
                <div class="input-field col s6">
                    <textarea id="addres-contacto" class="materialize-textarea" data-length="120"></textarea>
                    <label for="addres-contacto">Dirección de contacto</label>
                </div>
            </div>

            <div class="row" id="inputTlf-contacto" style="display: none;" >
                <div class="input-field col s6">
                    <input id="tlf-contacto" type="tel" class="validate">
                    <label for="tlf-contacto">Teléfono de contacto</label>
                </div>
            </div>

            <button id="save-event" class="btn waves-effect waves-light col m2 s6 offset-s3 offset-m5" type="submit" name="action">Guardar
                <i class="material-icons right">send</i>
            </button>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="../assets/js/jquery-3.2.1.min.js"></script>       
    <script src="../assets/js/materialize.min.js"></script>
    <script src="../controllers/picker-handler.js"></script>
    <script src="../controllers/save_event-controller.js"></script> 
    <script src="../assets/js/date.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3&key=&libraries=places&callback=initMap"></script>
    <script>
        $(document).ready(function(){
            $(".dropdown-button").dropdown();
            $(".button-collapse").sideNav();
        });
    </script>
</body>   
</html>
