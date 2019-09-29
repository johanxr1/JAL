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
					url: '../models/mensajes.php',
					type: 'POST',
					data: datos,
					success:  function (r) {
						//console.log(r);
						// Materialize.toast('Listando', 3000, 'rounded');
					
					if (r!=false) {
					var events =$.parseJSON(r);
						//function listEvent(events){
	for (var i = 0; i < events.length; i++) {

		if (events[i].nuevo==='1'){
			var icon='sms_failed';
			var color='blue lighten-3';
			var nuevo= "Nuevo";
		}
		if (events[i].nuevo==='0'){
			var icon='sms';
			var color='red lighten-5';
			var nuevo= "Visto";
		}
		if (events[i].tipo==='1'){
			var tipo='Participante';
		}
		if (events[i].tipo==='2'){
			var tipo='Lider';
		}
		if (events[i].tipo==='3'){
			var tipo='Patrocinador';
		}
		$('body').append(
				  '<div id="modal'+events[i].emisor+'" class="modal">'+
				    '<div class="modal-content">'+
				      '<h4 style="    padding-bottom: 18px; border-bottom: 1px solid #bfbfbf;">Descripcion</h4>'+
				      '<p>'+events[i].name+'</p>'+
				    '</div>'+
				    '<div class="modal-footer">'+
				      '<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>'+
				    '</div>'+
				  '</div>'
				);
		var idu = events[i].idmensaje;
		$('#listEvent').append('<li data-id="'+idu+'">'+
			'<div class="collapsible-header '+color+'"><i class="material-icons">'+icon+'</i>'+nuevo+'</div>'+
			'<div class="collapsible-body"><span>Enviado por: '+events[i].name+'</span><br><span>Fecha enviado: '+events[i].fechae+'</span><br><span>Nivel: '+tipo+'</span>'+
			'<br><span>Mensaje:'+events[i].mensaje+'</span>'+
			'<br><a data-ids="'+events[i].emisor+'" style="letter-spacing:0; text-transform:none; padding: 0 1rem; height:25px; line-height:25px;margin-bottom:5px;" class="modal-trigger waves-effect green btn" href="#modalsr">Responder</a>'+
			'<a data-ids="'+events[i].emisor+'" class="modal-trigger waves-effect green btn" style="letter-spacing:0; text-transform:none; padding: 0 1rem; height:25px; line-height:25px;margin-bottom:5px;" href="#modalnu"> Cambiar Nivel </a>'+
			'<a data-ids="'+events[i].emisor+'" class="modal-trigger waves-effect red btn" style="letter-spacing:0; text-transform:none; padding: 0 1rem; height:25px; line-height:25px;margin-bottom:5px;" href="#modaleu"> Suspencion  </a>'+
			'</div></li>');

	}//for

	//}
					}else{
					$('#listEvent').append('<li><div class="container"><p>No tienes mensajes</p></div></li>');}
                }
				});
});

$(document).ready(function() {
	$('.modal').modal(); 

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
						//Materialize.toast('Mensa'+itemId +' Leido', 3000, 'rounded');
						//location.href ="../views/configurar.php";
					}
				});
    });
        $('ul').on('click a', function(event) {
        var $target = $(event.target),
            itemId;
        $target = $target.is('a') ? $target : $target.closest('a');
        itemIds = $target.data('ids');
        //Materialize.toast('Listando'+itemIds, 3000, 'rounded');
    });

        //Boton enviar
        $('#menvi').click(function (event) {
  				event.preventDefault();
			if($('#mena').val()=="") {
				Materialize.toast('Campos vacios', 3000, 'rounded');
			}else{
				var datos = {
					mensa: $('#mena').val(),
					v1 : itemIds
				};
				console.log(datos);

				$.ajax({
					url: '../models/amensaje.php',
					type: 'POST',
					data: datos,
					success:function(resp){
						Materialize.toast('Listo', 3000, 'rounded');
						$('#modalsr').modal('close');
						//location.href ="../views/configurar.php";
					}
				});
			}
  	});
        //Boton cambiar Nivel
        $('#nius').click(function (event) {
  				event.preventDefault();
				var datos = {
					stu: $("option:selected",'#select').val(),
					idnu : itemIds
				};
				console.log(datos);

				$.ajax({
					url: '../models/admin.php',
					type: 'POST',
					data: datos,
					success:function(resp1){
						Materialize.toast('Listo', 3000, 'rounded');
						$('#modalnu').modal('close');
						//location.href ="../views/configurar.php";
					}
				});
  	});
       //Boton cambiar estatus
        $('#esus').click(function (event) {
  				event.preventDefault();
				var datos = {
					stu: $("option:selected",'#select1').val(),
					ideu : itemIds
				};
				console.log(datos);

				$.ajax({
					url: '../models/admin.php',
					type: 'POST',
					data: datos,
					success:function(resp1){
						Materialize.toast('Listo', 3000, 'rounded');
						$('#modaleu').modal('close');
						//location.href ="../views/configurar.php";
					}
				});
  	});
});
