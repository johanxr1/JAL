<?php
  require_once('../conexion/seguridad.php');
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
  <link rel="stylesheet" href="../assets/css/fa-stars-ie7.css">
  <link rel="stylesheet" href="../assets/css/fa-stars.css">
  <title>Proyecto JAL</title>
</head>

<style>
  .comentarios {
    margin: 20px 0;
  }

  .form_comentarios textarea {
    width: 100%;
    height: 84px;
    max-width: 100%;
    min-width: 100%;
    min-height: 84px;
    max-height: 300px;
    padding: 10px;
    font-family: 'Roboto', sans-serif;
    line-height: 30px;
    border: 1px solid #4b65d1;
    margin-bottom: 20px;
  }

  .form_comentarios .btn {
    background: #4b65d1;
    font-family: 'Roboto', sans-serif;
    border-radius:0;
    color: #fff;
    margin-bottom: 20px;
  }

  .form_comentarios .btn:hover {
    box-shadow: 0px 0px 9px rgba(0,0,0,.35);
  }

  .media {
    border-top: 1px solid #bfbfbf;
    padding-top: 20px;
  }

  .media img {
    margin-right: 20px;
  }

  .media .nombre {
    color: #4b65d1;
    margin-bottom: 0;
  }

  .media .nombre span {
    font-size: 12px;
    color: #464646;
    margin-left: 10px;
  }

  .media .comentario {
    margin-top: 10px;
  }

  .media .botones {
    margin-bottom: 10px;
  }

  .media .botones a {
    color: #acacac;
    font-size: 14px;
    margin-left: 20px;
  }
</style>
<body >

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Denunciar Evento</h4>
      <div style="margin:0 2rem;s">
        <p>Describe las razones por la que denuncia el evento </p>
        <div class="row">
          <div class="input-field col s12">
            <textarea id="denuncia" class="materialize-textarea" data-length="120"></textarea>
            <label for="denuncia">Descripción del problema</label>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
      <a id="denunciar" href="#!" class="modal-action waves-effect waves-green btn-flat">Denunciar</a>
    </div>
  </div>

  <div class="flexbox-parent">
    <!-- Dropdown Structure -->
    <?php include('../views/navbar.php');  ?>
    <!-- Barra de navegacion -->
    
    <div id="blaa" class="container">
      <div class="info"></div>
      <div class="row comentarios">
        <div class="wrapper col s10">
          <form style="margin-top: 3rem;" action="" class="form_comentarios">
            <textarea name="" id="comentt" placeholder="Comentario"></textarea>
            <button style="padding-left: 15px;" id="comentar" class="btn" type="button"><i class="material-icons left">edit</i>Comentar</button>
          </form>
          <div id="comentarios">
            
          </div>
        </div>
      </div>
    </div>
 
   
  </div>




  <!-- SCRIPTs -->
  <script src="../assets/js/jquery-3.2.1.min.js"></script>
  <script src="../assets/js/js.cookie.min.js"></script>
  <script src="../assets/js/materialize.min.js"></script>
  <script src="../assets/js/jquery.star-rating.js"></script>  
  <script src="../controllers/singleEvent-controller.js"></script>
</body>
</html>
