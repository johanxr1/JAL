/*--------------------------------------------------------------
		    	FUNCIONES, EVENTOS Y VARIABLES EN GENERAL
---------------------------------------------------------------*/
var date = new Date();
var idEvento;
date.setDate(date.getDate() + 1);
$(document).ready(function() {
  
	/*Inicializando los componentes de materialze*/
    $(".dropdown-button").dropdown();

    $(".button-collapse").sideNav();

	$('#textarea1').characterCounter();
	
	$('.datepicker').pickadate({
		selectMonths: true, // Creates a dropdown to control month
		selectYears: 15, // Creates a dropdown of 15 years to control year,
        labelMonthNext: 'Mes siguiente',
        labelMonthPrev: 'Mes anterior',
        labelMonthSelect: 'Selecciona un mes',
        labelYearSelect: 'Selecciona un año',
        monthsFull: [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],
        monthsShort: [ 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic' ],
        weekdaysFull: [ 'Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado' ],
        weekdaysShort: [ 'Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab' ],
        weekdaysLetter: [ 'D', 'L', 'M', 'M', 'J', 'V', 'S' ], 
		min : 'now',
		firstDay: true,
		format: 'yyyy-mm-dd',
		today: false,
        clear: 'Limpiar',
        close: 'Cerrar',
		closeOnSelect: false // Close upon selecting a date,
	});
	
	$('.timepicker').pickatime({
		default: 'now', // Set default time: 'now', '1:30AM', '16:30'
		fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
		// min : new Date(),
		twelvehour: true, // Use AM/PM or 24-hour format
		donetext: 'Guardar', // text for done-button
		cleartext: 'Limpiar', // text for clear-button
		canceltext: 'Cancel', // Text for cancel-button
		autoclose: false, // automatic close timepicker
		ampmclickable: true, // make AM PM clickable
		aftershow: function(){}, //Function for after opening timepicker
	});

	$('.modal').modal({
		dismissible: true, // Modal can be dismissed by clicking outside of the modal
		opacity: .5, // Opacity of modal background
		inDuration: 300, // Transition in duration
		outDuration: 200, // Transition out duration
		startingTop: '4%', // Starting top style attribute
		endingTop: '10%', // Ending top style attribute
		ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
			google.maps.event.trigger(map, "resize");
    		map.setCenter(defaultCenter);
    		inverse_geocoords(geocoder,markerPicker.getPosition().lat(),markerPicker.getPosition().lng().toFixed(3));
		},
		complete: function() { } // Callback for Modal close
	});

	$('select').material_select();

	/*Controlando los eventos de la vista*/
	$("#redirec-inicio").click(function(){
		event.preventDefault();
		window.location.href = "../views/home.php";
	});

	$("#redirec-evento").click(function(){
		event.preventDefault();
		window.location.href = "../views/singleEvento.php?idevento="+idEvento+"";
	});

	$("#addressForm").click(function(){
		$('#modal1').modal('open');
		$('#addressModal').focus();
	});

	$('#typeEvent').on('change', function() {
	  if (this.value ==='reciclaje') {
	  	$("#selectMaterial").fadeIn("slow");
	  }else{
	  	$("#selectMaterial").fadeOut("slow");
	  }  
	})

	$('#save-geo').click(function (event) {
		event.preventDefault();
		$('#addressForm').val($('#addressModal').val());
		$("label[for='addressForm']").addClass('active');
	});

	$('#save-event').click(function (event) {
		event.preventDefault();
		if (!$('#bla').find('*').hasClass('invalid')) {
			if ($('#addressForm').val()!='' && $('#referencia').val()!='' && $('#startDate').val()!='' && $('#endDate').val()!='' && $('#startHour').val()!='' && $('#endHour').val()!='' && $('#typeEvent').val()!=null &&  $('#description').val()!='') {
				if ($('#typeEvent').val() === 'reciclaje') {		
					if ($('#typeMaterials').val()!=null) {
						if ($("#inputAddres-contacto").is(":visible") && $("#inputTlf-contacto").is(":visible")) {
							if ($('#tlf-contacto').val()!='' && $('#addres-contacto').val()!='') {
								
								var typeMaterials=JSON.stringify($('#typeMaterials').val());
								var data ={
									geoPicked:createCoordinates(markerPicker),
									address: $('#addressForm').val(),
									referencia: $('#referencia').val(),
									startDate: $('#startDate').val(),
									endDate: $('#endDate').val(),
									startHour: $('#startHour').val(),
									endHour: $('#endHour').val(),
									typeEvent: $('#typeEvent').val(),
									typeMaterials: typeMaterials,
									description: $('#description').val(),
									addressContacto:$('#addres-contacto').val(),
									tlfContacto: $('#tlf-contacto').val()
								};
								$.ajax({
									url:'../models/save_event-model.php',
									type:'POST',
									data:data,
									success:function(resp){
										var resp2 = $.parseJSON(resp);
										if (resp2.tipo='alert-success') {
											idEvento=resp2.idEvento;
											$('#mensaje').append('Evento creado con Éxito, has click en el boton evento para crear otro.');
											$('#modal-msj').modal('open');
										}else{
											$('#mensaje').append('Lo sentimos hubo un error al registrar el evento, has click en el boton evento para intentar nuevamente \n\n'+resp2.mensaje);
											$('#redirec').text('Resgistrar');
											$('#modal-msj').modal('open');
										}
									}
								});
							}else{
								Materialize.toast('campos vacios', 4000, 'rounded');
							}
						}else{
							
							var typeMaterials=JSON.stringify($('#typeMaterials').val());
							var data ={
								geoPicked:createCoordinates(markerPicker),
								address: $('#addressForm').val(),
								referencia: $('#referencia').val(),
								startDate: $('#startDate').val(),
								endDate: $('#endDate').val(),
								startHour: $('#startHour').val(),
								endHour: $('#endHour').val(),
								typeEvent: $('#typeEvent').val(),
								typeMaterials: typeMaterials,
								description: $('#description').val(),
							};
							$.ajax({
								url:'../models/save_event-model.php',
								type:'POST',
								data:data,
								success:function(resp){
									var resp2 = $.parseJSON(resp);
									if (resp2.tipo='alert-success') {
										idEvento=resp2.idEvento;
										$('#mensaje').append('Has registrado con exito el evento, has click en el boton evento para crear otro evento.');
										$('#modal-msj').modal('open');
									}else{
										$('#mensaje').append('Lo sentimos hubo un error al registrar el evento, has click en el boton evento para intentar nuevamente \n\n'+resp2.mensaje);
										$('#redirec').text('Resgistrarse');
										$('#modal-msj').modal('open');
									}
								}
							});
						}
					}else{
						console.log('Elegir tipo de materiales');
					}
				}else{
					if ($("#inputAddres-contacto").is(":visible") && $("#inputTlf-contacto").is(":visible")) {
						if ($('#tlf-contacto').val()!='' && $('#addres-contacto').val()!='') {
							var data ={
								geoPicked:createCoordinates(markerPicker),
								address:$('#addressForm').val(),
								referencia:$('#referencia').val(),
								startDate:$('#startDate').val(),
								endDate:$('#endDate').val(),
								startHour:$('#startHour').val(),
								endHour:$('#endHour').val(),
								typeEvent:$('#typeEvent').val(),
								description:$('#description').val(),
								addressContacto:$('#addres-contacto').val(),
								tlfContacto: $('#tlf-contacto').val()
							};
							$.ajax({
								url:'../models/save_event-model.php',
								type:'POST',
								data:data,
								success:function(resp){
									var resp2 = $.parseJSON(resp);
									if (resp2.tipo='alert-success') {
										idEvento=resp2.idEvento;
										$('#mensaje').append('Has registrado con exito el evento, has click en el boton evento para crear otro evento.');
										$('#modal-msj').modal('open');
									}else{
										$('#mensaje').append('Lo sentimos hubo un error al registrar el evento, has click en el boton evento para intentar nuevamente \n\n'+resp2.mensaje);
										$('#redirec').text('Resgistrarse');
										$('#modal-msj').modal('open');
									}
								}
							});	
						}else{
							Materialize.toast('campos vacios', 4000, 'rounded');
						}
					}else{
						var data ={
							geoPicked:createCoordinates(markerPicker),
							address:$('#addressForm').val(),
							referencia:$('#referencia').val(),
							startDate:$('#startDate').val(),
							endDate:$('#endDate').val(),
							startHour:$('#startHour').val(),
							endHour:$('#endHour').val(),
							typeEvent:$('#typeEvent').val(),
							description:$('#description').val(),
						};
						$.ajax({
							url:'../models/save_event-model.php',
							type:'POST',
							data:data,
							success:function(resp){
								var resp2 = $.parseJSON(resp);
								if (resp2.tipo='alert-success') {
									idEvento=resp2.idEvento;
									$('#mensaje').append('Has registrado con exito el evento, has click en el boton evento para crear otro evento.');
									$('#modal-msj').modal('open');
								}else{
									$('#mensaje').append('Lo sentimos hubo un error al registrar el evento, has click en el boton evento para intentar nuevamente \n\n'+resp2.mensaje);
									$('#redirec').text('Resgistrarse');
									$('#modal-msj').modal('open');
								}
							}
						});						
					}
				}
			}else{
				Materialize.toast('campos vacios', 4000, 'rounded');
			}
		}else{
			Materialize.toast('campos invalidos', 4000, 'rounded');
		}
	});

	$("#tlf-contacto").on("blur", function() {
		var RegExPattern = /^[0-9]{4}-? ?[0-9]{7}$/;
		if ((this.value.match(RegExPattern)) && (this.value != '')) {
			$('#tlf-contacto').removeClass('invalid');
		}else{ 
			if (this.value != ''){
				Materialize.toast('Telefono invalido <br> Ingrese formato 0261-1234567 <br> O 0414-1234567', 4000, 'rounded');
				$('#tlf-contacto').addClass('invalid');
			}else{
				$('#tlf-contacto').addClass('invalid');
			}
		}
	});


	$(function(){
		$.ajax({
			url:'../models/materialesSelect-model.php',
			type:'POST',
			success:function(resp){
				// console.log(resp);
				var resp2 = $.parseJSON(resp);
				for (var i = 0; i < resp2.length-1; i++) {
					$('#typeMaterials').append("<option value='"+resp2[i]["idmateriales"]+"'>"+resp2[i]["name"]+"</option>");
				}
				if (resp2[resp2.length-1]['datos']== false ) {
					$('#inputAddres-contacto,#inputTlf-contacto').fadeIn("slow");
				}
				$('#typeMaterials').material_select();
			}
		});
	});

});

