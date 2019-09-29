;
$(document).ready(function(){
  	//Validar telefono
	$("#telephone").on("blur", function() {
		var RegExPattern = /^[0-9]{4}-? ?[0-9]{7}$/;
		if ((this.value.match(RegExPattern)) && (this.value != '')) {
			$('#telephone').removeClass('invalid');
		}else{ 
			if (this.value != ''){
				Materialize.toast('Telefono invalido <br> Ingrese formato 0261-1234567 <br> O 04141234567', 3000, 'rounded');
				$('#telephone').addClass('invalid');
			}else{
				$('#telephone').addClass('invalid');
			}
		}
	});
	  	//Validar nombre
	$("#name").on("blur", function() {
		var RegExPattern = /^[a-zA-Z ]{2,50}$/;
		if ((this.value.match(RegExPattern)) && (this.value != '')) {
			$('#name').removeClass('invalid');
		}else{ 
			if (this.value != ''){
				Materialize.toast('Nombre invalido <br> Ejemplos: Jose, Maria, Ana', 3000, 'rounded');
				$('#name').addClass('invalid');
			}else{
				$('#name').addClass('invalid');
			}
		}
	});

		  	//Validar direccion
	$("#diruser").on("blur", function() {
		var RegExPattern = /^[a-zA-Z0-9 ]{10,120}$/;
		if ((this.value.match(RegExPattern)) && (this.value != '')) {
			$('#diruser').removeClass('invalid');
		}else{ 
			if (this.value != ''){
				Materialize.toast('Direccion invalido <br> Puede ser minimo 10 letras hasta 120', 3000, 'rounded');
				$('#diruser').addClass('invalid');
			}else{
				$('#diruser').addClass('invalid');
			}
		}
	});

//BOTON ACTUALIZAR TELEFONO
  		$('#telbt').click(function (event) {
  				event.preventDefault();

		if($('#telephone').hasClass('invalid')){
			Materialize.toast('Corrige campos en rojo', 3000, 'rounded');
		}else {
			if($('#telephone').val()=="") {
				Materialize.toast('Campos vacios', 3000, 'rounded');
			}else{
				//Materialize.toast('Listo', 3000, 'rounded');
				var datos = {
					telephone: $('#telephone').val()
				};

				$.ajax({
					url: '../models/actualizar.php',
					type: 'POST',
					data: datos,
					success:  function (resp1) {
						$('#modaltlf').modal('close');
						Materialize.toast('TELEFONO', 3000, 'rounded');
						location.href ="../views/actualizar.php";
                }
				});
			}
		}
  	});

//BOTON ACTUALIZAR NOMBRE
  		$('#namebt').click(function (event) {
  				event.preventDefault();

		if($('#name').hasClass('invalid')){
			Materialize.toast('Corrige campos en rojo', 3000, 'rounded');
		}else {
			if($('#name').val()=="") {
				Materialize.toast('Campos vacios', 3000, 'rounded');
			}else{
				var datos = {
					name: $('#name').val()
				};

				$.ajax({
					url: '../models/actualizar.php',
					type: 'POST',
					data: datos,
					success:function(resp){
						Materialize.toast('NOMBRE', 3000, 'rounded');
						$('#modalname').modal('close');
						location.href ="../views/actualizar.php";

					}
				});
			}
		}
  	});
  		//BOTON ACTUALIZAR DIRECCION
  		$('#dirbt').click(function (event) {
  				event.preventDefault();

		if($('#diruser').hasClass('invalid')){
			Materialize.toast('Corrige campos en rojo', 3000, 'rounded');
		}else {
			if($('#diruser').val()=="") {
				Materialize.toast('Campos vacios', 3000, 'rounded');
			}else{
				var datos = {
					diruser: $('#diruser').val()
				};

				$.ajax({
					url: '../models/actualizar.php',
					type: 'POST',
					data: datos,
					success:function(resp2){
						$('#modaldir').modal('close');
						Materialize.toast('DIRECCION', 3000, 'rounded');
						location.href ="../views/actualizar.php";
															
					}
				});
			}
		}
  	});
  		//validar contraseñas
	$("#pswa,#pswn,#pswnr").on("blur", function() {
		var RegExPattern = /^[a-zA-Z0-9]{8,20}$/;
		if ((this.value.match(RegExPattern)) && (this.value != '')) {
			$('#pswa,#pswn,#pswnr').removeClass('invalid');
		} else if (this.value != ''){
			Materialize.toast('Contrase&ntilde;a invalida <br> Debe contener: <br> letras, numeros y entre 8 y 20 caracteres', 3000, 'rounded');
			$('#pswa,#pswn,#pswnr').addClass('invalid');
		}else{
			$('#pswa,#pswn,#pswnr').addClass('invalid');
		}
	});
	// COMPROBAR SI LAS CONTRASEÑAS SON IGUALES
	var entro=false;
	$("#pswn").click(function(){
		entro=true;
	});
	$("#pswnr").blur(function(){
		if($("#pswn").val() != $("#pswnr").val()) {
			if (entro==true) {
				$('#errorPassword').removeClass('hide');
	    		$('#pswnr').addClass('invalid');
			}
		}else{
			if(!$("#errorPassword").hasClass('hide')) {

		    	$('#errorPassword').addClass('hide'); 
		    	$('#pswn').removeClass('invalid');
			}
		}	
	});

  		//BOTON ACTUALIZAR CLAVE
  		$('#pswbt').click(function (event) {
  				event.preventDefault();

		if($('#pswa,#pswn,#pswnr').hasClass('invalid')){
			Materialize.toast('Corrige campos en rojo', 3000, 'rounded');
		}else {
			if($('#pswa,#pswn,#pswnr').val()=="") {
				Materialize.toast('Campos vacios', 3000, 'rounded');
			}else{
				var datos = {
					pswnr: $('#pswnr').val(),
					pswa: $('#pswa').val(),
				};

				$.ajax({
					url: '../models/actualizar.php',
					type: 'POST',
					data: datos,
					success:function(resp3){
						//Materialize.toast('PSW', 3000, 'rounded');	
						console.log(resp3);								
					}
				});
			}
		}
  	});

});




