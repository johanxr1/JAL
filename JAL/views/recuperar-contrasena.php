<?php
session_start();
require_once('../vendor/autoload.php');
require_once('../Auth/Auth.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 
   <link rel="stylesheet" href="../assets/fonts/icon.css">
   <link rel="stylesheet" href="../assets/css/materialize.min.css">
   <link rel="stylesheet" href="../assets/css/animate.css">
   <link rel="stylesheet" href="../assets/css/materialize-social.css">
   <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
   <title>Proyecto JAL</title>
</head>
<body class="container" >
    <!-- BOTON PARA REGRESAR -->
    <div class="row" style="padding-top: 5vh;"">
        <a href="../index.php" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">arrow_back</i></a>
    </div>

    <!--==================================================================================
    =                                  MODAL MENSAJE                                     =
    ===================================================================================-->
    <div id="modal-msj" class="modal">
        <div class="modal-content">
            <div class="row">
                <form class="col s12" >
                    <h5 style="margin-bottom: 2rem;" id="mensaje" align="center"></h5>
                    <div class="row">
                        <div class="input-field col s6 m4  offset-s3 offset-m4">
                            <button id="redirec" name="redirec" class="col s12 m12 btn waves-effect green darken-1">
                            </button>          
                        </div>            
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <!--==================================================================================
    =                                 FORMUARIO USUARIO                                  =
    ===================================================================================-->
    <div class=" valign-wrapper row " style="padding-top: 15vh; margin-bottom: 0 !important;">

        <form  method="POST" id="form1" class=" valing col s12" >            
            <ul class="collapsible popout col s12 m6 offset-m3 m-p-0 collapsible-accordion" data-collapsible="accordion"> 
                <!-- REGISTRO CON JAL -->
                <li class="active">
                    <div class="collapsible-header active"><i class="fa fa-envira" aria-hidden="true"></i>Recuperar contraseña</div>
                    <div class="collapsible-body" >
                        <!-- CORREO -->
                        <div class="row">
                            <div class="input-field col s12 ">
                                <i class="material-icons prefix">email</i>
                                <label for="emailUser">Correo</label>
                                <input id="emailUser" type="email" class="validate"">
                            </div>
                        </div>
                    </div>
                </li>
            </ul>  

            <!-- BOTON SIGUIENTE -->
            <div class="row">
                <div class="input-field col s6 m4  offset-s3 offset-m4">
                    <button id="next" name="next" class="col s12 btn waves-effect waves-light" type="submit">Siguiente
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </button>
                </div>
            </div>       
        </form> <!-- fin form usuario -->



        <!--===========================================================
        =               FORMUARIO DATOS PERSONALES                    =
        ============================================================-->
        <form method="POST" id="form2" class=" valing col s12 hide" >
 

            <!-- RESPUESTA #1  -->
            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <i class="material-icons prefix fa fa-question" aria-hidden="true"></i>
                    <input id="respuesta1" type="text" class="validate">
                    <label for="respuesta1"></label>
                </div>
            </div>


            <!-- RESPUESTA #2  -->
            <div class="row">
                <div class="input-field col s12 m6 offset-m3">
                    <i class="material-icons prefix fa fa-question" aria-hidden="true"></i>
                    <input id="respuesta2" type="text" class="validate">
                    <label for="respuesta2"></label>
                </div>
            </div>

            <!-- BOTONES -->
            <div class="row">
                <!-- BOTON ATRAS -->
                <div class="input-field col s6 m3 offset-m3">
                    <button id="back" name="back" class="btn waves-effect waves-light" type="submit" name="action">Atras
                        <i class="material-icons left fa fa-arrow-left" aria-hidden="true"></i>
                    </button>   
                </div>

                <!-- BOTON REGISTRAR -->
                <div class="input-field col s6 m3 offset-m1">   
                    <button id="send" name="send" class="btn waves-effect green darken-1" type="submit">Enviar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div> 
        </form> <!-- fin form PERSONALES -->

        <!--===========================================================
        =               FORMUARIO DATOS PERSONALES                    =
        ============================================================-->
        <form method="POST" id="form3" class=" valing col s12 hide" >
            <!-- CONTRASEÑA -->
            <div class="row">
                <div class="input-field col s12 ">   
                    <i class="material-icons prefix">vpn_key</i>   
                    <label for="password">Nueva contraseña</label>
                    <input id="password" type="password" class="validate" required>
                </div>
            </div> 

            <!-- REPETIR LA CONTRASEÑA -->
            <div class="row">
                <div class="input-field col s12 ">   
                    <i class="material-icons prefix">vpn_key</i>   
                    <label for="psw">Repetir contraseña</label>
                    <input id="psw" type="password" class="validate" required>
                </div>
            </div>

            <!-- BOTONES -->
            <div class="row">
                <!-- BOTON ATRAS -->
                <div class="input-field col s6 m3 offset-m3">
                    <button id="back" name="back" class="btn waves-effect waves-light" type="submit" name="action">Atras
                        <i class="material-icons left fa fa-arrow-left" aria-hidden="true"></i>
                    </button>   
                </div>

                <!-- BOTON REGISTRAR -->
                <div class="input-field col s6 m3 offset-m1">   
                    <button id="savePassword" name="send" class="btn waves-effect green darken-1" type="submit">Guardar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div> 
        </form> <!-- fin form PERSONALES -->
    <div> <!-- fin wrapper -->

    <!-- SCRIPTS -->
    <script src="../assets/js/jquery-3.2.1.min.js"></script>         
    <script src="../assets/js/materialize.min.js"></script>
    <script src="../controllers/recuperarContrasena.js"></script> 
</body>   
</html>