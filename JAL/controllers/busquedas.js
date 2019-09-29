/*--------------------------------------------------------------
								CONFIGURAR 
---------------------------------------------------------------*/


/*--------------------------------------------------------------
			ACCION Y VERIFICACION CON MODALES CONFIGURAR 
---------------------------------------------------------------*/
	//LISTADO AUTOMATICO DE TUS EVENTOS
  		$('#lists').click(function (event) {
  				event.preventDefault();
				//Materialize.toast('Listo', 3000, 'rounded');
				var datos = {
					iduser1: $("option:selected",'#select').val()
				};
				
				$.ajax({
					url: '../models/busquedas.php',
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
	$('#listevent').append(
			'<thead><tr><th>Nombre</th><th>Email</th><th>Direccion</th><th>Telefono</th>'+
			'<th>Cantidad Disp.</th><th>Material</th></tr></thead>');
	for (var i = 0; i < events2.length; i++) {
$('#listevent').append(
			'<tbody><tr>'+
			'<th>'+events2[i].name+'</th><th>'+events2[i].email+'</th>'+
			'<th>'+events2[i].address+'</th><th>'+events2[i].tlf+'</th>'+
			'<th>'+events2[i].cantidad+'</th><th>'+events2[i].namem+'</th>'+
			'<th><button data-id="'+events2[i].id+'" data-ids="'+events2[i].idma+'" name="comprar" class="btn waves-effect green darken-1" type="submit">Contactar</button></th></tr></tbody>');
	}
 }
 $(document).ready(function(events) {
    $('table').on('click button', function(event) {
    		//console.log(event);
        var $target = $(event.target),
            itemId,
            itemIds;
        $target = $target.is('button') ? $target : $target.closest('button');
        itemId = $target.data('id');
        itemIds = $target.data('ids');
        //Materialize.toast('Si '+itemId+' Otro'+itemIds, 3000, 'rounded');
        if(itemId != 0){
        var datos = { 
				its: itemId,
				itr: itemIds
				};
				//console.log(its);
				$.ajax({
					url: '../models/inspeticiones.php',
					type: 'POST',
					data: datos,
					success:function(resp){
						var idpm = $.parseJSON(resp);

						//Materialize.toast('Guardado', 3000, 'rounded');
						location.href ="../views/single-operations.php?idPeticion="+idpm.idpm;
						//console.log(resp);
					}
				});
			}
    });
});