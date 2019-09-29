/*--------------------------------------------------------------
								GENERAL 
---------------------------------------------------------------*/


/*--------------------------------------------------------------
			INICIALIZANDO MAP Y FUNCIONES RELACIONADAS 
---------------------------------------------------------------*/
//BOTON FILTRO
// $('.filter').click(function(){
// 	if ($(this).hasClass('reciclaje')){
// 		if ($(this).hasClass('hidden')) {
// 			$(this).removeClass('hidden');
// 			showMakers('educativo');
// 			showMakers('voluntario');
// 		}else{
// 			$(this).addClass('hidden');
// 			hideMakers('educativo');
// 			hideMakers('voluntario');
// 		}	
// 	}
// 	if ($(this).hasClass('educativo')){
// 		if ($(this).hasClass('hidden')) {
// 			$(this).removeClass('hidden');
// 			showMakers('reciclaje');
// 			showMakers('voluntario');
// 		}else{
// 			$(this).addClass('hidden');
// 			hideMakers('reciclaje');
// 			hideMakers('voluntario');
// 		}
// 	}
// 	if ($(this).hasClass('voluntario')) {
// 		if ($(this).hasClass('hidden')) {
// 			$(this).removeClass('hidden');
// 			showMakers('educativo');
// 			showMakers('reciclaje');
// 		}else{
// 			$(this).addClass('hidden');
// 			hideMakers('educativo');
// 			hideMakers('reciclaje');
// 		}
// 	}
// });
// $('document').ready(function(event){
// var datos = {
// 					iduser: $('#iduser').val()
// 				};
// $.ajax({
// 					url: '../models/validardt.php',
// 					type: 'POST',
// 					data: datos,
// 					success:  function (r5) {
// 						console.log(r5);
// 						// Materialize.toast('Listando', 3000, 'rounded');
// 					if (r5!=false) {
// 						Materialize.toast('Perfil', 3000, 'rounded');
// 					}else{
// 						Materialize.toast('Actualize Datos', 3000, 'rounded');	
// 					}
// 				}
// 				});

// });
$('document').ready(function(event){
	//event.preventDefault();
				//Materialize.toast('Listo', 3000, 'rounded');
				var datos = {
					iduser: $('#iduser').val()
				};

				$.ajax({
					url: '../models/reportes.php',
					type: 'POST',
					data: datos,
					success:  function (r) {
						console.log(r);
						// Materialize.toast('Listando', 3000, 'rounded');
					
					if (r!=false) {
					var events =$.parseJSON(r);
					listEvent(events);
					}else{
					$('#listEvent').append('<li><div class="container"><p>No hay eventos registrados</p></div></li>');}
                }
				});
});

//BOTON Listar
  		$('#list').click(function (event) {
  				event.preventDefault();
				//Materialize.toast('Listo', 3000, 'rounded');
				if($('#iduser').val()!="") {

				var datos = {
					iduser1: $('#iduser').val()
				};
				$('#listsearch').children().remove();

				$.ajax({
					url: '../models/busqueda.php',
					type: 'POST',
					data: datos,
					success:  function (r1) {
						console.log(r1);
						
					if (r1!=false) {
						var events1=$.parseJSON(r1);
						Materialize.toast('Listado', 3000, 'rounded');
						console.log(events1);
						listsearch(events1)
					}
					else{Materialize.toast('No hay en esa zona', 3000, 'rounded');
				}
                }
				});
			}else{Materialize.toast('Campos vacios', 3000, 'rounded'); }
  	});
// LISTAR EVENTOS PERSONALES
function listEvent(events){
	if(events.length >0){
	for (var i = 0; i < events.length; i++) {

		if (events[i].typeEvent==='educativo'){
			var icon='local_library';
			var color=' green lighten-1';
		}
		if (events[i].typeEvent==='reciclaje'){
			var icon='sync';
			var color='blue lighten-1';
		}
		if (events[i].typeEvent==='voluntario'){
			var icon='group';
			var color='deep-purple lighten-1';
		}

		$('#listEvent').append('<li>'+
			'<div class="collapsible-header '+color+'"><i class="material-icons">'+icon+'</i>'+events[i].typeEvent+'</div>'+
			'<div class="collapsible-body"><span>Direccion: '+events[i].address+'</span><br><span>Fecha Inicio:'+events[i].startDate+'</span>'+
			'<br><span>Fecha Cierre:'+events[i].endDate+'</span><br><span>Descipcion: '+events[i].description+'</span></div>'+
			'</li>'
		);
	}
}//if
else{
$('#listEvent').append('<li><p>No hay eventos registrados</p></li>');
}
}
//LISTAR EVENTOS DE BUSQUEDA
function listsearch(events1){
	for (var i = 0; i < events1.length; i++) {

		if (events1[i].typeEvent==='educativo'){
			var icon='local_library';
			var color=' green lighten-1';
		}
		if (events1[i].typeEvent==='reciclaje'){
			var icon='sync';
			var color='blue lighten-1';
		}
		if (events1[i].typeEvent==='voluntario'){
			var icon='group';
			var color='deep-purple lighten-1';
		}

		$('#listsearch').append('<li>'+
			'<div class="collapsible-header '+color+'"><i class="material-icons">'+icon+'</i>'+events1[i].typeEvent+'</div>'+
			'<div class="collapsible-body"><span>Direccion: '+events1[i].address+'</span><br><span>Fecha Inicio:'+events1[i].startDate+'</span>'+
			'<br><span>Fecha Cierre:'+events1[i].endDate+'</span><br><span>Descipcion: '+events1[i].description+'</span></div>'+
			'</li>'
		);
	}

 }