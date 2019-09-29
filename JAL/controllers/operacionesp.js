/*--------------------------------------------------------------
								GENERAL 
---------------------------------------------------------------*/

/*--------------------------------------------------------------
			LISTANDO OPERACIONES EN ESPERA Y LISTAS 
---------------------------------------------------------------*/
$('document').ready(function(event5){
				var datos = {
					iduser: 12
				};

				$.ajax({
					url: '../models/operalist.php',
					type: 'POST',
					data: datos,
					success:  function (r) {
						console.log(r);
						// Materialize.toast('Listando', 3000, 'rounded');
					if (r!=false) {
					var events =$.parseJSON(r);
					listope(events);
					listope1(events);
					}else{
					$('#listope1').append('<thead><tr><th></th><th></th><th>No hay peticiones registradas</th><th></th><th></th><th></th></tr></thead>');
					$('#listope').append('<thead><tr><th></th><th></th><th>No hay peticiones registradas</th><th></th><th></th><th></th></tr></thead>');
				}
                }
				});				
});
list1 = false;
function listope1(events){
	if(events.length !=0){
		$('#listope').append(
			'<thead><tr><th>Comprador</th><th>Material</th><th>Cantidad</th><th>Fecha</th><th>Email</th><th>Estado</th><th>Detalles</th></tr></thead>');
	for (var i = 0; i < events.length; i++) {
		if(events[i].speti == 1){
			list1 = true;
		$('#listope').append(
			'<tbody><tr><th>'+events[i].name+'</th><th>'+events[i].material+'</th><th>'+Math.abs(events[i].des)+'</th>'+
			'<th>'+events[i].fecha+'</th><th>'+events[i].email+'</th><th>En espera</th>'+
			'<th><button data-idd="'+events[i].idp+'" class="modal-trigger waves-effect green btn" style="letter-spacing:0; text-transform:none; padding: 0 1rem; height:25px; line-height:25px;margin-bottom:5px;">Detalles</button></th>'+
			'</tr></tbody>');
		}
		if(events[i].speti == 4){
			list1 = true;
		$('#listope').append(
			'<tbody><tr><th>'+events[i].name+'</th><th>'+events[i].material+'</th><th>'+Math.abs(events[i].des)+'</th>'+
			'<th>'+events[i].fecha+'</th><th>'+events[i].email+'</th><th>Ofertado</th>'+
			'<th><button data-idd="'+events[i].idp+'" class="modal-trigger waves-effect green btn" style="letter-spacing:0; text-transform:none; padding: 0 1rem; height:25px; line-height:25px;margin-bottom:5px;">Detalles</button></th>'+
			'</tr></tbody>');
		}
		}//for
}//if
}
list2 = false;
var sumpapeles = 0;
var sumplasticos = 0;
var sumcartones = 0;
var sumelec = 0;
var sumvidrios = 0;
function listope(events){
	var bandera = false;
	for (var i = 0; i < events.length; i++){
		if(events[i].speti == 2 || events[i].speti == 3){
			 bandera = true;
		}

	}
	if(events.length !=0 && bandera == true){
		$('#listope1').append(
			'<thead><tr><th>Comprador</th><th>Material</th><th>Cantidad</th><th>Fecha</th><th>Email</th><th>Estado</th></tr></thead>');
		for (var i = 0; i < events.length; i++) {
		if(events[i].speti == 2){

			var estado = "Aceptado";
		}
		if(events[i].speti == 3){
			var estado = "Negado";
		}


		if(events[i].speti != 1 && events[i].speti != 4){
			list2 = true;
			if(events[i].speti == 2){
				if(events[i].material == "Papeles"){
					sumpapeles = sumpapeles + Math.abs(events[i].des);
				}
				if(events[i].material == "Plasticos"){
					sumplasticos = sumplasticos + Math.abs(events[i].des);
				}
				if(events[i].material == "Cartones"){
					sumcartones = sumcartones + Math.abs(events[i].des);
				}
				if(events[i].material == "Electronicos"){
					sumelec = sumelec + Math.abs(events[i].des);
				}
				if(events[i].material == "Vidrios"){
					sumvidrios = sumvidrios + Math.abs(events[i].des);
				}
			
			}
		$('#listope1').append(
			'<thead><tr><th>'+events[i].name+'</th><th>'+events[i].material+'</th><th>'+Math.abs(events[i].des)+'</th>'+
			'<th>'+events[i].fecha+'</th><th>'+events[i].email+'</th><th>'+estado+'</th></tr></thead>'	
			);
		}else{			
		}//else
		 }//for
		 $('#listope1').append(
			'<tbody><tr><th>Total: </th><th>Papeles:'+sumpapeles+'</th><th>Plasticos:'+sumplasticos+'</th><th>Cartones:'+sumcartones+'</th><th>Electronicos:'+sumelec+'</th><th>Vidrios:'+sumvidrios+'</th></tr></tbody>');	
	}else{

	$('#listope1').append('<thead><tr><th></th><th></th><th>No hay peticiones registradas</th><th></th><th></th><th></th></tr></thead>');
	}//if
}
//LECTURA DEL CLICK
$(document).ready(function(events) {
    $('table').on('click button', function(event) {
        var $target = $(event.target),
            itemId;
        $target = $target.is('button') ? $target : $target.closest('button');
        // itemIds = $target.data('ids');
        // itemIdn = $target.data('idn');
        itemIdd = $target.data('idd');
        //var idps = events[itemIds].idp;
        //var idpn = events[itemIdn].idp;
        //Materialize.toast('Varible '+itemIdd, 3000, 'rounded');
        if(itemIdd >= 0){
        location.href ="../views/single-operations.php?idPeticion="+itemIdd;}

    });
});
	//LISTADO AUTOMATICO DE TUS EVENTOS
  		$('#pdf1').click(function (event) {
  				event.preventDefault();
  				if(list1 == true){
				//Materialize.toast('Listo', 3000, 'rounded');
				var doc = new jsPDF('p', 'pt');
				var elem = document.getElementById("listope");
				var res = doc.autoTableHtmlToJson(elem);
				doc.autoTable(res.columns, res.data);
				doc.save("table.pdf");
			}else{
				Materialize.toast('Tabla vacia', 3000, 'rounded');

			}
				
  	});	
  			//LISTADO AUTOMATICO DE TUS EVENTOS
  		$('#pdf2').click(function (event) {
  				event.preventDefault();
  				if(list2 == true){
				//Materialize.toast('Listo', 3000, 'rounded');
				var doc = new jsPDF('p', 'pt');
				var elem = document.getElementById("listope1");
				var res = doc.autoTableHtmlToJson(elem);
				doc.autoTable(res.columns, res.data);
				doc.save("table.pdf");
			}else{
				Materialize.toast('Tabla vacia', 3000, 'rounded');

			}
				
  	});