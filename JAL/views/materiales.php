<?php
  session_start();
  require_once('../vendor/autoload.php');
  require_once('../Auth/Auth.php');
    $tipouser = "Participante";
  if($_SESSION['user_tipo'] == 2){
    $tipouser = "Lider";
  }
    if($_SESSION['user_estatus'] == 1){
    $statususer = "Activo";
  }
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
  <style>
  .btn{
width: 70px;


  }
.vertical-menu {
    width: 250px;
}

.vertical-menu a {
  font-size: 16px;
    background-color: #eee;
    color: black;
    display: block;
    padding: 12px;
    text-decoration: none;
}

.vertical-menu a:hover {
    background-color: #ccc;
}

.vertical-menu a.active {
    background-color: #4CAF50;
    color: white;
}
</style>

</head>

<body>
	<div class="flexbox-parent">
	<nav class="nav-extended ">
		<?php include('../views/navbar.php');  ?>
		</nav>
		<div class="cotainer">
   <div class="row">

      <div class="col s12 m4 l3">
	<br><br>
<?php include('perfilbar.php');  ?>

      </div>

      <div class="col s12 m8 l9">

								<br>
								<p>Tus materiales</p>

                <div class="container">
                  <div class="row">
                    <div class="col s2 center">Papeles
                    <i class="medium material-icons ">wallpaper</i>
                    <div id="p1">                      
                    </div>
                    <input class="center" id="i1" type="number" placeholder="Kg">
                    <button id="bt1" class="btn waves-effect waves-light green darken-1">+</button>
                    </div>
                    <div class="col s2 center">Plásticos
                    <i class="medium material-icons">filter_none</i>
                    <div id="p2">                      
                    </div>
                    <input id="i2" class="center" type="number" placeholder="Kg">
                    <button id="bt2" class="btn waves-effect waves-light green darken-1">+</button>
                    </div>
                    <div class="col s2 center">Cartones
                    <i class="medium material-icons">filter_frames</i>
                    <div id="p3">                      
                    </div>
                    <input id="i3" class="center" type="number" placeholder="Kg">
                    <button id="bt3" class="btn waves-effect waves-light green darken-1">+</button>
                    </div>
                    <div class="col s2 center">Electrónicos
                    <i class="medium material-icons">settings_remote</i>
                    <div id="p4">                      
                    </div>
                    <input id="i4" class="center" type="number" placeholder="Kg">
                    <button id="bt4" class="btn waves-effect waves-light green darken-1">+</button>
                    </div>
                    <div class="col s2 center">Vidrios
                    <i class="medium material-icons">flip_to_back</i>
                    <div id="p5">                      
                    </div>
                    <input id="i5" class="center" type="number" placeholder="Kg">
                    <button id="bt5" class="btn waves-effect waves-light green darken-1">+</button>
                    </div>

                  </div>

                </div>
      </div>
    </div>
		</div>
	</div><!-- felxbox-parent -->
  <!-- SCRIPTs -->
  <script src="../assets/js/jquery-3.2.1.min.js"></script>
  <script src="../assets/js/handlebars.min.js"></script>
  <script src="../assets/js/snazzy-info-window.min.js"></script>
  <script src="../assets/js/materialize.min.js"></script>
  <!-- CONTROLADOR -->
  <script src="../controllers/basicos.js"></script>
  <script src="../controllers/materiales.js"></script>
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

</body>
</html>