
$.get = function(key){  
    key = key.replace(/[\[]/, '\\[');  
    key = key.replace(/[\]]/, '\\]');  
    var pattern = "[\\?&]" + key + "=([^&#]*)";  
    var regex = new RegExp(pattern);  
    var url = unescape(window.location.href);  
    var results = regex.exec(url);  
    if (results === null) {  
        return null;  
    } else {  
        return results[1];  
    }  
}
var idevento = $.get("idevento"); 
var checkDenuncia='';
var checkParticipacion='';
var materiales='';
function precisionRound(number, precision) {
  var factor = Math.pow(10, precision);
  return Math.round(number * factor) / factor;
}
// $.ajax({
// 	url: '../models/sigleEvent-model.php',
// 	type:'POST',
// 	data:{'idevento':idevento},
// 	success:function(resp){
// 		if (resp!=false) {
// 			var events=$.parseJSON(resp);

// 			//SISTEMA DE REPUTACION
// 			//Partiendo de un tope de 600 calificaciones postivas para 
// 			//tener las 6 estrellas se estable un porcentaje de representacion
// 			//realizando una regla de 3 para asi conocer el porcentaje de 
// 			//calificaciones tanto positivas como negativas, una vez conocidos
// 			//los porcentajes se restan y la diferencia da como resultado la reputacion
// 			if (events[1].reputacion !=false) {
// 				var puntajes =events[1].reputacion;
// 				var puntPosi=0;
// 				for (var i = 0; i < puntajes.length; i++) {
// 					puntPosi+=parseInt(puntajes[i].puntaje);
// 				}
// 				var puntNega=Math.abs(puntPosi-(puntajes.length*6));
// 				var reputacionPosi=(puntPosi*6)/600;
// 				var reputacionNega=(puntNega*6)/600;
// 				var reputacion=precisionRound(reputacionPosi-(reputacionNega), 2);
// 			}else{
// 				var reputacion=0;
// 			}

// 			//VERIFICAR SI YA HIZO UNA DENUNCIA
// 			if (events[1].denuncia) {
// 				checkDenuncia='disabled';	
// 			}

// 			//VERIFICAR SI YA ESTA PARTICIPANDO EN ESTE EVENTO
// 			if (events[1].participacion) {
// 				checkParticipacion='disabled';			
// 			}
			
// 			//LISTAR LOS MATERIALES EN CASO DE SER EVENTO DE RECICLAJE
// 			if (events[0].typeEvent=='reciclaje') {
// 				var listMateriales=events[1].materiales;
// 				for (var i = 0; i < listMateriales.length; i++) {
// 					materiales+=listMateriales[i].name+' , ';
// 				}
// 				materiales=materiales.substr(0, materiales.length-3);	
// 				materiales='<small style="display:block; margin-botton:2rem;"><strong>Materiales : </strong>'+materiales+'</small>';
// 			}

// 			//MOSTRAR LA INFO
// 			$('.info').append(
// 				'<h3 style="margin: 2rem 0 ;">Evento '+events[0].typeEvent+'</h3>'+
// 		     	'<div class="row">'+
// 		     		'<div class="col s1" >'+
// 		       			'<img class="circle " style="height: 54px;" src="'+events[0].imgUrl+'">'+
// 		        	'</div>'+
// 		     		'<div class="col s6" >'+
// 			        	'<em style="font-weight: bold;">Creado por '+
// 			          		'<a href="perfilpu.php?iduserpu='+events[0].users_id+'" target="_blank">'+events[0].name+'</a>'+
// 			       	 	'</em>'+ 
// 				      	'<h6>'+
// 				        	'<strong>Reputación : </strong>'+
// 				        	'<span class="rating">'+reputacion+' out of 6 star rating</span>'+
// 				      	'</h6>'+
// 						'<div style="padding:0;" class="col s12">'+
// 							'<a id="reportar" href="#modal1" style="letter-spacing:0; text-transform:none; padding: 0 1rem; height:25px; line-height:25px" class="'+checkDenuncia+' waves-effect red btn modal-trigger"><i style="margin-right:5px;" class="material-icons left">report</i>Reportar evento</a>'+
// 						'</div>'+
// 		        	'</div>'+    
// 		      	'</div>'+
// 				'<div style="margin: 0 2rem;">'+
// 					'<small style="display:block;"><strong>Inicio : </strong>'+events[0].startDate+' / Hora : '+events[0].startHour+'</small>'+
// 					'<small style="display:block; margin-botton:2rem;"><strong>Fin : </strong>'+events[0].endDate+' / Hora : '+events[0].endHour+'</small>'+	
// 					'<small style="display:block;"><strong>Direccion : </strong>'+events[0].address+'</small>'+
// 					'<small style="display:block; margin-botton:2rem;"><strong>Puntos de referencia : </strong>'+events[0].reference+'</small>'+
// 					 materiales+
// 					'<p style="margin:2rem 0;">'+events[0].description+'</p>'+
// 					'<div style="margin-top:2rem;" class="row">'+
// 						'<div class="col s4">'+
// 							'<button id="participar" style="padding-left: 15px;" class="'+checkParticipacion+' btn waves-effect waves-light" type="button"><i class="material-icons left">add</i>Participar</button>'+
// 							// '<a class="waves-effect waves-light btn-large"><i class="material-icons left">add</i>Participar</a>'+
// 						'</div>'+
// 					'</div>'+
// 				'</div>'
// 			);
// 		}
// 	}
// });

