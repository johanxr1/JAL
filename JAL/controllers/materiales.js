/*--------------------------------------------------------------
								CONFIGURAR 
---------------------------------------------------------------*/


/*--------------------------------------------------------------
			ACCION Y VERIFICACION DE MATERIALES 
---------------------------------------------------------------*/
	//LISTADO AUTOMATICO DE TUS MATERIALES
	$('document').ready(function(event){
				var datos = {
					iduser: $('#iduser').val()
				};

				$.ajax({
					url: '../models/materiales.php',
					type: 'POST',
					data: datos,
					success:  function (r) {
						console.log(r);
						// Materialize.toast('Listando', 3000, 'rounded');					
					if (r!=false) {
					var events =$.parseJSON(r);
					$('#p1').append('<p>'+events[0].cantidad+'Kg</p>');
					$('#p2').append('<p>'+events[1].cantidad+'Kg</p>');
					$('#p3').append('<p>'+events[2].cantidad+'Kg</p>');
					$('#p4').append('<p>'+events[3].cantidad+'Kg</p>');
					$('#p5').append('<p>'+events[4].cantidad+'Kg</p>');
					}else{
					$('#p1').append('<p>0Kg</p>');
					$('#p2').append('<p>0Kg</p>');
					$('#p3').append('<p>0Kg</p>');
					$('#p4').append('<p>0Kg</p>');
					$('#p5').append('<p>0Kg</p>');	
					}
				}});
});
	//--------------------BOTONES---------------------
	//BOTON AUMENTAR PAPELES
  		$('#bt1').click(function (event) {
  				event.preventDefault();
			if($('#i1').val()=="" || $('#i1').val()<="0") {
				Materialize.toast('Campos vacios o negativos', 3000, 'rounded');
			}else{
				var datos = {
					v1: $('#i1').val(),
					v2: 1
				};

				$.ajax({
					url: '../models/aumentar.php',
					type: 'POST',
					data: datos,
					success:function(resp){
						Materialize.toast('Papeles +', 3000, 'rounded');
						location.href ="../views/materiales.php";
					}
				});
			}
  	});
  		//BOTON AUMENTAR PlASTICOS
  		$('#bt2').click(function (event) {
  				event.preventDefault();
			if($('#i2').val()=="" || $('#i2').val()<="0") {
				Materialize.toast('Campos vacios o negativos', 3000, 'rounded');
			}else{
				var datos = {
					v1: $('#i2').val(),
					v2: 2
				};

				$.ajax({
					url: '../models/aumentar.php',
					type: 'POST',
					data: datos,
					success:function(resp){
						Materialize.toast('Plasticos +', 3000, 'rounded');
						location.href ="../views/materiales.php";
					}
				});
			}
  	});
  		//BOTON AUMENTAR CARTON
  		$('#bt3').click(function (event) {
  				event.preventDefault();
			if($('#i3').val()=="" || $('#i3').val()<="0") {
				Materialize.toast('Campos vacios o negativos', 3000, 'rounded');
			}else{
				var datos = {
					v1: $('#i3').val(),
					v2: 3
				};

				$.ajax({
					url: '../models/aumentar.php',
					type: 'POST',
					data: datos,
					success:function(resp){
						Materialize.toast('Cartones +', 3000, 'rounded');
						location.href ="../views/materiales.php";
					}
				});
			}
  	});
  		//BOTON AUMENTAR ELECTRONICOS
  		$('#bt4').click(function (event) {
  				event.preventDefault();
			if($('#i4').val()=="" || $('#i4').val()<="0") {
				Materialize.toast('Campos vacios o negativos', 3000, 'rounded');
			}else{
				var datos = {
					v1: $('#i4').val(),
					v2: 4
				};

				$.ajax({
					url: '../models/aumentar.php',
					type: 'POST',
					data: datos,
					success:function(resp){
						Materialize.toast('Electronicos +', 3000, 'rounded');
						location.href ="../views/materiales.php";
					}
				});
			}
  	});
  		//BOTON AUMENTAR VIDRIOS
  		$('#bt5').click(function (event) {
  				event.preventDefault();
			if($('#i5').val()=="" || $('#i5').val()<="0") {
				Materialize.toast('Campos vacios o negativos', 3000, 'rounded');
			}else{
				var datos = {
					v1: $('#i5').val(),
					v2: 5
				};

				$.ajax({
					url: '../models/aumentar.php',
					type: 'POST',
					data: datos,
					success:function(resp){
						Materialize.toast('Vidrios +', 3000, 'rounded');
						location.href ="../views/materiales.php";
					}
				});
			}
  	});