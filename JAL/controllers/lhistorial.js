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
					url: '../models/lhistorial.php',
					type: 'POST',
					data: datos,
					success:  function (r) {
						console.log(r);
						// Materialize.toast('Listando', 3000, 'rounded');
					
					if (r!=false) {
					var events =$.parseJSON(r);
					listEvent(events);
					}else{
					$('#listEvent').append('<li><div class="container"><p>No tienes eventos registrados</p></div></li>');}
                }
				});
});
	list = false;
	// LISTAR EVENTOS PERSONALES
	function listEvent(events){
	$('#listevent').append(
			'<thead><tr><th>ID</th><th>Tipo</th><th>Direccion</th>'+
			'<th>Creador</th><th>Fecha Inicio</th><th>Fecha cierre</th></tr></thead>');
	for (var i = 0; i < events.length; i++) {
$('#listevent').append(
			'<tbody><tr>'+
			'<th>'+events[i].idevento+'</th><th>'+events[i].typeEvent+'</th>'+
			'<th>'+events[i].typeEvent+'</th><th>'+events[i].name+'</th>'+
			'<th>'+events[i].startDate+'</th><th>'+events[i].endDate+'</th>'+
			'</tr></tbody>');
	}
	if(events.length >0){
		list = true;
	for (var i = 0; i < events.length; i++) {
		var verMas=	'<div class="row">'+
				            '<a class="col s4 offset-s4" style="margin-top:2rem;" href="./singleEvento.php?idevento='+events[i].idevento+'" target="_blank">Ver más</a>'+
				        '</div>';

		if (events[i].typeEvent==='educativo'){
			var icon='local_library';
			var color='#42A5F5 !important;';
		}
		if (events[i].typeEvent==='reciclaje'){
			var icon='sync';
			var color='#66BB6A !important;';
		}
		if (events[i].typeEvent==='voluntario'){
			var icon='group';
			var color='#ab47bc !important;';
		}

		$('#listEvent').append('<li>'+
				'<div class="collapsible-header "><i class="material-icons" style="color: '+color+' border-right: 1px solid #bfbfbf;padding-right: 34px;">'+icon+'</i>Evento '+events[i].typeEvent+'</div>'+
				'<div class="collapsible-body">'+
					'<div style="margin: 0 2rem;">'+
						'<small style="display:block;"><strong>Inicio : </strong>'+events[i].startDate+' / Hora : '+events[i].startHour+'</small>'+
						'<small style="display:block; margin-botton:2rem;"><strong>Fin : </strong>'+events[i].endDate+' / Hora : '+events[i].endHour+'</small>'+
						'<small style="display:block;"><strong>Dirección : </strong>'+events[i].address+'</small>'+
						'<small style="display:block; margin-botton:2rem;"><strong>Puntos de referencia : </strong>'+events[i].reference+'</small>'+
						'<p style="margin-botton:2rem;">'+events[i].description+'</p>'+
						verMas+
					'</div>'+
				'</div>'+
			'</li>'
		);
	}
	}//if
	else{
	$('#listEvent').append('<li><p>No tienes eventos registrados</p></li>');
	}
	}
		//LISTADO AUTOMATICO DE TUS EVENTOS
  		$('#pdf').click(function (event) {
  				event.preventDefault();
  				if(list == true){
				//Materialize.toast('Listo', 3000, 'rounded');
				var doc = new jsPDF('p', 'pt');
				var elem = document.getElementById("listevent");
				var res = doc.autoTableHtmlToJson(elem);
				doc.autoTable(res.columns, res.data);
				doc.save("table.pdf");
			}else{
				Materialize.toast('Liste primero', 3000, 'rounded');

			}
				
  	});	