$(document).ready(function(){

	var array_idPreguntas = [];
	var flag=true;
	$('.rating').star_rating();
	$(".dropdown-button").dropdown();
	$(".button-collapse").sideNav();
	$('.modal').modal();

	requestFeedBack();

	function requestFeedBack(){
		$.ajax({
			url: '../models/feedBack-model.php',
			type:'POST',
			data:{'idevento':idevento},
			success:function(resp){
				var resp=$.parseJSON(resp);
				if (resp) {
					if (resp[0].listPreguntas) {
						var listPreguntas=resp[1];
						for (var i = 0; i < listPreguntas.length; i++) {
							console.log(checkidPregunta(listPreguntas[i].idPregunta));
							if (checkidPregunta(listPreguntas[i].idPregunta) != true) {
								$('#preguntas').prepend(
									'<div  style="display:none;" class=" '+listPreguntas[i].idPregunta+' row media">'+
										'<div class="col s2">'+
											'<img style="height: 54px;" src="'+listPreguntas[i].imgUrl+'" class="circle ">'+
										'</div>'+

										'<div id="'+listPreguntas[i].idPregunta+'" class="col s9 media-body">'+
											'<p style="margin-top: 0;" class="nombre">'+listPreguntas[i].name+'<span>'+listPreguntas[i].datePregunta+'</span></p>'+
											'<p class="comentario">'+
												listPreguntas[i].pregunta +
											'</p>'+
										'</div>'+
									'</div>'
								);
								$('.'+listPreguntas[i].idPregunta).fadeIn(2000);
								array_idPreguntas.push(listPreguntas[i].idPregunta);
							}
						}
						if (resp[0].listRespuestas) {
							listRespuestas=resp[2];
							console.log(listRespuestas);
							for (var i = 0; i < listPreguntas.length; i++) {
								$('#'+listPreguntas[i].idPregunta).append(
									'<div  style="display:none;" class=" '+listRespuestas[i].idRespuesta+' row media">'+
										'<div class="col s2">'+
											'<img style="height: 54px;" src="'+listPreguntas[i].imgUrl+'" class="circle ">'+
										'</div>'+

										'<div id="'+listRespuestas[i].idRespuesta+'" class="col s9 media-body">'+
											'<p style="margin-top: 0;" class="nombre">'+listPreguntas[i].name+'<span>'+listPreguntas[i].datePregunta+'</span></p>'+
											'<p class="comentario">'+
												listRespuestas[i].respuesta+
											'</p>'+
										'</div>'+
									'</div>'
								);
								$('.'+listRespuestas[i].idRespuesta).fadeIn(2000);
							}
						}
					}
				}else{
					console.log('error haciendo la consulta');
				}
			}
		});
	}
 	
 	function checkidPregunta(idPregunta){
 		
 		var flag2=false;
		for (var x = 0; x < array_idPreguntas.length; x++) {
			if (idPregunta === array_idPreguntas[x]) {
				flag2=true;
			} 
		}

 		return flag2;
 	}

	// $('#comentar').on('click',function () {
	// 	event.preventDefault();
	// 	if ($('#comentt').val()!="") {
	// 		datos={
	// 			comentario:$('#comentt').val(),
	// 			idevento: idevento,
	// 		};

	// 		$.ajax({
	// 			url: '../models/save_comentario.php',
	// 			type:'POST',
	// 			data:datos,
	// 			success:function(resp){
	// 				// console.log(resp);
	// 				if (resp!=false) {
	// 					$('#comentt').val('');
	// 					requestComentario();
	// 				}else{
	// 					Materialize.toast('No se pudo cargar tu comentario', 3000, 'rounded');
	// 				}
	// 			}
	// 		});			
	// 	}else{
	// 		Materialize.toast('campos vacios', 3000, 'rounded');
	// 	}
	// });

	// $("#denunciar").on('click',function(event){
	// 	event.preventDefault();

	// 	if ($('#denuncia').val() !=''){
	// 		var data={
	// 			denuncia:$('#denuncia').val(),
	// 			idEvento: idevento
	// 		};
	// 		$.ajax({
	// 			url: '../models/save_denuncia.php',
	// 			type:'POST',
	// 			data:data,
	// 			success:function(resp){
	// 				if (resp!=false) {
	// 					$('.modal').modal('close');
	// 					Materialize.toast('La denuncia se a enviado al moderador', 3000, 'rounded');
	// 					$('#denuncia').val('');
	// 					$('#reportar').addClass('disabled');
	// 				}else{
	// 					$('.modal').modal('close');
	// 					Materialize.toast('No se pudo hacer la denuncia intenta nuevamente', 3000, 'rounded');
	// 					$('#denuncia').val('');
	// 				}
	// 			}
	// 		});				
	// 	}else{
	// 		Materialize.toast('Campo de descripcion no puede estar vacio', 3000, 'rounded');
	// 	}
	// });

	// $("#participar").on('click',function(event){
	// 	event.preventDefault();
	// 	var data={
	// 		idEvento: idevento
	// 	};
	// 	$.ajax({
	// 		url: '../models/save_participar.php',
	// 		type:'POST',
	// 		data:data,
	// 		success:function(resp){
	// 			if (resp!=false) {
	// 				Materialize.toast('Te has agregado a la lista de participantes', 3000, 'rounded');
	// 				$('#participar').addClass('disabled');
	// 			}else{
	// 				Materialize.toast('No se pudo agregarte a la lista de participantes, intenta nuevamente', 3000, 'rounded');
	// 			}
	// 		}
	// 	});				
	// });	
});