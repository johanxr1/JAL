var map;
var geoPicked;
var markerPicker;
var geoData=[];
var TILE_SIZE = 256;
var zoom = { minZoom: 15, maxZoom: 15 };
var defaultCenter= null;
var geocoder;


/*------------TRATANDO DE USAR HTML5 GEOLOCATION------------*/
navigator.geolocation.getCurrentPosition(function(position) {
	defaultCenter = {lat: position.coords.latitude, lng: position.coords.longitude};
	initMap();
 }, function(err) {
	console.warn('ERROR(' + err.code + '): ' + err.message); 
	initMap(); 
});

function inverse_geocoords(geocoder,latitude,longitude) {
	var latlng = {lat: parseFloat(latitude), lng: parseFloat(longitude)};
	geocoder.geocode({'location': latlng}, function(results, status) {
		if (status === 'OK') {
			if (results[1]) {
				$('#addressModal').val(results[1].formatted_address);
				$('#addressModal').addClass('valid');
				$('#save-geo').removeClass('disabled');
			} else {window.alert('No se han encontrado resultados');}
		} else {window.alert('Geocoder falló debido a : ' + status);}
	});
}

function project(latLng) {
	var siny = Math.sin(latLng.lat() * Math.PI / 180);

	// Truncating to 0.9999 effectively limits latitude to 89.189. This is
	// about a third of a tile past the edge of the world tile.
	siny = Math.min(Math.max(siny, -0.9999), 0.9999);

	return new google.maps.Point(
		TILE_SIZE * (0.5 + latLng.lng() / 360),
		TILE_SIZE * (0.5 - Math.log((1 + siny) / (1 - siny)) / (4 * Math.PI))
	);
}

function createCoordinates(marker) {
	var worldCoordinate = project(marker.getPosition());
	var scale = 1 << zoom.minZoom;

	var pixelCoordinate = new google.maps.Point(
		Math.floor(worldCoordinate.x * scale),
		Math.floor(worldCoordinate.y * scale)
	);

	var tileCoordinate = new google.maps.Point(
		Math.floor(worldCoordinate.x * scale / TILE_SIZE),
		Math.floor(worldCoordinate.y * scale / TILE_SIZE)
	);
	

	return geoPicked={
		latLng: {lat: marker.getPosition().lat(), lng: marker.getPosition().lng()},
		tileCoordinate: tileCoordinate,
	}
}

/*--------------------------------------------------------------
		INICIALIZANDO MAP Y FUNCIONES RELACIONADAS AL API
---------------------------------------------------------------*/
function initMap(){
	geocoder = new google.maps.Geocoder;
	if (defaultCenter== null) {defaultCenter = new google.maps.LatLng(10.6940985, -71.6341421);} 

	// Crea el mapa
	map = new google.maps.Map(document.getElementById('map'), {
		zoom: 15,
		minZoom: 15, 
		maxZoom: 15,
		disableDefaultUI: true
	});    

    // Crea marcador para la seleccion
	markerPicker = new google.maps.Marker({
		position: defaultCenter,
		map: map,
		title: 'Desliza hasta la ubicacion',
		draggable: true
	});
	
	// Crear la caja de busqueda para el mapa
    var inputMap = document.getElementById('addressModal');
    var searchBoxMap = new google.maps.places.SearchBox(inputMap);
	searchBoxMap.addListener('places_changed', function() {
		var place = searchBoxMap.getPlaces();
		if (place.length != 0) {
			console.log(place.length);
			place.forEach(function(place) {
				if (!place.geometry) {
					console.log("El lugar devuelto no contiene geometría");
					return;
				}else{
					var coords= new google.maps.LatLng(place.geometry.location.lat(), place.geometry.location.lng());
					map.panTo(place.geometry.location);
					markerPicker.setPosition(coords);
		    		$('#save-geo').removeClass('disabled');
				}	
			});
		}else {
			$('#addressModal').val('');
			$('#addressModal').attr("placeholder", "Ingresa una direccion valida");
			$('#addressModal').addClass('invalid');
		}
	});

	/*---------MOSTRAR DIRECCION TEXTUAL DEL MARCADOR---------*/
	google.maps.event.addListener(markerPicker, 'dragend', function(evt){
		inverse_geocoords(geocoder,evt.latLng.lat().toFixed(3),evt.latLng.lng().toFixed(3));//convertir coordenadas a direccion
	});
}//FIN FUNCIONES DEL MAPA


