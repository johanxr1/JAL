/*--------------------------------------------------------------
								CONFIGURAR 
---------------------------------------------------------------*/


/*--------------------------------------------------------------
			ACCION Y VERIFICACION CON MODALES CONFIGURAR 
---------------------------------------------------------------*/
	//LISTADO AUTOMATICO DE TUS EVENTOS
	$('document').ready(function(event){
	//event.preventDefault();
				//Materialize.toast('Listo', 3000, 'rounded');
				var datos = {
					iduser: $('#iduser').val()
				};

				$.ajax({
					url: '../models/historial.php',
					type: 'POST',
					data: datos,
					success:  function (respf) {
						//console.log(r);
						// Materialize.toast('Listando', 3000, 'rounded');
					console.log(respf);
					
					console.log("'respf'");
					var events =$.parseJSON(respf);
					var eventsa =events.ractivo;
					//console.log(eventsa);
					var eventsi =events.rinactivo;
					//console.log(eventsi);
					if (eventsa!=false) {
					listEvent1(eventsa);
					//listEvent2(eventsi);
					}else{
					$('#listEvent').append('<li><div class="container"><p>No ha participado en eventos activos</p></div></li>');
					
					}
                	
                	if (eventsi!=false) {
					listEvent2(eventsi);
					//listEvent2(eventsi);
					}else{
					$('#listEvent1').append('<li><div class="container"><p>No ha participado en eventos culminados</p></div></li>');
					
                }
           	 }

				});
});
	list1 = false;
	// LISTAR EVENTOS PERSONALES
	function listEvent1(eventsa){
		//
	if(eventsa.length >0){
		list1 = true;
	for (var i = 0; i < eventsa.length; i++) {
		var verMas=	'<div class="row">'+
				            '<a class="col s4 offset-s4" style="margin-top:2rem;" href="./singleEvento.php?idevento='+eventsa[i].idevento+'" target="_blank">Ver mas</a>'+
				        '</div>';

		if (eventsa[i].typeEvent==='educativo'){
			var icon='local_library';
			var color='#42A5F5 !important;';
		}
		if (eventsa[i].typeEvent==='reciclaje'){
			var icon='sync';
			var color='#66BB6A !important;';
		}
		if (eventsa[i].typeEvent==='voluntario'){
			var icon='group';
			var color='#ab47bc !important;';
		}

		$('#listEvent').append('<li>'+
				'<div class="collapsible-header "><i class="material-icons" style="color: '+color+' border-right: 1px solid #bfbfbf;padding-right: 34px;">'+icon+'</i>Evento '+eventsa[i].typeEvent+'</div>'+
				'<div class="collapsible-body">'+
					'<div style="margin: 0 2rem;">'+
						'<small style="display:block;"><strong>Inicio : </strong>'+eventsa[i].startDate+' / Hora : '+eventsa[i].startHour+'</small>'+
						'<small style="display:block; margin-botton:2rem;"><strong>Fin : </strong>'+eventsa[i].endDate+' / Hora : '+eventsa[i].endHour+'</small>'+
						'<small style="display:block;"><strong>Direccion : </strong>'+eventsa[i].address+'</small>'+
						'<small style="display:block; margin-botton:2rem;"><strong>Puntos de referencia : </strong>'+eventsa[i].reference+'</small>'+
						'<p style="margin-botton:2rem;">'+eventsa[i].description+'</p>'+
						verMas+
					'</div>'+
				'</div>'+
			'</li>'
		);
	}
	}//if
	else{
	$('#listEvent').append('<li><p>No ha participado en eventos</p></li>');
	}
	}
	list2 = false;
		// LISTAR EVENTOS PERSONALES
	function listEvent2(eventsi){
		
	if(eventsi.length > 0){
		list2 = true;
	for (var i = 0; i < eventsi.length; i++) {
		var verMas=	'<div class="row">'+
				            '<a class="col s4 offset-s4" style="margin-top:2rem;" href="./singleEvento.php?idevento='+eventsi[i].idevento+'" target="_blank">Ver mas</a>'+
				        '</div>';

		if (eventsi[i].typeEvent==='educativo'){
			var icon='local_library';
			var color='#42A5F5 !important;';
		}
		if (eventsi[i].typeEvent==='reciclaje'){
			var icon='sync';
			var color='#66BB6A !important;';
		}
		if (eventsi[i].typeEvent==='voluntario'){
			var icon='group';
			var color='#ab47bc !important;';
		}

		$('#listEvent1').append(
			'<li>'+
				'<div class="collapsible-header "><i class="material-icons" style="color: '+color+' border-right: 1px solid #bfbfbf;padding-right: 34px;">'+icon+'</i>Evento '+eventsi[i].typeEvent+'</div>'+
				'<div class="collapsible-body">'+
					'<div style="margin: 0 2rem;">'+
						'<small style="display:block;"><strong>Inicio : </strong>'+eventsi[i].startDate+' / Hora : '+eventsi[i].startHour+'</small>'+
						'<small style="display:block; margin-botton:2rem;"><strong>Fin : </strong>'+eventsi[i].endDate+' / Hora : '+eventsi[i].endHour+'</small>'+
						'<small style="display:block;"><strong>Dirección : </strong>'+eventsi[i].address+'</small>'+
						'<small style="display:block; margin-botton:2rem;"><strong>Puntos de referencia : </strong>'+eventsi[i].reference+'</small>'+
						'<p style="margin-botton:2rem;">'+eventsi[i].description+'</p>'+
						verMas+
					'</div>'+
				'</div>'+
			'</li>'
		);
	}
	$(".my-rating-6").starRating({
		totalStars: 5,
		emptyColor: 'lightgray',
		hoverColor: 'salmon',
		activeColor: 'cornflowerblue',
		initialRating: 4,
		strokeWidth: 0,
		useGradient: false,
		callback: function(currentRating, $el){
			alert('rated ' + currentRating);
			console.log('DOM element ', $el);
		}
	});
	}//if
	else{
	$('#listEvent1').append('<li><p>No ha participado en eventos</p></li>');
	}
	}