function ignorar(e){
  	var idDenuncia = e;
  	data={
  		idDenuncia:idDenuncia,
  		tipo:'1'
  	}
	$.ajax({
		url: '../models/denuncias-status.php',
		type:'POST',
		data:data,
		success:function(resp){
			if (resp!=false) {

			}
		}
	});
}

function baja(e){
  	var idDenuncia = e;
  	var idevento=$('#e'+idDenuncia).text();
  	data={
  		idevento:idevento,
  		idDenuncia:idDenuncia,
  		tipo:'2'
  	}
	$.ajax({
		url: '../models/denuncias-status.php',
		type:'POST',
		data:data,
		success:function(resp){
			console.log(resp);
			if (resp!=false) {
			}
		}
	});
}

$.ajax({
	url: '../models/denuncias-model.php',
	type:'POST',
	success:function(resp){
		if (resp!=false) {
			console.log(resp);
			var denuncia=$.parseJSON(resp);

			//MOSTRAR LA INFO
			for (var i = 0; i < denuncia.length; i++) {
				console.log(denuncia[i].statusDenuncia);
				if (denuncia[i].statusDenuncia=="0") {
					var statusDenuncia="Sin procesar";
					var disabled='';
				}else{
					if (denuncia[i].statusDenuncia=="1") {
						var statusDenuncia="Ingorada";
						var disabled='disabled';
					}else{
						var statusDenuncia="Evento cancelado";
						var disabled='disabled';
					}
				}
				$('body').append(
				  '<div id="modal'+denuncia[i].idDenuncia+'" class="modal">'+
				    '<div class="modal-content">'+
				      '<h4 style="    padding-bottom: 18px; border-bottom: 1px solid #bfbfbf;">Descripción de la denuncia</h4>'+
				      '<p>'+denuncia[i].denuncia+'</p>'+
				    '</div>'+
				    '<div class="modal-footer">'+
				      '<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>'+
				    '</div>'+
				  '</div>'
				);
				$('tbody').append(
	                    	'<tr>'+
	                    		'<th >'+denuncia[i].idDenuncia+'</th>'+
	                    		'<th><a  href="perfilpu.php?iduserpu='+denuncia[i].idUsuario+'" target="_blank">'+denuncia[i].name+'</a></th>'+
	                    		'<th><a id="e'+denuncia[i].idDenuncia+'" href="../views/singleEvento.php?idevento='+denuncia[i].idEvento+'" target="_blank">'+denuncia[i].idEvento+'</a></th>'+
	                    		'<th><a class=" modal-trigger" href="#modal'+denuncia[i].idDenuncia+'">Descripción</a></th>'+
	                    		'<th id="es'+denuncia[i].idDenuncia+'">'+statusDenuncia+'</th>'+
	                    		'<th>'+
	            					'<a   id="'+denuncia[i].idDenuncia+'"  style="letter-spacing:0; text-transform:none; padding: 0 1rem; height:25px; line-height:25px;margin-bottom:5px;" class="'+disabled+' waves-effect green btn ">Ignorar denuncia</a><br>'+
	                    			'<a   id="'+denuncia[i].idDenuncia+'"  style="letter-spacing:0; text-transform:none; padding: 0 1rem; height:25px; line-height:25px" class="'+disabled+' waves-effect red btn ">Dar de baja evento</a>'+
	                    		'</th>'+
	                    	'</tr>'
				);
			}
		}
	}
});

$(document).ready(function(){
    $('.modal').modal(); 

	$("a").on('click',function(){
		if ($(this).text()=="Ignorar denuncia") {
			var idDenuncia=$(this).attr('id');
			ignorar(idDenuncia);
			$(this).siblings('a').addClass('disabled');
			$(this).addClass('disabled');
			$('#es'+idDenuncia).text('Ignorada');
		}else{
			var idDenuncia=$(this).attr('id');
			baja(idDenuncia);
			$(this).siblings('a').addClass('disabled');
			$(this).addClass('disabled');
			$('#es'+idDenuncia).text('Evento cancelado');
		}		
	});
});