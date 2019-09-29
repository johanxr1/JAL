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
      h3{
        color: #bf360c;
      }
      h5{
        color:#1a237e;
      }
      .card-content p{
        font-size: 12px;
      }
      .card-title p{
        font-size: 12px;
      }
      #logob1{
        height:120px;
        width: 100px;
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
              <li class="tab col s4"><a class="active" href="#test-swipe-1">Transform-ARTE</a></li>
              <li class="tab col s4"><a href="#test-swipe-2">Educando</a></li>
              <li class="tab col s4"><a href="#test-swipe-3">Infórmese</a></li>
            </ul>
          </div>

        <div class="fill-area">

          <!-- AQUI VA BASURAL -->
            <div id="test-swipe-1" class="col s12 fill-area m-p-0 " style="height: 100% !important; overflow-y:scroll;">
                <div class="container">
                  <div class="row center">
            <div class="col s12">
              <div class="section-title text-center">
                <img id="logob1" class="activator" src="../assets/img/ideas2.jpg">
                <div class="card-panel green">
                    <h4>¡Arquitectura, Arte y Diseño!</h4>
                </div>
                
                <p> ¿Qué pasaría si te dijeramos que la basura en realidad no existe? ¿Nos crees?</p>
    
              </div>
            </div>
          </div>

                  <!--**************************FILA 1*********************-->
                
                <div class="col s12 l4">
                    <!--Primera Tarjeta BasuraJal-->
                    <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="../assets/img/Bjal1.jpeg">
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Ki Ecobe<i class="material-icons right">more_vert</i></span>
               
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><b>Ki Ecobe</b><i class="material-icons right">close</i></span>
                    <p><b>Nombre de la obra:</b>KI Ecobe</p>
                  <p><b>Autor:</b> Innus Korea Inc.</p>
                  <p><b>Año:</b> 2017</p>
                  <p><b>Ubicación:</b> Corea del Sur. </p>
                  <p><b>Sitio Web:</b> <a href="#">http://www.kiecobe.com/</a></p>
              </div>
            </div>
              <div class="divider"></div>
          <!--Segunda Tarjeta BasuraJal-->
              <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="../assets/img/Bjal4.jpeg">
              </div>
              <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">Escuela Sustentable<i class="material-icons right">more_vert</i></span>
                  
              </div>
              <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4"><b> Escuela Sustentable</b><i class="material-icons right">close</i></span>
                    <p><b>Nombre de la obra:</b>Escuela Sustentable</p>
                  <p><b>Autor:</b> Michael Reynolds, de Earthship Biotecture y Federico Palermo, de Tagma.</p>
                  <p><b>Año:</b> 2016</p>
                  <p><b>Ubicación:</b> Jaureguiberry, Uruguay.</p>
                  <p><b>Material Revalorizado:</b>Neumáticos, botellas.</p>
                  <p><b>Sitio Web:</b> <a href="#">https://www.unaescuelasustentable.uy/</a></p>
              </div>
              </div>
              <div class="divider"></div>
              <!--Tercera Tarjeta BasuraJal-->
              <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="../assets/img/Bjal7.jpeg">
              </div>
              <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">Filamentos Para Impresión 3D<i class="material-icons right">more_vert</i></span>
                  
              </div>
              <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4"><b>Filamentos Para Impresión 3D</b><i class="material-icons right">close</i></span>
                  <p><b>Nombre del proyecto:</b> Qactus</p>
              <p><b>Autores:</b> Julien Hanna, Felipe Herbage, Héctor Loyola y Roberto Parra</p>
              <p><b>Año:</b> 2016 - 2018</p>
              <p><b>Ubicación:</b> Santiago, Chile</p>
              <p><b>Material Revalorizado:</b>Plástico </p>
              <p><b>Sitio Web:</b> <a href="#">https://www.facebook.com/proyectoqactus/</a></p>
            
              </div>
              </div>
              <div class="divider"></div>
              <!--Cuarta Tarjeta BasuraJal-->
              <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="../assets/img/Bjal16.jpeg">
              </div>
              <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">Los Centinales<i class="material-icons right">more_vert</i></span>
                  
              </div>
              <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4"><b>Los Centinales</b><i class="material-icons right">close</i></span>
                  <p><b>Nombre del proyecto:</b> Los Centinales</p>
              <p><b>Autores:</b> Chakaia Booker</p>
              <p><b>Año:</b> 2014</p>
              <p><b>Ubicación:</b> Nueva York, Usa</p>
              <p><b>Material Revalorizado:</b>Neumáticos </p>
              <p><b>Sitio Web:</b> <a href="#">http://www.chakaiabooker.com/</a></p>
            
              </div>
              </div>
              

          </div>
          
          <!--**************************FILA 2*********************--> 
          <div class="col s12 l4">
            <!--Primera Tarjeta BasuraJal-->
                    <div class="card ">
              <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="../assets/img/Bjal3.jpeg">
              </div>
              <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">Washed Up<i class="material-icons right">more_vert</i></span>
                  
              </div>
              <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4"><b>Washed Up</b><i class="material-icons right">close</i></span>
                  <p><b>Nombre de la obra:</b> Washed up</p>
              <p><b>Autor:</b> Alejandro Durán</p>
              <p><b>Año:</b>  2011 – 2014 </p>
              <p><b>Ubicación:</b> Sian Ka’an, Mexico</p>
              <p><b>Material Revalorizado:</b> Desechos plásticos</p>
              <p><b>Sitio Web:</b> <a href="#">http://www.alejandroduran.com/</a></p>
              </div>
              </div>
              <div class="divider"></div>
              <!--Segunda Tarjeta BasuraJal-->
              <div class="card ">
              <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="../assets/img/Bjal10.jpeg">
              </div>
              <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">Galería de Mobiliario<i class="material-icons right">more_vert</i></span>
                  
              </div>
              <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4"><b>Galería de Mobiliario</b><i class="material-icons right">close</i></span>
                  <p><b>Nombre de la obra:</b> Galería de Mobiliario</p>
              <p><b>Autor:</b>CHYBIK+KRISTOF</p>
              <p><b>Año:</b>  2015 – 2016 </p>
              <p><b>Ubicación:</b> Brno-Vinohrady, República Checa.</p>
              <p><b>Material Revalorizado:</b> Sillas plásticas</p>
              <p><b>Sitio Web:</b> <a href="#">http://www.chybik-kristof.com/portfolio-item/my-dva-showroom/</a></p>
              </div>
              </div>
              <div class="divider"></div>
              <!--Tercera Tarjeta BasuraJal-->
              <div class="card ">
              <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="../assets/img/Bjal14.jpeg">
              </div>
              <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">Pabellón Pet<i class="material-icons right">more_vert</i></span>
                  
              </div>
              <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4"><b>Pabellón Pet</b><i class="material-icons right">close</i></span>
                  <p><b>Nombre de la obra:</b> Pabellón Pet</p>
              <p><b>Autor:</b>Project DWG y LOOS.FM</p>
              <p><b>Año:</b>  2014</p>
              <p><b>Ubicación:</b>Enschede, Países Bajos</p>
              <p><b>Material Revalorizado:</b> Botellas plásticas</p>
              <p><b>Sitio Web:</b> <a href="#">https://loosfm.wordpress.com/homepage/p-e-t-pavilion/</a></p>
              </div>
              </div>

          </div>

          <!--**************************FILA 3*********************-->

          <div class="col s12 l4">
                    <!--Primera Tarjeta BasuraJal-->
                    <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="../assets/img/Bjal8.jpeg">
              </div>
              <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">Pabellón Crecimiento Orgánico<i class="material-icons right">more_vert</i></span>
                  
              </div>
              <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4">Pabellón Crecimiento Orgánico<i class="material-icons right">close</i></span>
                  <p><b>Nombre del proyecto:</b> Organic Growth</p>
                          <p><b>Autores:</b> Izaskun Chinchilla</p>
                          <p><b>Año:</b> 2015</p>
                          <p><b>Ubicación:</b> Nueva York, Estados Unidos</p>
                          <p><b>Material Revalorizado:</b> Paraguas, bicicletas, etc.</p>
                          
              </div>
              </div>
              <div class="divider"></div>
              <!--Segunda Tarjeta BasuraJal-->
              <div class="card">
                  <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../assets/img/Bjal9.jpeg">
                  </div>
                  <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Lámparas Fabricadas con Chatarra Metálica<i class="material-icons right">more_vert</i></span>
                  </div>
                  <div class="card-reveal">
                      <span class="card-title grey-text text-darken-4"><b>Lámparas Fabricadas con Chatarra Metálica</b><i class="material-icons right">close</i></span>
                      <p><b>Nombre del proyecto:</b> Convictus</p>
                      <p><b>Autores:</b> Daniela Carvajal y Matías Gajardo</p>
                      <p><b>Año:</b> 2017</p>
                      <p><b>Ubicación:</b> Recoleta, Santiago</p>
                      <p><b>Material Revalorizado:</b> Chatarra metálica y madera </p>
                      <p><b>Sitio Web:</b> <a href="#">https://www.facebook.com/convictuschile/</a></p>
                  </div>
              </div>
              <div class="divider"></div>
              <!--tERCERA Tarjeta BasuraJal-->
               <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="../assets/img/Bjal13.jpeg">
              </div>
              <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">Pabellón De Cartón Plaza<i class="material-icons right">more_vert</i></span>
                  
              </div>
              <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4"><b>Pabellón De Cartón Plaza</b><i class="material-icons right">close</i></span>
                  <p><b>Nombre del proyecto:</b> Convictus</p>
              <p><b>Autores:</b> F_Marcano</p>
              <p><b>Año:</b> 2017</p>
              <p><b>Ubicación:</b> Valencia, España</p>
              <p><b>Material Revalorizado:</b> Cartón </p>
              <p><b>Sitio Web:</b> <a href="#">https://loosfm.wordpress.com/homepage/cartones.es</a></p>
            
              </div>
              </div>
          </div>
             </div>
            </div> 

            <!-- AQUI VA EDUCANDO -->
            <div id="test-swipe-2" class="col s12  fill-area m-p-0 " style="height: 100% !important; overflow-y:scroll;">
               <div class="container row center  ">
                <!--primera tarjeta IDEAS-->
                <img id="logob1" class="activator" src="../assets/img/ideas1.jpg">
                  <div class="card-panel green white-text">
                    <h4> Con estas ideas podras reusar materiales y reducir la cantidad de residuo, ¡Ínténtalo en casa! </h4>
                  </div>

                    <p>Sabías que en la naturaleza no existe tal cosa como un “Residuo”? Queremos hacerte consciente de la situación en la que estamos y del poder que tienes en tus manos. Tú también eres un actor de cambio, y tenemos que SER el cambio que queremos ver en el mundo.</p>
                    <div class="divider"></div>
                  <div class="col s12 l6">
                      <div class="card horizontal deep-purple lighten-1 z-depth-5">
                         <div class="card-stacked">
                            <div class="card-action">
                              <h4 class="header">Alfombra</h4>
                              <h6>Material: Corcho</h6>
                            </div>
                            <div class="divider"></div>
                            <div class="card-content">
                              <h6>Para evitar resbalar al salir del baño, también puedes fabricar una original y funcional alfombra de corcho.<br></h6> <br>
                              <div class="center"><img class="logoideas z-depth-5" src="../assets/img/ideas4.png"></div>
                            </div>
                          </div>
                      </div>
                      <div class="divider"></div>
                      <div class="card horizontal deep-purple lighten-3 z-depth-5">
                         <div class="card-stacked">
                            <div class="card-action">
                              <h4 class="header">Portavelas</h4>
                              <h6>Material: Latas y Pinzas de madera.</h6>
                            </div>
                            <div class="divider"></div>
                            <div class="card-content">
                              <h6>Si quieres darle a tu casa un ambiente más cálido y acogedor, puedes reciclar tus pinzas de la ropa y hacer con ellas unos bonitos portavelas como estos.<br></h6> 
                              <div class=" center "><img class="logoideas z-depth-5" src="../assets/img/ideas15.png">
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="divider"></div>
                      <div class="card horizontal  deep-purple lighten-1 z-depth-5">
                         <div class="card-stacked">
                            <div class="card-action">
                              <h4 class="header">Macetas Interior</h4>
                              <h6>Material: Bombillos</h6>
                            </div>
                            <div class="divider"></div>
                            <div class="card-content">
                              <h6>Para reciclar cualquier objeto de uso cotidiano tampoco hace falta romperse la cabeza. Mira qué bonitas quedan estas macetas hechas con bombillas.<br></h6> 
                              <div class="center "><img class="logoideas z-depth-5" src="../assets/img/reciclar1.jpg"></div>
                            </div>
                          </div>
                      </div>
                      <div class="divider"></div>
                      <div class="card horizontal deep-purple lighten-3 z-depth-5">
                        <div class="card-stacked">
                          <div class="card-action">
                            <h4 class="header">Macetas exterior</h4>
                            <h6>Material: Zapatos Deportivos.</h6>
                          </div>
                          <div class="divider"></div>
                          <div class="card-content">
                            <h6>Si no sabes qué hacer con tus zapatos deportivos viejos, reciclarlos para convertirlos en unas originales macetas siempre puede ser una buena opción.<br></h6>
                             <div class="center "><img class="logoideas z-depth-5" src="../assets/img/ideas16.png"></div>
                          </div>
                        </div>
                      </div>
                      <div class="divider"></div>
                      <div class="card horizontal  deep-purple lighten-1 z-depth-5">
                        <div class="card-stacked">
                          <div class="card-action">
                            <h4 class="header">Lámpara de Aceite</h4>
                            <h6>Material: Bombillos.</h6>
                          </div>
                          <div class="divider"></div>
                          <div class="card-content">
                            <h6>Los bombillos pueden tener muchas otras funciones (aparte de dar luz, para lo que fueron diseñados). Por ejemplo, mira esta curiosa lámpara de aceite.<br></h6>
                            <div class="center "><img class="logoideas z-depth-5" src="../assets/img/ideas3.png"></div>
                          </div>
                        </div>
                      </div>
                      <div class="divider"></div>
                      <div class="card horizontal deep-purple lighten-3 z-depth-5">
                        <div class="card-stacked">
                          <div class="card-action">
                            <h4 class="header">Mural</h4>
                            <h6>Material: Tapas de Botellas.</h6>
                          </div>
                          <div class="divider"></div>
                          <div class="card-content">
                            <h6>En este caso se trata de una obra hecha por un auténtico artista. Un mural de enormes dimensiones hecho a base de tapas de botellas. ¿Cuántos habrán utilizado?<br></h6>
                            <div class="center"><img class="logoideas z-depth-5" src="../assets/img/ideas17.png"></div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col s12 l6">
                      <div class="card horizontal  deep-purple lighten-3 z-depth-5">
                        <div class="card-stacked">
                          <div class="card-action">
                            <h4 class="header">Cortina</h4>
                            <h6>Material: Cápsulas de Nespresso</h6>
                          </div>
                          <div class="divider"></div>
                          <div class="card-content">
                            <h6>Si tienes imaginación, también puedes hacer cosas realmente chulas con objetos o incluso sustancias bastante originales. ¿Quién iba a pensar que se podría fabricar una bonita cortina de colores a base de cápsulas de café?<br> </h6>
                            <div class="center"><img class="logoideas z-depth-5" src="../assets/img/ideas5.png"></div>
                          </div>
                        </div>
                      </div>
                      <div class="divider"></div>
                      <div class="card horizontal deep-purple lighten-1 z-depth-5">
                        <div class="card-stacked">
                          <div class="card-action">
                           <h4 class="header">Estantería</h4> 
                           <h6>Material: Guitarra dañada</h6>
                          </div>
                          <div class="divider"></div>
                          <div class="card-content">
                            <h6>Los instrumentos de música son un elemento recurrente en la decoración del hogar. Muchas personas aprovechan instrumentos que ya no usan para adornar la casa, o incluso para que cumplan alguna otra función. Un claro ejemplo de ello es esta especie de estantería hecha con un guitarra.<br></h6>
                            <div class="center"> <img class="logoideas z-depth-5" src="../assets/img/ideas7.png"></div>
                          </div>
                        </div>
                      </div>
                      <div class="divider"></div>
                      <div class="card horizontal deep-purple lighten-3 z-depth-5">
                        <div class="card-stacked">
                          <div class="card-action">
                            <h4 class="header">Mesas de Sala</h4>
                            <h6>Material: Tabla de patineta</h6>
                          </div>
                          <div class="divider"></div>
                          <div class="card-content">
                            <h6>Esta idea sí que nos ha parecido muy curiosa y además, estéticamente muy bonita. Se trata de aprovechar las tablas del patín de skate para convertirlas en pequeñas mesas para la sala de estar..<br></h6>
                            <div class="center"> <img class="logoideas z-depth-5" src="../assets/img/ideas8.png"></div>
                          </div>
                        </div>
                      </div>
                      <div class="divider"></div>
                      <div class="card horizontal deep-purple lighten-1 z-depth-5">
                        <div class="card-stacked">
                          <div class="card-action">
                            <h4 class="header">Puff</h4>
                            <h6>Material: Caucho y Cuerdas</h6>
                          </div>
                          <div class="divider"></div>
                          <div class="card-content">
                            <h6>Una manualidad muy práctica que te permite reciclar y reutilizar esos neumáticos del coche que ya están demasiado desgastados y ya no usas. Simplemente recúbrelo con algún tipo de cuerda y disfruta de un cómodo puff en tu casa.<br></h6>
                            <div class="center"> <img class="logoideas z-depth-5" src="../assets/img/ideas9.png"></div>
                          </div>
                        </div>
                      </div>
                      <div class="divider"></div>
                      <div class="card horizontal deep-purple lighten-3 z-depth-5">
                        <div class="card-stacked">
                          <div class="card-action">
                            <h4 class="header">Joyero para Zarcillos</h4>
                            <h6>Material: Rallador de Queso</h6>
                          </div>
                          <div class="divider"></div>
                          <div class="card-content">
                            <h6>Las cosas más anodinas y cotidianas siempre pueden tener varios usos. Solo hay que darle un poco a la cabeza y ser original. Por ejemplo, puedes aprovechar utensilios de cocina y dotarles de otros usos. Por ejemplo, en este caso se trata de un rallador de queso que ahora sirve como joyero para pendientes.<br></h6>
                            <div class="center"> <img class="logoideas z-depth-5" src="../assets/img/ideas11.png"></div>
                          </div>
                        </div>
                      </div>
                      <div class="divider"></div>
                      <div class="card horizontal deep-purple lighten-1 z-depth-5">
                        <div class="card-stacked">
                          <div class="card-action">
                            <h4 class="header">Carteras</h4>
                            <h6>Material: Libros </h6>
                          </div>
                          <div class="divider"></div>
                          <div class="card-content">
                            <h6>No somos nada partidarios de eso de decorar las estanterías de casa con libros falsos y huecos. Sin embargo, esta idea nos ha parecido mucho más cool y original. En este caso se trata de usar las tapas de los libros para crear unos bolsos de lo más estilosos e intelectuales.<br> </h6>
                            <div class="center"><img class="logoideas z-depth-5" src="../assets/img/ideas10.png"></div>
                          </div>
                        </div>
                      </div>
                  </div>
               </div>
            </div>
            
            <!-- AQUI VA INFORMANDO -->
            <div id="test-swipe-3" class="col s12 fill-area m-p-0 " style="height: 100% !important;overflow-y:scroll;">
              <div class="container">
                <div class="row center">
                  <div class="col s12">
                    <div class="section-title text-center">
                        <img id="logob1" src="../assets/img/ambiente1.jpg">
                      <div class="card-panel green z-depth-3">
                        <h4>¡Te mostramos información útil para contribuir con tu comunidad, con el ambiente y con el planeta entero!</h4>
                      </div>  
                        <p> Sabemos que el reciclaje es algo que todos podemos hacer, en mayor o menor medida por lo que es importante saber cómo hacerlo. A continuación les contamos qué es reciclar, cómo se realiza todo el proceso, y les dejamos consejos para reciclar distintos materiales. Veamos todos los pasos para saber ¿cómo se debe reciclar bien?</p>
                        <div class="divider"></div>
                        <h4><b>¿Qué es el reciclaje?</b></h4>
                        <p>Aunque no recicles seguramente sabrás qué es exactamente o habrás oído hablar de ello. Reciclar es el proceso de descomponer y reutilizar materiales que de otro modo serían desechados como basura. El reciclaje tiene numerosos beneficios, y con tantas tecnologías nuevas que reciclan aún más materiales, con la ayuda de todos podemos limpiar nuestra Tierra. Además, hemos de pensar que reciclar no solo beneficia al medio ambiente sino que también tiene un efecto positivo en la economía. El reciclaje aunque vive ahora un auge, lo cierto es que ha estado presente a través de la historia humana, pero ha recorrido un largo camino desde los tiempos de Platón cuando los humanos reutilizaban herramientas rotas y cerámica cuando los materiales escaseaban. Hoy en día, hay una multitud de beneficios que provienen del reciclaje, así como toneladas de artículos que se pueden reciclar.</p>
                        <div class="divider"></div>
                        <h4><b>Las ventajas de reciclar:</b></h4>
                        <p>Entre las ventajas de reciclar podemos señalar a continuación las siguientes:</p>
                        <h5><b>¡Protege el medio ambiente!</b></h5>
                        <p>La principal ventaja del reciclaje es que ayuda a proteger el medio ambiente de la manera más equilibrada. Mientras que muchos árboles se cortan continuamente, el papel reciclado de algunos árboles se reutiliza varias veces para minimizar el enfriamiento y la deforestación. Con el papel reciclado como un ejemplo notable, se pueden reutilizar otros recursos naturales de esta manera.</p>
                        <h5><b>¡Reduce la contaminación!</b></h5>
                        <p>Los desechos industriales de hoy son la fuente principal de todo tipo de contaminación. El reciclaje de productos industriales como latas, productos químicos y plásticos ayuda a reducir significativamente los niveles de contaminación, ya que estos materiales se reutilizan, en lugar de tirarlos de manera irresponsable.</p>
                        <h5><b>¡Reduce el calentamiento global!</b></h5>
                        <p>El reciclaje ayuda a aliviar el calentamiento global y sus efectos negativos. Los desechos masivos que se queman en montones producen grandes cantidades de emisiones de gases de efecto invernadero, como el CO2 y el CFC. El reciclaje asegura que el proceso de combustión se mantenga al mínimo y que cualquier residuo se genere de nuevo como un producto útil sin o con un impacto negativo mínimo sobre el medio ambiente. El reciclaje produce menos gases de efecto invernadero, ya que las industrias queman menos combustibles fósiles por productos ecológicos.</p>
                        <h5><b>¡Uso juicioso y sostenible de los recursos!</b></h5>
                        <p> El reciclaje promueve el uso judicial y sostenible de los recursos. Este proceso garantiza que no haya un uso discriminado de ningún material cuando esté disponible en abundancia en el presente. Se fomenta el reciclaje en todos los niveles, comenzando con la escuela para oficinas corporativas e internacionalmente. Esto significa que podemos conservar todos los recursos preciosos para nuestra generación futura, sin ningún compromiso en el presente.</p>
                        <h5><b>¡Conserva los recursos naturales!</b></h5>
                        <p>Si los materiales viejos y usados ​​no se reciclan, los nuevos productos se obtienen extrayendo materia prima fresca de debajo de la tierra mediante extracción y extracción. El reciclaje ayuda a guardar importantes materias primas y protege los hábitats naturales para el futuro. La conservación de los recursos naturales como la madera, el agua y los minerales garantiza su uso óptimo.</p>
                        <h5><b>¡Reduce la cantidad de residuos en los vertederos !</b></h5>
                        <p>El reciclaje de residuos en nuevos productos reduce la cantidad de residuos destinados a los vertederos. Esto ayuda a reducir la contaminación del agua y la tierra ya que los vertederos son una fuente importante que contribuye a la destrucción del medio ambiente.</p>
                        <div class="divider"></div>
                        <h4><b>¿Cómo reciclar?</b></h4>
                        <img id="img1" class=" img-responsive z-depth-5" src="../assets/img/recicla4.png">
                        <p>Reciclar es importante, pero para saber qué lo estamos haciendo bien existen varias etapas o técnicas que a continuación les presentamos. Reciclar dentro y alrededor del hogar puede ser fácil cuando sabes cómo hacerlo. Pensar cuidadosamente sobre qué productos comprar en el supermercado y cómo reciclarlos es el primer paso hacia un reciclaje eficiente.</p>
                        <h5><b>Encuentra formas de reciclar diferentes materiales...</b></h5>
                        Muchos materiales se pueden reciclar, como papel, plástico, metal y vidrio. Otros artículos como muebles, equipos electrónicos, materiales de construcción y vehículos también se pueden reciclar, pero muchas personas a menudo no piensan hacerlo.</p>
                        <h5><b>Compra productos que puedan reciclarse.</b></h5>
                        <p>Cuando compres en el supermercado, compra productos que puedan reciclarse fácilmente, como frascos de vidrio y latas. Compra productos que hayan sido hechos de material reciclado Puede ver si un producto es ecológico mirando la etiqueta en el empaque.</p>
                        <h5><b>Evita comprar material peligroso</b></h5>
                        <p>Es difícil reciclar productos que contienen desechos peligrosos. Trate de encontrar alternativas más seguras a los productos de limpieza del hogar y compre productos no tóxicos siempre que sea posible.</p>
                        <h5><b>Asegúrate de tener una papelera de reciclaje en casa</b></h5>
                            
                          
                        <p>Tendrás que guardarla en un lugar obvio para que no te olvides de usarla. En muchas ciudades además se reparte de manera gratuita pequeñas papeleras para reciclar papel, vidrio y comida.</p>
                        
                          
                          
                        </div>
                        
                        <h5><b>¡Planta árboles!</b></h5>
                        <p>Por otro lado, la plantación de árboles en el jardín ayuda a mejorar el medio ambiente al reducir el calentamiento global y proporcionar un hogar para muchos animales.</p>

                        <div class="divider"></div>
                        <h4><b>¿Qué se puede reciclar?</b></h4>
                        <img id="img1" class=" img-responsive z-depth-5" src="../assets/img/reciclar3.jpg">
                        <p>Junto al modo en el que podemos reciclar, tenemos que hablar también de todos los materiales que se pueden reciclar en la sociedad actual. A continuación, se enumeran algunos de los artículos reciclables más comunes que las personas encuentran en sus vidas cotidianas.</p>
                        <h5><b>Metal</b></h5>
                        <p>Los metales que usamos en nuestra vida cotidiana muchas veces son reciclables. Al ser un material muy versátil, reciclar metal consume más de un setenta por ciento menos de energía que lo que produce para producir un artículo completamente nuevo. Entre los materiales de metal que podemos reciclar estarían: 
                          <br><b>• Papel de aluminio:</b> (así como utensilios para hornear) puede reciclarse fácilmente. Al fundir los productos de aluminio y simplemente reutilizar el aluminio, el metal se puede reciclar casi infinitamente.
                          <br><b> • Latas de aluminio:</b> Si recicláramos más latas, se ahorraría inmensas cantidades de energía para reciclar y reutilizarlos en lugar de fabricar otros nuevos.
                          <br><b> • Acero y botes:</b> cosas como botes de café, recipientes para sopa, latas de verduras, etc., son elementos de metal que también podemos reciclar.
                        <h5><b>Papel y cartón</b></h5>
                        La mayoría de las personas puede mirar a su alrededor en casi cualquier punto del día y ver productos de papel o papel. El papel es un material que no tiene límites en el mundo del reciclaje. Los materiales de papel y cartón que se pueden reciclar son:
                        <br><b> • Cartón corrugado:</b> conforma la mayor parte del cartón en la vida cotidiana de las personas. Más del setenta por ciento de las cajas de envío ya han sido reutilizadas como serrín, astillas de madera u otros productos de papel. Otros artículos de cartón reciclado se utilizan para hacer cosas como cajas de cereal, papel de seda, papel de impresión y cartulina.
                        <br><b> • Revistas y periódicos:</b> muchas personas todavía tienen revistas y periódicos en sus buzones de correo y en los porches. Con demasiada frecuencia, estos son anuncios basura o publicaciones no deseadas que van directamente a la basura. Una tonelada de papel reciclado puede ahorrar energía suficiente para alimentar a un hogar durante más de cinco meses.
                        <br><b> • Papel de oficina y cartulinas:</b> la mayoría de las personas interactúan con al menos una hoja de papel por día. Los papeles están en el buzón, la impresora, en todas partes. El papel puede reutilizarse fácilmente ahorrando altos costos de producción y niveles de energía para nuevos productos.
                        <h5><b>Vidrio</b></h5>
                        Las botellas de vidrio y los frascos no son tan versátiles como el papel o los productos de metal cuando se trata de reciclar. Debido a los diversos colores del vidrio, muchos elementos solo pueden reutilizarse en otro del mismo artículo. Los diferentes tipos de reciclaje de vidrio generalmente se refieren al color de la botella o jarra.</p>











    
                    </div>
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
  <script src="../assets/js/materialize.min.js"></script>
  <script src="../controllers/index-controller.js"></script>
  <script>
    $(document).ready(function(){
      $(".dropdown-button").dropdown();
      $(".button-collapse").sideNav(); 
    });
  </script>
</body>
</html>
<!-- style="overflow-y:scroll;" -->