
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
var idPeticion = $.get("idPeticion"); 
// idPeticion=20;
var listRespuestas=[];
var peticion=[];
var cantidadMat=0;
var cantidadAdqui=0;
var array_idPreguntas = [];
var array_idRespuestas=[];
var flag=true;
var tipoVisitante='';
var vendedor=[];
var reputacion=[];

function precisionRound(number, precision) {
  var factor = Math.pow(10, precision);
  return Math.round(number * factor) / factor;
}

function requestFeedBack(){
	$.ajax({
		url: '../models/feedBack-model.php',
		type:'POST',
		data:{'idPeticion':idPeticion},
		success:function(resp){
			var resp=$.parseJSON(resp);
			if (resp) {
				if (resp[0].listPreguntas) {
					var listPreguntas=resp[1];
					var btnResponder=''
					if (resp[0].listRespuestas) { listRespuestas=resp[2];}
					
					for (var i = 0; i < listPreguntas.length; i++) {

						if (checkidPregunta(listPreguntas[i].idPregunta) != true) {
							console.log(checkHasRespuesta(listPreguntas[i].idPregunta));
							if (!checkHasRespuesta(listPreguntas[i].idPregunta)){
								if (tipoVisitante!='comprador') {
									btnResponder='<div id="boxBtn'+listPreguntas[i].idPregunta+'" class="row">'+
														'<a class="col s2 offset-s9 waves-effect waves-light btn modal-trigger" href="#modal'+listPreguntas[i].idPregunta+'">Responder</a>'+
												'</div>';
									$('body').prepend(
									  '<div id="modal'+listPreguntas[i].idPregunta+'" class="modal">'+
									    '<div class="modal-content">'+
									      '<h4>Responder Pregunta</h4>'+
									      '<div style="margin:0 2rem;s">'+
									        '<p>Responde de forma precisa la pregunta</p>'+
									        '<div class="row">'+
									          '<div class="input-field col s12">'+
									            '<textarea id="respuesta'+listPreguntas[i].idPregunta+'" class="materialize-textarea" data-length="120"></textarea>'+
									            '<label for="denuncia">Respuesta</label>'+
									          '</div>'+
									        '</div>'+
									      '</div>'+
									    '</div>'+
									    '<div class="modal-footer">'+
									      '<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>'+
									      '<a id="'+listPreguntas[i].idPregunta+'" href="#!" class="responder modal-action waves-effect waves-green btn-flat">Responder</a>'+
									    '</div>'+
									  '</div>'
									);
								}else{btnResponder='';}
							}else{
								btnResponder='';
							}
							$('#preguntas').prepend(
								'<div  style="display:none;" class=" '+listPreguntas[i].idPregunta+' row media">'+
									'<div class="col s2">'+
										'<img style="height: 54px;" src="'+listPreguntas[i].imgUrl+'" class="circle ">'+
									'</div>'+

									'<div id="p'+listPreguntas[i].idPregunta+'" class="col s9 media-body">'+
										'<p style="margin-top: 0;" class="nombre">'+listPreguntas[i].name+'<span>'+listPreguntas[i].datePregunta+'</span></p>'+
										'<p class="comentario">'+
											listPreguntas[i].pregunta +
										'</p>'+
									'</div>'+
									btnResponder+
								'</div>'
							);
							$('.'+listPreguntas[i].idPregunta).fadeIn(2000);
							array_idPreguntas.push(listPreguntas[i].idPregunta);
						}
					}
					if (resp[0].listRespuestas) {
						for (var x= 0; x < listRespuestas.length; x++) {
							if (checkidRespuesta(listRespuestas[x].idRespuesta) != true) {
								console.log('voy agregar respuesta a la pregunta # '+listPreguntas[x].idPregunta+' Valor de i '+x);
								$('#p'+listRespuestas[x].idPregunta).append(
									'<div  style="display:none;" class=" '+listRespuestas[x].idRespuesta+' '+listRespuestas[x].idPregunta+' row media">'+
										'<div class="col s2">'+
											'<img style="height: 54px;" src="'+listRespuestas[x].imgUrl+'" class="circle ">'+
										'</div>'+

										'<div id="'+listRespuestas[x].idRespuesta+'" class="col s9 media-body">'+
											'<p style="margin-top: 0;" class="nombre">'+listRespuestas[x].name+'<span>'+listRespuestas[x].dateRespuesta+'</span></p>'+
											'<p class="comentario">'+
												listRespuestas[x].respuesta+
											'</p>'+
										'</div>'+
									'</div>'
								);
								$('.'+listRespuestas[x].idRespuesta).fadeIn(2000);
								array_idRespuestas.push(listRespuestas[x].idRespuesta);
							}
						}
					}
				}
				$('.modal').modal();
				$("a.responder").on('click',function(){
					var respuesta=$('#respuesta'+$(this).attr('id')).val();
					var idPregunta=$(this).attr('id');
					var datos={
						idPeticion:idPeticion,
						idPregunta:idPregunta,
						respuesta:respuesta,
					};
					console.log(datos);
					$.ajax({
						url: '../models/save_respuesta.php',
						type:'POST',
						data:datos,
						success:function(resp){
							// console.log(resp);
							if (resp!=false) {
								$('.modal').modal('close');
								Materialize.toast('Tu respuesta se envio con exito', 3000, 'rounded');
								$('#boxBtn'+idPregunta).remove();
								requestFeedBack();
							}
						}
					});
				});  
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

function checkidRespuesta(idRespuestas){
	var flag2=false;
	for (var x = 0; x < array_idRespuestas.length; x++) {
		if (idRespuestas === array_idRespuestas[x]) {
			flag2=true;
		} 
	}
	return flag2;
}

function checkHasRespuesta(idPregunta){	
	var flag2=false;
	for (var x = 0; x < listRespuestas.length; x++) {
		// console.log(idPregunta+' / '+listRespuestas[x].idPregunta);
		if (idPregunta === listRespuestas[x].idPregunta) {
			flag2=true;
			console.log(idPregunta+' / '+listRespuestas[x].idPregunta+' IGUALES');
		}else{
			console.log(idPregunta+' / '+listRespuestas[x].idPregunta+' DIFERENTES');
		}
	}
	return flag2;
}

function requestMateriales(datos){
	peticion=datos['peticion'];
	var idU=peticion.ide;
	var data={
		user_id:idU,
	};
	$.ajax({
		url: '../models/cantidad-materiales.php',
		type: 'POST',
		data: data,
		success:  function (r) {				
			if (r!=false) {
				var events =$.parseJSON(r);
				var numberMat=parseInt(peticion.mat)-1;
				cantidadMat=events[numberMat].cantidad;				
				vendedor=datos['vendedor'];
				reputacion=datos['reputacion'];
				tipoVisitante=datos['tipoVisitante'];
				requestFeedBack();//LLAMO LA FUNCION QUE TRAE LAS PREGUNTAS Y LAS RESPUESTAS
				if (reputacion !=false) {
					var puntajes =reputacion;
					var puntPosi=0;
					for (var i = 0; i < puntajes.length; i++) {
						puntPosi+=parseInt(puntajes[i].puntaje);
					}
					var puntNega=Math.abs(puntPosi-(puntajes.length*6));
					var reputacionPosi=(puntPosi*6)/600;
					var reputacionNega=(puntNega*6)/600;
					var reputacion=precisionRound(reputacionPosi-(reputacionNega), 2);
				}else{
					console.log('No hay califiaciones para este usuario');
					var reputacion=0;
				}

				if (tipoVisitante=='comprador') {
					//aun hablando 1
					//esperando aceptacion de vendedor 1
					//ya culminada la operacio 2
					if (peticion.speti =='1') {
						styleAdquirir='';
						styleAdquirido=' display:none;';
						styleVendedor=' display:none;';					
					}else{
						styleAdquirir=' display:none;';
						styleAdquirido='';
						styleVendedor=' display:none;';
						$('form').remove();	
						$('#divCantidad').remove();					
					}
				}else{
					styleAdquirir=' display:none;';
					styleAdquirido=' display:none;';
					styleVendedor='';
					$('form').remove();
				}
							
				//MOSTRAR LA INFO
				$('.info').append(

					//INFORMACION DEL VENDEDOR
			     	'<div class="row">'+
			     		'<div class="col s1" >'+
			       			'<img class="circle " style="height: 54px;" src="'+vendedor.imgUrl+'">'+
			        	'</div>'+
			     		'<div class="col s6" >'+
				        	'<em style="font-weight: bold;">Usuario '+
				          		'<a href="perfilpu.php?iduserpu='+vendedor.users_id+'" target="_blank">'+vendedor.name+'</a>'+
				       	 	'</em>'+ 
					      	'<h6>'+
					        	'<strong>Reputación : </strong>'+
					        	'<span class="rating">'+reputacion+' out of 6 star rating</span>'+
					      	'</h6>'+
			        	'</div>'+    
			      	'</div>'+
					'<div style="margin: 0 5rem;" class="row">'+
						'<div class="col s12 ">'+
							'<small style="display:block;"><strong>Tipo de Material : </strong>'+peticion.namem+'</small>'+
							'<small style="display:block; margin-botton:2rem;"><strong>Cantidad disponible : </strong>'+cantidadMat+'</small>'+
						'</div>'+
					'</div>'+

					//CONTENIDO CUANDO ES COMPRADOR Y NO A CONCRETADO
					'<div id="comprador1" style="margin-top:2rem;'+styleAdquirir+'" class="row">'+
						'<div class="col s3 offset-s1">'+
							'<input id="cantidad" type="number" name="quantity" min="1" max="'+peticion.des+'">'+
						'</div>'+
						'<div class="col s6">'+
							'<button id="adquirir" style="padding-left: 15px;" class=" btn waves-effect waves-light" type="button"><i class="material-icons left">add</i>Adquirir</button>'+
						'</div>'+
					'</div>'+
					'<p id="compradorSms" style="'+styleAdquirir+'">Realiza todas las preguntas necesarias para aclarar tus dudas antes de concretar.</p>'+

					//CONTENIDO CUANDO ES COMPRADOR Y YA CONCRETADO
					'<div id="comprador2" style="margin-top:2rem;'+styleAdquirido+'" class="row">'+
						'<p id="pComprador2">Has concretado esta operacion, adquiriste '+Math.abs(peticion.des)+' Kg de '+peticion.namem+'</p>'+
					'</div>'+

					//CONTENIDO CUANDO ES VENDEDOR 
					'<div style="margin-top:2rem;'+styleVendedor+'" class="row">'+
						'<p>En la medida de lo posible trata de contestar en un lapso de tiempo razonable .</p>'+
					'</div>'
				);

				$('.rating').star_rating();

			 	$('#adquirir').on('click',function(){
					event.preventDefault();
					if ($('#cantidad').val()!="") {
						if (parseInt($('#cantidad').val())<=cantidadMat) {
							if ($('#cantidad').hasClass('invalid')) {
								$('#cantidad').removeClass('invalid');
							}

							console.log('resto la cantidad en la bd, cambio el estatus de la operacion y desabilito el boton adquir');
							datos={
								'idPeticion':idPeticion,
								'cantidad':(parseInt($('#cantidad').val()) * -1),
								'ide':peticion.ide,
								'idma':peticion.mat,
							};
							console.log(datos);
							$('#pComprador2').text('A la espera de la aceptacion de la solicitud para adquirir '+$('#cantidad').val()+' Kg de '+peticion.namem);
							$('#comprador1').hide(500);
							$('#compradorSms').hide(500);
							$('#divCantidad').hide(500);
							$('#comprador2').show(500);
							$('form').remove();
							$.ajax({
								url: '../models/save-adquirir.php',
								type:'POST',
								data:datos,
								success:function(resp){
									var resp=$.parseJSON(resp);
									if (resp) {
										$('#adquirir').addClass('disabled');
										$('#cantidad').attr(disabled);
									}else{
										console.log('error haciendo la consulta');
									}
								}
							});
						}else{
							$('#cantidad').addClass('invalid');
							Materialize.toast('La cantidad no puede ser mayor a la disponible', 3000, 'rounded');
						}
					}else{
						$('#cantidad').addClass('invalid');
						Materialize.toast('No introdujo la cantidad', 3000, 'rounded');
					}
			 	});
			}else{alert(r);}
		}
	});
}

// PIDO DATOS PARA MOSTRAR INFORMACION DEL VENDEDOR
$.ajax({
	url: '../models/sigleOperations-model.php',
	type:'POST',
	data:{'idPeticion':idPeticion},
	success:function(resp){
		if (resp!=false) {
			var datos=$.parseJSON(resp);
			requestMateriales(datos);
		}
	}
});

$('#comentar').on('click',function () {
	event.preventDefault();
	if ($('#comentt').val()!="") {
		datos={
			pregunta:$('#comentt').val(),
			idPeticion: idPeticion,
		};

		$.ajax({
			url: '../models/save_pregunta.php',
			type:'POST',
			data:datos,
			success:function(resp){
				// console.log(resp);
				if (resp!=false) {
					$('#comentt').val('');
					requestFeedBack();
				}else{
					Materialize.toast('No se pudo cargar tu comentario', 3000, 'rounded');
				}
			}
		});			
	}else{
		Materialize.toast('campos vacios', 3000, 'rounded');
	}
}); 

$(document).ready(function(){
	$('.rating').star_rating();
	$(".dropdown-button").dropdown();
	$(".button-collapse").sideNav();	
});