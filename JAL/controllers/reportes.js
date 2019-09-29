/*--------------------------------------------------------------
								CONFIGURAR 
---------------------------------------------------------------*/


/*--------------------------------------------------------------
			ACCION Y VERIFICACION CON MODALES CONFIGURAR 
---------------------------------------------------------------*/
	//LISTADO AUTOMATICO DE TUS EVENTOS
	var list = false;
  		$('#lists').click(function (event) {
  				event.preventDefault();
  				list = true;
				//Materialize.toast('Listo', 3000, 'rounded');
				var datos = {
					iduser1: $("option:selected",'#select').val()
				};
				
				$.ajax({
					url: '../models/reportes.php',
					type: 'POST',
					data: datos,
					success:  function (r) {
						console.log(r);
						
					if (r!=false) {
						$('#listevent').children().remove();
						var events2=$.parseJSON(r);
						Materialize.toast('Listado', 3000, 'rounded');
						console.log(events2);
						listevent(events2)
					}
					else{
						$('#listevent').children().remove();
						Materialize.toast('No hay', 3000, 'rounded');}
                }
				});
  	});

  		function listevent(events2){
  			if($("option:selected",'#select').val() == 1){
	$('#listevent').append(
			'<thead><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Direccion</th>'+
			'<th>Telefono</th><th>Tipo</th><th>Status</th></tr></thead>');
	for (var i = 0; i < events2.length; i++) {
$('#listevent').append(
			'<tbody><tr>'+
			'<th>'+events2[i].id+'</th><th>'+events2[i].name+'</th>'+
			'<th>'+events2[i].email+'</th><th>'+events2[i].address+'</th>'+
			'<th>'+events2[i].tlf+'</th><th>'+events2[i].tipo+'</th>'+
			'<th>'+events2[i].estatus+'</th></tr></tbody>');
	}
 }
   			if($("option:selected",'#select').val() == 2){
	$('#listevent').append(
			'<thead><tr><th>ID</th><th>Tipo</th><th>Direccion</th>'+
			'<th>Creador</th><th>Fecha Inicio</th><th>Fecha cierre</th></tr></thead>');
	for (var i = 0; i < events2.length; i++) {
$('#listevent').append(
			'<tbody><tr>'+
			'<th>'+events2[i].idevento+'</th><th>'+events2[i].typeEvent+'</th>'+
			'<th>'+events2[i].typeEvent+'</th><th>'+events2[i].name+'</th>'+
			'<th>'+events2[i].startDate+'</th><th>'+events2[i].endDate+'</th>'+
			'</tr></tbody>');
	}
 }
    			if($("option:selected",'#select').val() == 3){
	$('#listevent').append(
			'<thead><tr><th>ID del Material</th><th>Tipo de material</th><th>Cantidad total</th></tr></thead>');
	for (var i = 0; i < events2.length; i++) {
$('#listevent').append(
			'<tbody><tr>'+
			'<th>'+events2[i].idmateriales+'</th><th>'+events2[i].namem+'</th>><th>'+events2[i].cantidad+'</th>'+
			'</tr></tbody>');
	}
 }

   			if($("option:selected",'#select').val() == 4){
	$('#listevent').append(
			'<thead><tr><th>ID</th><th>Fecha</th><th>Material</th>'+
			'<th>Cantidad</th><th>Nombre</th><th>Direccion</th>'+
			'<th>email</th><th>tlf</th><th>Estado</th></tr></thead>');
	for (var i = 0; i < events2.length; i++) {
$('#listevent').append(
			'<tbody><tr>'+
			'<th>'+events2[i].idp+'</th><th>'+events2[i].fecha+'</th>'+
			'<th>'+events2[i].material+'</th><th>'+Math.abs(events2[i].des)+'</th>'+
			'<th>'+events2[i].name+'</th><th>'+events2[i].address+'</th>'+
			'<th>'+events2[i].email+'</th><th>'+events2[i].tlf+'</th>'+
			'<th>'+events2[i].spetic+'</th>'+
			'</tr></tbody>');
	}
 }
   			if($("option:selected",'#select').val() == 5){
	$('#listevent').append(
			'<thead><tr><th>ID</th><th>Nombre</th><th>Mensaje</th><th>Estado</th>'+
			'<th>Fecha</th></tr></thead>');
	for (var i = 0; i < events2.length; i++) {
$('#listevent').append(
			'<tbody><tr>'+
			'<th>'+events2[i].idmensaje+'</th><th>'+events2[i].name+'</th>'+
			'<th>'+events2[i].mensaje+'</th><th>'+events2[i].nuevo+'</th>'+
			'<th>'+events2[i].fechae+'</tr></tbody>');
	}
 }
    			if($("option:selected",'#select').val() == 6){
	$('#listevent').append(
			'<thead><tr><th>Nombre</th><th>Email</th><th>Direccion</th><th>Telefono</th>'+
			'<th>Cantidad Disp.</th><th>Material</th></tr></thead>');
	for (var i = 0; i < events2.length; i++) {
$('#listevent').append(
			'<tbody><tr>'+
			'<th>'+events2[i].name+'</th><th>'+events2[i].email+'</th>'+
			'<th>'+events2[i].address+'</th><th>'+events2[i].tlf+'</th>'+
			'<th>'+events2[i].cantidad+'</th><th>'+events2[i].namem+'</th>'+
			'</tr></tbody>');
	}
 }
   			if($("option:selected",'#select').val() == 7){
	$('#listevent').append(
			'<thead><tr><th>ID</th><th>Denuncia</th><th>Estatus</th><th>Nombre</th>'+
			'<th>Evento</th></tr></thead>');
	for (var i = 0; i < events2.length; i++) {
		if(events2[i].statusDenuncia == 0){
			var estatus = "En espera";
		}
		if(events2[i].statusDenuncia == 1){
			var estatus = "Ignorado";
		}
		if(events2[i].statusDenuncia == 2){
			var estatus = "Evento suspendido";
		}
			$('#listevent').append(
			'<tbody><tr>'+
			'<th>'+events2[i].idDenuncia+'</th><th>'+events2[i].denuncia+'</th>'+
			'<th>'+estatus+'</th><th>'+events2[i].name+'</th>'+
			'<th>'+events2[i].idEvento+'</tr></tbody>');
	}
 }
}//FUNCION


	//LISTADO AUTOMATICO DE TUS EVENTOS
  		$('#pdf').click(function (event) {
  				event.preventDefault();
  				if(list == true){
				//Materialize.toast('Listo', 3000, 'rounded');
				var doc = new jsPDF('p', 'pt');
				var elemi = document.getElementById("logohoja");
				var elem = document.getElementById("listevent");
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
				Materialize.toast('Liste primero', 3000, 'rounded');

			}
				
  	});			
