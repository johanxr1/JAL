$(document).ready(function(){
	$('.collapsible').collapsible();
	$('.modal').modal();
	$('ul.tabs').tabs({
	  swipeable : true,
	  responsiveThreshold : Infinity
	});
	var pathname = window.location.pathname;
	(pathname.indexOf("views") != -1) ?  path='../' :  path='./';
	// BOTON INICIO
	$('#send').click(function (event) {
		event.preventDefault();

		if($('#emailUser').hasClass('invalid') ){
			Materialize.toast('Corrige campos en rojo', 3000, 'rounded');
		}else{
			if($('#emailUser').val()=="" || $('#psw').val()=="") {
				Materialize.toast('Campos vacios', 3000, 'rounded');
			}else{
				var datos = {
					emailUser: $('#emailUser').val(),
					password: $('#psw').val(),
				}

				$.ajax({
					url:path+'models/login.php',
					type:'POST',
					data:datos,
					success:function(resp){
						var resp2 = $.parseJSON(resp);
						console.log(resp2.estado);
						console.log(resp2.Mensaje);

						if (resp2.estado==='true') {
							Materialize.toast(resp2.Mensaje, 3000, 'rounded');
							(pathname.indexOf("views") != -1) ?  window.location="./home.php" : window.location="./views/home.php";
							;
						}else{
							Materialize.toast(resp2.Mensaje, 3000, 'rounded');
						}					
					},
				});
			}
		}
	});

});


