/*--------------------------------------------------------------
								GENERAL 
---------------------------------------------------------------*/


//usage
var idusera = document.getElementById("myText").value
//var idusera = <?php echo $_SESSION['idusera']; ?>

//var idusera = $('<?php $iduserpu ?>').val()
console.log(idusera);

$('document').ready(function(event){
	//event.preventDefault();
				//Materialize.toast('Listo', 3000, 'rounded');

				var datos = {
				idusera: idusera		
				};

				$.ajax({
					url: '../models/perfilpu.php',
					type: 'POST',
					data: datos,
					success:  function (r) {
						console.log(r);
						// Materialize.toast('Listando', 3000, 'rounded');
					
					if (r!=false) {
					var events =$.parseJSON(r);
					listEvent(events);
					}else{
					$('#listEvent').append('<li><div class="container"><p>No hay usuario registrados</p></div></li>');}
                }
				});
});
// LISTAR EVENTOS PERSONALES
function listEvent(events){
	if(events.length >0){
	for (var i = 0; i < events.length; i++) {

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

		$('#listEvent').append(	'<li>'+
				'<div class="collapsible-header "><i class="material-icons" style="color: '+color+' border-right: 1px solid #bfbfbf;padding-right: 34px;">'+icon+'</i>Evento '+events[i].typeEvent+'</div>'+
				'<div class="collapsible-body">'+
					'<p><img style="height: 54px;" src="'+events[0].imgUrl+'"class="circle " ><em style="font-weight: bold; margin-left:1rem;">Creado por</em></p>'+
					'<div style="margin: 0 2rem;">'+
						'<small style="display:block;"><strong>Inicio : </strong>'+events[i].startDate+' / Hora : '+events[i].startHour+'</small>'+
						'<small style="display:block; margin-botton:2rem;"><strong>Fin : </strong>'+events[i].endDate+' / Hora : '+events[i].endHour+'</small>'+
						'<small style="display:block;"><strong>Direccion : </strong>'+events[i].address+'</small>'+
						'<small style="display:block; margin-botton:2rem;"><strong>Puntos de referencia : </strong>'+events[i].reference+'</small>'+
						'<p style="margin-botton:2rem;">'+events[i].description+'</p>'+
					'</div>'+
				'</div>'+
			'</li>'
		);
	}
	$('#listperfil').append('<li class="collection-header"><img style="height: 64px;" src="'+events[0].imgUrl+'" alt="" class="circle " ></li>'+
		'<li class="collection-item">Nombre: '+events[0].name+'</li>'+
		'<li class="collection-item">Email: '+events[0].email+'</li>'+
		'<li class="collection-item">Teléfono: '+events[0].tlf+'</li>'+
		'<li class="collection-item">Dirección: '+events[0].address+'</li>'
		
		);
	//location.href ="../views/perfilpu.php";





}//if
else{
$('#listEvent').append('<li><p>No hay eventos registrados</p></li>');
}
}
// LISTAR EVENTOS DE BUSQUEDA
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