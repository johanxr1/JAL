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
					$('#listope').append('<thead><tr><th></th><th></th><th>No hay peticiones registradas</th><th></th><th></th><th></th></tr></thead>');}
                }
				});				
});
list1 = false;
function listope(events){
	
	if(events.length !=0){
		$('#listope').append(
			'<thead><tr><th>Comprador</th><th>Material</th><th>Cantidad</th><th>Fecha</th><th>Email</th><th>Aceptar</th><th>Rechazar</th><th>Detalles</th></tr></thead>');
	for (var i = 0; i < events.length; i++) {
		if(events[i].speti == 1){
			list1 = true;			
		$('#listope').append(
			'<tbody><tr><th>'+events[i].name+'</th><th>'+events[i].material+'</th><th>'+Math.abs(events[i].des)+'</th>'+
			'<th>'+events[i].fecha+'</th><th>'+events[i].email+'</th>'+
			'<th><button data-ids="'+events[i].idp+'" class="disabled modal-trigger waves-effect green btn" style="letter-spacing:0; text-transform:none; padding: 0 1rem; height:25px; line-height:25px;margin-bottom:5px;">Aceptar</button></th>'+
			'<th><button data-idn="'+events[i].idp+'" class="disabled modal-trigger waves-effect red btn" style="letter-spacing:0; text-transform:none; padding: 0 1rem; height:25px; line-height:25px;margin-bottom:5px;">Rechazar</button></th>'+
			'<th><button data-idd="'+events[i].idp+'" class="modal-trigger waves-effect green btn" style="letter-spacing:0; text-transform:none; padding: 0 1rem; height:25px; line-height:25px;margin-bottom:5px;">Detalles</button></th>'+
			'</tr></tbody>');
		}
		if(events[i].speti == 4){
			list1 = true;
		$('#listope').append(
			'<tbody><tr><th>'+events[i].name+'</th><th>'+events[i].material+'</th><th>'+Math.abs(events[i].des)+'</th>'+
			'<th>'+events[i].fecha+'</th><th>'+events[i].email+'</th>'+
			'<th><button data-ids="'+events[i].idp+'" class="modal-trigger waves-effect green btn" style="letter-spacing:0; text-transform:none; padding: 0 1rem; height:25px; line-height:25px;margin-bottom:5px;">Aceptar</button></th>'+
			'<th><button data-idn="'+events[i].idp+'" class="modal-trigger waves-effect red btn" style="letter-spacing:0; text-transform:none; padding: 0 1rem; height:25px; line-height:25px;margin-bottom:5px;">Rechazar</button></th>'+
			'<th><button data-idd="'+events[i].idp+'" class="modal-trigger waves-effect green btn" style="letter-spacing:0; text-transform:none; padding: 0 1rem; height:25px; line-height:25px;margin-bottom:5px;">Detalles</button></th>'+
			'</tr></tbody>');
		}
		}//for
}//if
}
list2 = false;
function listope1(events){
	
	if(events.length !=0){
		$('#listope1').append(
			'<thead><tr><th>Comprador</th><th>Material</th><th>Cantidad</th><th>Fecha</th>'+
			'<th>Email</th><th>Estado</th></tr></thead>');
	for (var i = 0; i < events.length; i++) {
		if(events[i].speti == 2){
			var estado = "Aceptado";
			var color = "green";
		}
		if(events[i].speti == 3){
			var estado = "Negado";
			var color = "green";
		}
		if(events[i].speti != 1 && events[i].speti != 4){
			list2 = true;
		$('#listope1').append(
			'<tbody><tr><th>'+events[i].name+'</th><th>'+events[i].material+'</th><th>'+Math.abs(events[i].des)+'</th>'+
			'<th>'+events[i].fecha+'</th><th>'+events[i].email+'</th><th>'+estado+'</th></tr></tbody>'	
			);} }//for
	
}//if
}
//LECTURA DEL CLICK
$(document).ready(function(events) {
    $('table').on('click button', function(event) {
        var $target = $(event.target),
            itemId;
        $target = $target.is('button') ? $target : $target.closest('button');
        itemIds = $target.data('ids');
        itemIdn = $target.data('idn');
        itemIdd = $target.data('idd');
        //var idps = events[itemIds].idp;
        //var idpn = events[itemIdn].idp;
        //Materialize.toast('Varible '+itemIdd, 3000, 'rounded');
        if(itemIdd >= 0){
        location.href ="../views/single-operations.php?idPeticion="+itemIdd;}
        // Materialize.toast('No '+itemIdn, 3000, 'rounded');
        if(itemIds >= 0 || itemIdn >= 0){
        var datos = { 
				its: itemIds,
				itn: itemIdn
				};
				//console.log(its);
				$.ajax({
					url: '../models/operacionup.php',
					type: 'POST',
					data: datos,
					success:function(r1){
						Materialize.toast('Actualizado', 3000, 'rounded');
						location.href ="../views/operaciones.php";
					}
				});
			}
    });
});
	//LISTADO AUTOMATICO DE TUS EVENTOS
  		$('#pdf1').click(function (event) {
  				event.preventDefault();
  				if(list1 == true){
				//Materialize.toast('Listo', 3000, 'rounded');
				var doc = new jsPDF('p', 'pt');
				var elemi = document.getElementById("logohoja");
				var elem = document.getElementById("listope");
				var res = doc.autoTableHtmlToJson(elem);
				doc.autoTable(res.columns,res.data,{
                    margin: {top: 50},
                    theme: 'grid',
                    showHeader: 'everyPage',
                    headerStyles: {
                        halign:'center'
                    },
                    addPageContent: function(data) {
                    	doc.setFontSize(16);
                        doc.text(80, 35, 'Proyecto JAL');
                        doc.setFontSize(12);
                        doc.text(260, 35, 'Reporte en PDF impreso el dia 13-04-2018 5:20PM');
                        doc.addImage(elemi, 'JPG', 10, 5, 40, 40);
                        //doc.addImage(canvas.toDataURL("../imag/persona1"),'JPG',10,5);
                        doc.setDrawColor(0);
                        doc.setLineWidth(1.5);
                        //doc.line(0, 1, 300, 1);
                        doc.line(0, 40, 650, 40);
                        doc.line(0, 800, 650, 800);
                        doc.setFontSize(12);
                        doc.text(80, 820, 'Paginas: 1 de 1');
                    }
                    });
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
				var elemi = document.getElementById("logohoja");
				var elem = document.getElementById("listope1");
				var res = doc.autoTableHtmlToJson(elem);
				doc.autoTable(res.columns,res.data,{
                    margin: {top: 50},
                    theme: 'grid',
                    showHeader: 'everyPage',
                    headerStyles: {
                        halign:'center'
                    },
                    addPageContent: function(data) {
                    	doc.setFontSize(16);
                        doc.text(80, 35, 'Proyecto JAL');
                        doc.setFontSize(12);
                        doc.text(260, 35, 'Reporte en PDF impreso el dia 13-04-2018 5:20PM');
                        doc.addImage(elemi, 'JPG', 10, 5, 40, 40);
                        //doc.addImage(canvas.toDataURL("../imag/persona1"),'JPG',10,5);
                        doc.setDrawColor(0);
                        doc.setLineWidth(1.5);
                        //doc.line(0, 1, 300, 1);
                        doc.line(0, 40, 650, 40);
                        doc.line(0, 800, 650, 800);
                        doc.setFontSize(12);
                        doc.text(80, 820, 'Paginas: 1 de 1');
                    }
                    });
				doc.save("table.pdf");
			}else{
				Materialize.toast('Tabla vacia', 3000, 'rounded');

			}
				
  	});