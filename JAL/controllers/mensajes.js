/*--------------------------------------------------------------
								CONFIGURAR 
---------------------------------------------------------------*/


/*--------------------------------------------------------------
			ACCION Y VERIFICACION CON MODALES CONFIGURAR 
---------------------------------------------------------------*/
		//VALIDAR MENSAJE
	$("#sruser").on("blur", function() {
		var RegExPattern = /^[a-zA-Z0-9 ]{10,256}$/;
		if ((this.value.match(RegExPattern)) && (this.value != '')) {
			$('#sruser').removeClass('invalid');
		}else{ 
			if (this.value != ''){
				Materialize.toast('Mensaje invalido <br> Puede ser minimo 10 letras hasta 120', 3000, 'rounded');
				$('#sruser').addClass('invalid');
			}else{
				$('#sruser').addClass('invalid');
			}
		}
	});
	  		//BOTON SOLICITUD NIVEL
  		$('#dirsr').click(function (event) {
  				event.preventDefault();
			if($('#sruser').val()=="") {
				Materialize.toast('Campos vacios', 3000, 'rounded');
			}else{
				var datos = {
					v1: $('#sruser').val(),
					v2: 6
				};

				$.ajax({
					url: '../models/enviar.php',
					type: 'POST',
					data: datos,
					success:function(resp){
						Materialize.toast('Mensaje enviado', 3000, 'rounded');
						$('#modalsr').modal('close');
						//location.href ="../views/configurar.php";
					}
				});
			}
  	});




	//LISTADO AUTOMATICO DE TUS EVENTOS
	$('document').ready(function(event){
	//event.preventDefault();
				//Materialize.toast('Listo', 3000, 'rounded');
				var datos = {
					iduser: $('#iduser').val()
				};
				$.ajax({
					url: '../models/mensajes.php',
					type: 'POST',
					data: datos,
					success:  function (r) {
						//console.log(r);
						// Materialize.toast('Listando', 3000, 'rounded');
					
					if (r!=false) {
					var events =$.parseJSON(r);
					listEvent(events);
					}else{
					$('#listEvent').append('<li><div class="container"><p>No tienes mensajes</p></div></li>');}
                }
				});
});
	// LISTAR EVENTOS PERSONALES
	function listEvent(events){
	if(events.length >0){
	for (var i = 0; i < events.length; i++) {

		if (events[i].nuevo==='1'){
			var icon='sms_failed';
			var color=' red lighten-1';
			var nuevo= "Nuevo";
		}
		if (events[i].nuevo==='0'){
			var icon='sms';
			var color='red lighten-5';
			var nuevo= "Visto";
		}
		var idu = events[i].idmensaje;
		$('#listEvent').append('<li data-id="'+idu+'">'+
			'<div class="collapsible-header '+color+'"><i class="material-icons">'+icon+'</i>'+nuevo+'</div>'+
			'<div class="collapsible-body"><span>Enviado por: '+events[i].name+'</span><br><span>Fecha enviado:'+events[i].fechae+'</span>'+
			'<br><span>Mensaje:'+events[i].mensaje+'</span></div></li>');

	}//for
	}//if
	else{
	$('#listEvent').append('<li><p>No tienes mensajes</p></li>');
	}
	}

$(document).ready(function() {

    $('ul').on('click li', function(event) {

        var $target = $(event.target),
            itemId;
        $target = $target.is('li') ? $target : $target.closest('li');
        itemId = $target.data('id');

        // console.log($target.find('.lighten-5'));
        // $target.find('*').hasClass('.lighten-1').removeClass('.lighten-1')

        // Materialize.toast('Listando'+itemId, 3000, 'rounded');
        //do something with itemId
        var datos = {
				idmen: itemId
				};
				//console.log(idmen);
				$.ajax({
					url: '../models/mensajeup.php',
					type: 'POST',
					data: datos,
					success:function(resp){
					}
				});
    });
});