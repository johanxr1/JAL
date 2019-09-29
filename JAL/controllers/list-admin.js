/*--------------------------------------------------------------
								GENERAL 
---------------------------------------------------------------*/


/*--------------------------------------------------------------
			INICIALIZANDO MAP Y FUNCIONES RELACIONADAS 
---------------------------------------------------------------*/
$('document').ready(function(event){
	//event.preventDefault();
				//Materialize.toast('Listo', 3000, 'rounded');
				var datos = {
					iduser: $('#iduser').val()
				};

				$.ajax({
					url: '../models/usuarios.php',
					type: 'POST',
					data: datos,
					success:  function (r) {
						console.log(r);
						// Materialize.toast('Listando', 3000, 'rounded');
					
					if (r!=false) {
						var events =$.parseJSON(r);
						listuser(events);
					}
                }
				});
});
var icon='local_library';
var color=' green lighten-1';

function listuser(events){
	if(events.length !=0){
	for (var i = 0; i < events.length; i++) {
		$('#listuser').append('<li>'+
			'<div class="collapsible-header '+color+'"><i class="material-icons">'+icon+'</i>'+events[i].name+'</div>'+
			'<div class="collapsible-body"><span>ID: '+events[i].id+'</span><br><span>Email:'+events[i].email+'</span>'+
			'<br><span>Direccion:'+events[i].address+'</span><br><span>Tlf: '+events[i].tlf+'</span></div>'+
			'</li>'
		);	
	}
}//if
else{
$('#listuser').append('<li><div class="collapsible-header '+color+'"><p>No Hay Usuarios</p></div></li>');

}


}
//-----------------------Listar EVENTOS---------------------------------------------
$('document').ready(function(event1){
	//event.preventDefault();
				//Materialize.toast('Listo', 3000, 'rounded');
				var datos = {
					iduser: $('#iduser').val()
				};

				$.ajax({
					url: '../models/eventos.php',
					type: 'POST',
					data: datos,
					success:  function (r) {
						console.log(r);
						// Materialize.toast('Listando', 3000, 'rounded');
					
					if (r!=false) {
						var events1 =$.parseJSON(r);
						listevent(events1);
					}
                }
				});
});
function listevent(events1){
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

		$('#listevent').append('<li>'+
			'<div class="collapsible-header '+color+'"><i class="material-icons">'+icon+'</i>'+events1[i].typeEvent+'</div>'+
			'<div class="collapsible-body"><span>Direccion: '+events1[i].address+'</span><br><span>Referencia:'+events1[i].reference+'</span>'+
			'<br><span>ID:'+events1[i].idevento+'</span><br><span>Descipcion: '+events1[i].description+'</span></div>'+
			'</li>'
		);	
	}

 }





 //BOTON AGREGAR MATERIAL
  		$('#ambtn').click(function (event) {
  				event.preventDefault();

			if($('#idam').val()=="") {
				Materialize.toast('Campos vacios', 3000, 'rounded');
			}else{
				//Materialize.toast('Listo', 3000, 'rounded');
				var datos = {
					idam: $('#idam').val()
				};

				$.ajax({
					url: '../models/admin.php',
					type: 'POST',
					data: datos,
					success:  function (resp) {
						console.log(resp)
						$('#modalam').modal('close');
						Materialize.toast('Se agrego el material', 3000, 'rounded');
						location.href ="../views/admin.php";
                }
				});
			}
		
  	});

// //BOTON Listar
//   		$('#list').click(function (event) {
//   				event.preventDefault();
// 				//Materialize.toast('Listo', 3000, 'rounded');
// 				var datos = {
// 					iduser1: $('#iduser').val()
// 				};

// 				$.ajax({
// 					url: '../models/busqueda.php',
// 					type: 'POST',
// 					data: datos,
// 					success:  function (r1) {
// 						console.log(r1);
						
// 					if (r1!=false) {
// 						var events1=$.parseJSON(r1);
// 						Materialize.toast('Listado', 3000, 'rounded');
// 						console.log(events1);
// 						listsearch(events1)
// 					}
// 					else{Materialize.toast('No hay', 3000, 'rounded');}
//                 }
// 				});
//   	});
// LISTAR EVENTOS PERSONALES
//LISTAR EVENTOS DE BUSQUEDA
// function listsearch(events1){
// 	for (var i = 0; i < events1.length; i++) {

// 		if (events1[i].typeEvent==='educativo'){
// 			var icon='local_library';
// 			var color=' green lighten-1';
// 		}
// 		if (events1[i].typeEvent==='reciclaje'){
// 			var icon='sync';
// 			var color='blue lighten-1';
// 		}
// 		if (events1[i].typeEvent==='voluntario'){
// 			var icon='group';
// 			var color='deep-purple lighten-1';
// 		}

// 		$('#listsearch').append('<li>'+
// 			'<div class="collapsible-header '+color+'"><i class="material-icons">'+icon+'</i>'+events1[i].typeEvent+'</div>'+
// 			'<div class="collapsible-body"><span>Direccion: '+events1[i].address+'</span><br><span>Fecha Inicio:'+events1[i].startDate+'</span>'+
// 			'<br><span>Fecha Cierre:'+events1[i].endDate+'</span><br><span>Descipcion: '+events1[i].description+'</span></div>'+
// 			'</li>'
// 		);	
// 	}

//  }
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