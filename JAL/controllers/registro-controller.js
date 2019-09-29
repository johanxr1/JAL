;
$(document).ready(function(){
	$('.modal').modal({
		dismissible: false, // Modal can be dismissed by clicking outside of the modal
		opacity: .5, // Opacity of modal background
		inDuration: 300, // Transition in duration
		outDuration: 200, // Transition out duration
		startingTop: '4%', // Starting top style attribute
		endingTop: '10%', // Ending top style attribute
	});


	// COMPROBAR SI ES INVALIDO EL CORREO PARA APARECER TOOLTIP
	$('#emailUser').keyup(function() {
		var val=$("#emailUser").val();
		var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
		if(regex.test(val)){
			if ($('#emailUser').hasClass('invalid')) {
				$('#emailUser').removeClass('invalid');
			}		 
		}else{
			if (!$('#emailUser').hasClass('invalid')){
				$('#emailUser').addClass('invalid');
			}	
		}
	});

	//validar correo en la base de datos y formato correco
	$("#emailUser").on("blur", function() {
    	if ($("#emailUser").hasClass('invalid') || $("#emailUser").value === '') {
    		Materialize.toast('Correo invalido <br> Ingrese formato usuario@servicio.com', 3000, 'rounded');	
    	}else{
    		console.log("voy a checkMailStatus()");
    		checkMailStatus();
    	}
  	});

	//Revisar correo en BD
	function checkMailStatus(){
		var email=$("#emailUser").val();
		$.ajax({
	    	type:'post',
	        url:'../models/checkEmail.php',
	        data:{email: email},
	        success:function(msg){
	        	var resp =$.parseJSON(msg);
		        if(resp==='false'){
					if ($('#emailUser').hasClass('invalid')) {
						$('#emailUser').removeClass('invalid');
					}	
				}else {
		        	var baseMsg='Ya estas registrado con ';
		        	for (var i = 0; i < resp.length; i++) {
		        		baseMsg+=' '+resp[i]['service'];
		        	}
			       	Materialize.toast(baseMsg, 3000, 'rounded');
					$('#emailUser').addClass('invalid');
	        	}
	    	}
		});
    }

	// Validar contraseña
	$("#password").on("blur", function() {
		var RegExPattern = /^[a-zA-Z0-9]{8,20}$/;
		if ((this.value.match(RegExPattern)) && (this.value != '')) {
			$('#password').removeClass('invalid');
		} else if (this.value != ''){
			Materialize.toast('Contrase&ntilde;a invalida <br> Debe contener: <br> letras, numeros y entre 8 y 20 caracteres', 3000, 'rounded');
			$('#password').addClass('invalid');
		}else{
			$('#password').addClass('invalid');
		}
	});

	// COMPROBAR SI LAS CONTRASEÑAS SON IGUALES
		var entro=false;
		$("#psw").click(function(){
			entro=true;
		});
		$("#psw,#password").blur(function(){
			if($("#password").val() != $("#psw").val()) {
				if (entro==true) {
					$('#errorPassword').removeClass('hide');
		    		$('#psw').addClass('invalid');
				}
			}else{
				if(!$("#errorPassword").hasClass('hide')) {

			    	$('#errorPassword').addClass('hide'); 
			    	$('#psw').removeClass('invalid');
				}
			}	
		});	


  	//Validar telefono
	$("#telephone").on("blur", function() {
		var RegExPattern = /^[0-9]{4}-? ?[0-9]{7}$/;
		if ((this.value.match(RegExPattern)) && (this.value != '')) {
			$('#telephone').removeClass('invalid');
		}else{ 
			if (this.value != ''){
				Materialize.toast('Telefono invalido <br> Ingrese formato 0261-1234567 <br> O 0414-1234567', 4000, 'rounded');
				$('#telephone').addClass('invalid');
			}else{
				$('#telephone').addClass('invalid');
			}
		}
	});



	// BOTON SIGUIENTE
	$("#next").click(function(){
		event.preventDefault();
		if($('#emailUser').hasClass('invalid') || $('#password').hasClass('invalid') || $('#psw').hasClass('invalid') ){
			Materialize.toast('Corrige campos en rojo', 3000, 'rounded');
		}else {
			if($('#emailUser').val()=="" || $('#password').val()=="" || $('#psw').val()==""){
				Materialize.toast('Campos vacios', 3000, 'rounded');
			}else{
		    	$('#form1').addClass('animated bounceOutLeft hide');
		    	$('#form2').removeClass('hide');
		    	$('#form2').addClass('animated bounceInRight');
			}
		}
  	});


  	// BOTON IR HACIA ATRAS
	$("#back").click(function(){
		event.preventDefault();
		$('#form1').removeClass('animated bounceOutLeft hide');
		$('#form1').addClass('animated bounceInLeft');
		$('#form2').removeClass('animated bounceInRight');
		$('#form2').addClass('hide');
  	});

	// BOTON REGISTRAR
	$('#send').click(function (event) {
		event.preventDefault();

		if( $('#telephone').hasClass('invalid')){
			Materialize.toast('Corrige campos en rojo', 3000, 'rounded');
		}else {
			if($('#name').val()=="" || $('#addres').val()=="" || $('#telephone').val()=="" || $('#email').val()=="") {
				Materialize.toast('Campos vacios', 3000, 'rounded');
			}else{
				var datos = {
					emailUser: $('#emailUser').val(),
					password: $('#password').val(),
					name: $('#name').val(),
					addres: $('#addres').val(),
					telephone: $('#telephone').val(),
				};

				$.ajax({
					url: '../models/registro_JAL.php',
					type: 'POST',
					data: datos,
					success:function(resp){						
						var resp2 = $.parseJSON(resp);
						if (resp2.tipo='alert-success') {
							$('#mensaje').append('Te has registrado con exito, has click en el boton inicio para empezar.');
							$('#redirec').text('Inicio');
							$('#modal-msj').modal('open');
						  	// BOTON REDIRECCIONAR DE MODAL MENSAJE
							$("#redirec").click(function(event){
								event.preventDefault();
								window.location = '../views/home.php';
						  	});
							setTimeout(function(){
								window.location = '../views/home.php';
							}, 5000);
						}else{
							$('#mensaje').append('Lo sentimos hubo un error al registrarte, has click en el boton registro para intentar nuevamente \n\n'+resp2.mensaje);
							$('#redirec').text('Resgistrarse');
						  	// BOTON REDIRECCIONAR DE MODAL MENSAJE
							$("#redirec").click(function(event){
								event.preventDefault();
								window.location = '../views/registro.php';
						  	});
						}									
					}
				});
			}
		}
  	});
  	
});