function checkDate(){
	console.log('revisando');
	if ($('#startDate').val()!='' && $('#startHour').val()!='') {
		var d = new Date();
		var fechaInicio = $('#startDate').val();
		var horaInicio = Date.parseExact($('#startHour').val(), "hh:mm tt")+' ';
		horaInicio = horaInicio.substr(16, horaInicio.length-55);
		var startComplete = new Date(fechaInicio+' '+horaInicio);
		if (startComplete < d) {
			$('#startHour').addClass('invalid');
			Materialize.toast('Hora de inicio no puede ser menor a la hora actual', 4000, 'rounded');			
		}else{
			($('#startHour').hasClass('invalid')) ? $('#startHour').removeClass('invalid') : null ;
		}
	}

	if ($('#startDate').val()!='' && $('#startHour').val()!='' && $('#endDate').val()!='' && $('#endHour').val()!='') {
		var fechaFinal=$('#endDate').val();
		var horaFinal=Date.parseExact($('#endHour').val(), "hh:mm tt")+' ';
		horaFinal=horaFinal.substr(16, horaFinal.length-55);
		var endComplete= new Date(fechaFinal+' '+horaFinal);
		if(endComplete <= startComplete){
			$('#endDate').addClass('invalid');
			$('#endHour').addClass('invalid');
			Materialize.toast('Fecha final no puede ser inferior a fecha inicio', 4000, 'rounded');
		}else{
			if ($('#endDate').hasClass('invalid')) {
				$('#endDate').removeClass('invalid');
				$('#endHour').removeClass('invalid');				
			}
			
		}
	}
}
