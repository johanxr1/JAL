/*--------------------------------------------------------------
								GENERAL 
---------------------------------------------------------------*/
var firsTime=true;
var TILE_SIZE = 256;
var markers = [];  
var listTile= [];
var petitionTile=[];
var scale = 1 << 15;
var defaultCenter= null;
// var mapStyle = [{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color": "#efebe2"}]},{"featureType":"poi","elementType":"all","stylers":[{"color":"#efebe2"}]},{"featureType":"poi.attraction","elementType":"all","stylers":[{"color":"#efebe2"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"color":"#efebe2"}]},{"featureType":"poi.government","elementType":"all","stylers":[{"color":"#dfdcd5"}]},{"featureType":"poi.medical","elementType":"all","stylers":[{"color":"#dfdcd5"}]},{"featureType":"poi.park","elementType":"all","stylers":[{"color":"#bad294"}]},{"featureType":"poi.place_of_worship","elementType":"all","stylers":[{"color":"#efebe2"}]},{"featureType":"poi.school","elementType":"all","stylers":[{"color":"#efebe2"}]},{"featureType":"poi.sports_complex","elementType":"all","stylers":[{"color":"#efebe2"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"#fbfbfb"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#a5d7e0"}]}];
var mapStyle=[
    {
        "featureType": "all",
        "elementType": "all",
        "stylers": [
            {
                "saturation": "32"
            },
            {
                "lightness": "-3"
            },
            {
                "visibility": "on"
            },
            {
                "weight": "1.18"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "all",
        "stylers": [
            {
                "saturation": "-70"
            },
            {
                "lightness": "14"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "saturation": "100"
            },
            {
                "lightness": "-14"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            },
            {
                "lightness": "12"
            }
        ]
    }
];
var pathname = window.location.pathname;

/*------------TRATANDO DE USAR HTML5 GEOLOCATION------------*/
navigator.geolocation.getCurrentPosition(function(position) {
	defaultCenter = {lat: position.coords.latitude, lng: position.coords.longitude};
 }, function(err) {
	console.warn('ERROR(' + err.code + '): ' + err.message); 
});

/*--------------------------------------------------------------
			INICIALIZANDO MAP Y FUNCIONES RELACIONADAS 
---------------------------------------------------------------*/

function initMap(){
	var geocoder = new google.maps.Geocoder;
	if (defaultCenter== null) {defaultCenter = new google.maps.LatLng(10.6940985, -71.6341421);} 
	if (firsTime=true) { inverse_geocoords(geocoder,defaultCenter);}
	
	// Crea el mapa
	var map = new google.maps.Map(document.getElementById('map'), {
		center: defaultCenter,
		zoom: 15,
		styles: mapStyle,
		minZoom: 15, 
		maxZoom: 15,
		disableDefaultUI: true
	});

	//Escucha cuando el mapa se desocupa para calcular limites
	// y pedir marcadores si es necesario
	google.maps.event.addListener(map, 'idle', function(){
		// Calcula los puntos NW y SE (superior Izq. e inferior Derecho)
		var northWest=new google.maps.LatLng(map.getBounds().getNorthEast().lat(), map.getBounds().getSouthWest().lng());
		var southEast=new google.maps.LatLng(map.getBounds().getSouthWest().lat(), map.getBounds().getNorthEast().lng());
		findCoordsTiles(northWest,southEast);
	});

	//Crear la caja de busqueda para la lista de eventos
	var options = {componentRestrictions: {country: 've'}};
	var inputList = document.getElementById('inputAddress');
	var searchBoxList = new google.maps.places.SearchBox(inputList, options);
	searchBoxList.addListener('places_changed', function() {
		var place = searchBoxList.getPlaces();
		if (place.length != 0) {
			place.forEach(function(place) {
				if (!place.geometry) {
					console.log("El lugar devuelto no contiene geometría");
					return;
				}else{
					$('#listEvent').empty();
					var coords= new google.maps.LatLng(place.geometry.location.lat(), place.geometry.location.lng());
					var worldPoint= project(coords);
					var tilePoint= tileCoordinate(worldPoint);
					for (var tileX = (tilePoint.x - 2); tileX < (tilePoint.x + 2); tileX++) {
						for (var tileY = (tilePoint.y - 2); tileY < (tilePoint.y + 2); tileY++) {
							petitionTile.push({x: tileX, y: tileY});
						}
					}
					//Si hay nuevos tiles dentro del viewport hacer consulta a la BD
					(petitionTile.length !=0)? requesTile(petitionTile,'list') : null;	
				}	
			});
		}else{
			$('#inputAddress').placeholder = 'Ingresa una Ubicacion';
			return;
		}
	});

	// Crear la caja de busqueda para el mapa
    var inputMap = document.getElementById('pac-input');
    var searchBoxMap = new google.maps.places.SearchBox(inputMap);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(inputMap);
	searchBoxMap.addListener('places_changed', function() {
		var place = searchBoxMap.getPlaces();
		if (place.length != 0) {
			place.forEach(function(place) {
				if (!place.geometry) {
					console.log("El lugar devuelto no contiene geometría");
					return;
				}else{
					map.setCenter(place.geometry.location);
				}	
			});
		}
	});

	//Buscar eventos para modo listado
	function inverse_geocoords(geocoder,defaultCenter) {
		geocoder.geocode({'location': defaultCenter}, function(results, status) {
			if (status === 'OK') {
				if (results[1]) {
					$('#inputAddress').val(results[1].formatted_address);
					$('#listEvent').empty();
					var coords= new google.maps.LatLng(defaultCenter.lat(), defaultCenter.lng());
					var worldPoint= project(coords);
					var tilePoint= tileCoordinate(worldPoint);
					for (var tileX = (tilePoint.x - 2); tileX < (tilePoint.x + 2); tileX++) {
						for (var tileY = (tilePoint.y - 2); tileY < (tilePoint.y + 2); tileY++) {
							petitionTile.push({x: tileX, y: tileY});
						}
					}

					//Si hay nuevos tiles dentro del viewport hacer consulta a la BD
					(petitionTile.length !=0)? requesTile(petitionTile,'list') : null;

				} else {window.alert('No se han encontrado resultados');}
			} else {window.alert('Geocoder falló debido a : ' + status);}
		});
	}

	// find tiles coords  and do request of events inside tiles
	function findCoordsTiles(northWest,southEast){
		var worldCoordinateNW = project(northWest);
		var worldCoordinateSE = project(southEast);	
		var tileNW = tileCoordinate(worldCoordinateNW);
		var tileSE = tileCoordinate(worldCoordinateSE);

		//recorrer todos los tiles dentro del viewport
		for (var tileY = tileNW.y; tileY <= tileSE.y; tileY++) {
			for (var tileX = tileNW.x; tileX <= tileSE.x; tileX++) {
				if (!matchTiles(tileX,tileY)) {
					listTile.push({x: tileX, y: tileY});
					petitionTile.push({x: tileX, y: tileY});
				}		
			}
		}

		//Si hay nuevos tiles dentro del viewport hacer consulta a la BD
		(petitionTile.length !=0)? requesTile(petitionTile,'map') : null;
	}

	// Hacer pedido de los eventos dentro de los nuevos tiles
	function requesTile(petitionTile,type){	
		var path='';
		(pathname.indexOf("home") != -1) ?  path='../models/showEvents-model.php' :  path='./models/showEvents-model.php';
		$.ajax({
			url: path,
			type:'POST',
			data:{'requesTile':JSON.stringify(petitionTile)},
			success:function(resp){
				// console.log(resp);
				if (resp!=false) {
					var events=$.parseJSON(resp);

					if (type==='map') {
						showEvents(map,events);						
					}else{
						listEvent(events);
					}

				}
				petitionTile.length=0;//vacia el arreglo para el prox pedido
			}
		});	
	}

	//Crea los marcadores de eventos y le agrega un Info.Windows
	function showEvents(map, events) {	
		var path='';
		(pathname.indexOf("home") != -1) ?  path='../' :  path='./';
	    // Adds a marker to the map and push to the array.
	    $.each(events, function(i, e) {

			if (pathname.indexOf("home") != -1) {
				var verMas=	'<div class="row">'+
					            '<a class="col s4 offset-s4" style="margin-top:2rem;" href="'+path+'views/singleEvento.php?idevento='+e.idevento+'" target="_blank">Ver más</a>'+
					        '</div>';
			}else{
				var verMas="";
			}  

			var image = {
				url: path+'assets/img/'+e.typeEvent+'.png',
				// size: new google.maps.Size(250,250),
				origin: new google.maps.Point(0, 0),
				// anchor: new google.maps.Point(17, 34),
				scaledSize: new google.maps.Size(125, 100)
			};
	    	var typeUser=1;
	     	//create the marker
			var myLatLng = new google.maps.LatLng(e.lat, e.lng);
			marker = new google.maps.Marker({
				map: map,
				icon: image,
				position: myLatLng,
				animation: google.maps.Animation.DROP,
				title: e.typeEvent,
			});

		    // Set up handle bars
		    var template = Handlebars.compile($('#marker-content-template').html());
		    
		    // Set up a close delay for CSS animations
		    var info = null;
		    var closeDelayed = false;
		    var closeDelayHandler = function() {
		    	$(info.getWrapper()).removeClass('active');
		    	setTimeout(function() {
		    		closeDelayed = true;
		    		info.close();
		    	}, 300);
		    };
			if (e.typeEvent==='educativo'){
				var color='blue lighten-1 ';
			}
			if (e.typeEvent==='reciclaje'){
				var color='green lighten-1';
			}
			if (e.typeEvent==='voluntario'){
				var color='deep-purple lighten-1';
			}
			
		    // Add a Snazzy Info Window to the marker
		    if (pathname.indexOf("home") != -1) { 
		        var info = new SnazzyInfoWindow($.extend({}, {
		            marker: marker,
			        wrapperClass: 'custom-window',
			        offset: {
			            top: '-52px'
			        },
			        edgeOffset: {
			            top: 50,
			            right: 60,
			            bottom: 50
			        },
			        border: false,
			        closeButtonMarkup: '<button type="button" class="custom-close">&#215;</button>',
			        content: template({
			            title: 'Evento '+e.typeEvent,
			            startDate: 'Inicio : '+e.startDate+' /  Hora : '+e.startHour,
			            endDate:'Fin : '+e.endDate+' /  Hora : '+e.endHour,
			            // bgImg: 'https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?dpr=1&auto=format&fit=crop&w=800&h=350&q=80&cs=tinysrgb&crop=',
		           		body:'<p><img style="height: 54px;" src="'+e.imgUrl+'"class="circle"><em style="font-weight: bold; margin-left:1rem;">Creado por <a href="../views/perfilpu.php?iduserpu='+e.users_id+'" target="_blank"> '+e.name+'</a>.</em></p>'+
				            '<p>'+e.description+'</p>'+
				            '<p><em style="font-weight: bold;">Dirección: </em>'+e.address+'</p>'+
				            '<p><em style="font-weight: bold;">Puntos de referencia:</em> '+e.reference+'</p>'+
							verMas						  		
			        }),
			        callbacks: {
			            open: function() {
			            	$(this.getWrapper()).find('#color').toggleClass(color);
			                $(this.getWrapper()).addClass('open');
			            },
			            afterOpen: function() {
			            	var wrapper = $(this.getWrapper());
			            	wrapper.addClass('active');
			            	wrapper.find('.custom-close').on('click', function(e){
								var w=$($($(e.target).parent()[0]).parent()[0]).parent()[0];
								$(w).remove();
							    setTimeout(function() {
							        closeDelayed = true;
							        info.close();
							    }, 300);
							});
			            },
			            beforeClose: function() {
			            	var wrapper = $(this.getWrapper());
			            	wrapper.find('.custom-close').on('click', function(e){
								var wrap=$($(e.target).parent()[0]).parent()[0];
								var w=$(wrap).parent()[0];
								$(w).remove();
								// $(wrap).removeClass('active');
							    setTimeout(function() {
							        closeDelayed = true;
							        info.close();
							    }, 300);
							});

			            },
			            afterClose: function() {
			                var wrapper = $(this.getWrapper());
			                wrapper.find('.custom-close').off();
			                wrapper.removeClass('open');
			                closeDelayed = false;
			            }
			        }
		        }));
		    }else{
		        var info = new SnazzyInfoWindow($.extend({}, {
		            marker: marker,
			        wrapperClass: 'custom-window',
			        offset: {
			            top: '-52px'
			        },
			        edgeOffset: {
			            top: 50,
			            right: 60,
			            bottom: 50
			        },
			        border: false,
			        closeButtonMarkup: '<button type="button" class="custom-close">&#215;</button>',
			        content: template({
			            title: 'Evento '+e.typeEvent,
			            startDate: 'Inicio : '+e.startDate+' /  Hora : '+e.startHour,
			            endDate:'Fin : '+e.endDate+' /  Hora : '+e.endHour,
			            // bgImg: 'https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?dpr=1&auto=format&fit=crop&w=800&h=350&q=80&cs=tinysrgb&crop=',
			        }),
			        callbacks: {
			            open: function() {
			            	$(this.getWrapper()).find('.custom-body').remove();
			            	$(this.getWrapper()).find('#color').toggleClass(color);
			                $(this.getWrapper()).addClass('open');
			            },
			            afterOpen: function() {
			            	var wrapper = $(this.getWrapper());
			            	wrapper.addClass('active');
			            	wrapper.find('.custom-close').on('click', function(e){
								var w=$($($(e.target).parent()[0]).parent()[0]).parent()[0];
								$(w).remove();
							    setTimeout(function() {
							        closeDelayed = true;
							        info.close();
							    }, 300);
							});
			            },
			            beforeClose: function() {
			            	var wrapper = $(this.getWrapper());
			            	wrapper.find('.custom-close').on('click', function(e){
								var wrap=$($(e.target).parent()[0]).parent()[0];
								var w=$(wrap).parent()[0];
								$(w).remove();
								// $(wrap).removeClass('active');
							    setTimeout(function() {
							        closeDelayed = true;
							        info.close();
							    }, 300);
							});

			            },
			            afterClose: function() {
			                var wrapper = $(this.getWrapper());
			                wrapper.find('.custom-close').off();
			                wrapper.removeClass('open');
			                closeDelayed = false;
			            }
			        }
		        }));		    	
		    }


		    //push marker to the array.
	    	markers.push(marker);
	    });   
	}

	//Busqueja o dubuja los limites de los azulejos
	function sketchTiles(){
	    /** @constructor tiles */
	    function CoordMapType(tileSize) {
	    	this.tileSize = tileSize;
	    }
		CoordMapType.prototype.getTile = function(coord, zoom, ownerDocument) {
			var div = ownerDocument.createElement('div');
			div.innerHTML = coord;
			div.style.width = this.tileSize.width + 'px';
			div.style.height = this.tileSize.height + 'px';
			div.style.fontSize = 'q0';
			div.style.borderStyle = 'solid';
			div.style.borderWidth = '1px';
			div.style.borderColor = '#AAAAAA';
			return div;
		};
	    map.overlayMapTypes.insertAt(0, new CoordMapType(new google.maps.Size(256, 256)));	
	}
	// sketchTiles();
}


//BOTON FILTRO
$('.filter').click(function(){
	if ($(this).hasClass('reciclaje')){
		if ($(this).hasClass('hidden')) {
			$(this).removeClass('hidden');
			showMakers('educativo');
			showMakers('voluntario');
		}else{
			$(this).addClass('hidden');
			hideMakers('educativo');
			hideMakers('voluntario');
		}	
	}
	if ($(this).hasClass('educativo')){
		console.log('educativo');
		if ($(this).hasClass('hidden')) {
			$(this).removeClass('hidden');
			showMakers('reciclaje');
			showMakers('voluntario');
		}else{
			$(this).addClass('hidden');
			hideMakers('reciclaje');
			hideMakers('voluntario');
		}
	}
	if ($(this).hasClass('voluntario')) {
		if ($(this).hasClass('hidden')) {
			$(this).removeClass('hidden');
			showMakers('educativo');
			showMakers('reciclaje');
		}else{
			$(this).addClass('hidden');
			hideMakers('educativo');
			hideMakers('reciclaje');
		}
	}
});

//OCULTAR MARCADORES
function hideMakers(filter){
	for (var i = 0; i < markers.length; i++ ) {
		if (markers[i].getTitle() === filter) {
			markers[i].setVisible(false);
		}
	}
}

//MOSTRAR MARCADORES
function showMakers(filter){
	for (var i = 0; i < markers.length; i++ ) {
		if (markers[i].getTitle() === filter) {
			markers[i].setVisible(true);
		}
	}
}

// LISTAR EVENTOS
function listEvent(events){
	var path='';
	(pathname.indexOf("home") != -1) ?  path='../' :  path='./';
	for (var i = 0; i < events.length; i++) {
		if (pathname.indexOf("home") != -1) {
			var verMas=	'<div class="row">'+
				            '<a class="col s4 offset-s4" style="margin-top:2rem;" href="'+path+'views/singleEvento.php?idevento='+events[i].idevento+'" target="_blank">Ver más</a>'+
				        '</div>';
			var creador='<a href="'+path+'views/perfilpu.php?iduserpu='+events[i].users_id+'" target="_blank">'+events[i].name+'</a>.';
		}else{
			var verMas="";
			var creador=events[i].name;
		}  
		if (events[i].typeEvent==='educativo'){
			var icon='local_library';
			var color='#42A5F5 !important;';
		}
		if (events[i].typeEvent==='reciclaje'){
			var icon='sync';
			var color='#66BB6A !important;';
		}
		if (events[i].typeEvent==='voluntario'){
			var icon='group';
			var color='#ab47bc !important;';
		}

		$('#listEvent').append(
			'<li>'+
				'<div class="collapsible-header "><i class="material-icons" style="color: '+color+' border-right: 1px solid #bfbfbf;padding-right: 34px;">'+icon+'</i>Evento '+events[i].typeEvent+'</div>'+
				'<div class="collapsible-body">'+
					'<p><img style="height: 54px;" src="'+events[i].imgUrl+'"class="circle " ><em style="font-weight: bold; margin-left:1rem;">Creado por '+creador+'</em></p>'+
					'<div style="margin: 0 2rem;">'+
						'<small style="display:block;"><strong>Inicio : </strong>'+events[i].startDate+' / Hora : '+events[i].startHour+'</small>'+
						'<small style="display:block; margin-botton:2rem;"><strong>Fin : </strong>'+events[i].endDate+' / Hora : '+events[i].endHour+'</small>'+
						'<small style="display:block;"><strong>Dirección : </strong>'+events[i].address+'</small>'+
						'<small style="display:block; margin-botton:2rem;"><strong>Puntos de referencia : </strong>'+events[i].reference+'</small>'+
						'<p style="margin-botton:2rem;">'+events[i].description+'</p>'+
						verMas+
					'</div>'+
				'</div>'+
			'</li>'
		);	
	}
}

// Proyecta los puntos a coordenadas mundiales
function project(latLng) {
	var siny = Math.sin(latLng.lat() * Math.PI / 180);
	siny = Math.min(Math.max(siny, -0.9999), 0.9999);
	return new google.maps.Point(
		TILE_SIZE * (0.5 + latLng.lng() / 360),
		TILE_SIZE * (0.5 - Math.log((1 + siny) / (1 - siny)) / (4 * Math.PI))
	);
}

// Calculo coordenadas tile dado un worldCoordinate 
function tileCoordinate(worldCoordinate){
	var wordCoords=worldCoordinate;
	return	new google.maps.Point(
		Math.floor(wordCoords.x * scale / TILE_SIZE),
		Math.floor(wordCoords.y * scale / TILE_SIZE)
		);	
}

// Revisar si coordenadas de un tile ya estan en la lista 
function matchTiles(tileX,tileY){
	var flag=false;
	for (var i = 0; i < listTile.length; i++) {
		if(listTile[i].x==tileX && listTile[i].y==tileY){
			flag=true;
			break;
		}
	}
	return flag;	
}







