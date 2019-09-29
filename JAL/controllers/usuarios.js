/*--------------------------------------------------------------
								CONFIGURAR 
---------------------------------------------------------------*/


/*--------------------------------------------------------------
			ACCION Y VERIFICACION CON MODALES CONFIGURAR 
---------------------------------------------------------------*/
		// Listar usuarios en select
		$('document').ready(function(event){
			$.ajax({
					url: '../models/usuarios.php',
					type: 'POST',
					success:function(r){
						if (r!=false) {


						var events =$.parseJSON(r);

						for (var i = 0; i < events.length; i++)
						{ 
							option += '<option value="'+ events[i].id + '">' + events[i].name + '</option>';
						    //$("#select option:last").after($('<option value="'+events[i].id+'">'+events[i].name+'</option>' ));
						}
						$('#select').append(option);
						//Materialize.toast('Actualizado', 3000, 'rounded');
						//$('#modalnu').modal('close');
					}
				}
				});



		});
	//--------------------BOTONES---------------------
	//BOTON ACTUALIZAR NOMBRE
  		$('#nubtn').click(function (event) {
  				event.preventDefault();
			if($('#idnu').val()=="") {
				Materialize.toast('Campos vacios', 3000, 'rounded');
			}else{
				var datos = {
					idnu: $('#idnu').val(),
					stu: $("option:selected",'#select1').val()
				};

				$.ajax({
					url: '../models/admin.php',
					type: 'POST',
					data: datos,
					success:function(resp1){
						Materialize.toast('Actualizado', 3000, 'rounded');
						$('#modalnu').modal('close');
					}
				});
			}
  	});
  	//BOTON ACTUALIZAR TELEFONO
  		$('#eubtn').click(function (event) {
  				event.preventDefault();
			if($('#ideu').val()=="") {
				Materialize.toast('Campos vacios', 3000, 'rounded');
			}else{
				//Materialize.toast('Listo', 3000, 'rounded');
				var datos = {
					ideu: $('#ideu').val(),
					stu: $("option:selected",'#select2').val()
				};

				$.ajax({
					url: '../models/admin.php',
					type: 'POST',
					data: datos,
					success:  function (resp1) {
						$('#modaleu').modal('close');
						Materialize.toast('Actualizado', 3000, 'rounded');
                }
				});
			}
  	});