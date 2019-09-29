$(document).ready(function(){
    var p1='';
    var p2='';
    var r1='';
    var r2='';
    var id='';
    var intentos=0;
    //validar correo en la base de datos y formato correco
    $("#emailUser").on("blur", function() {
        if ($("#emailUser").hasClass('invalid') || $("#emailUser").value === '') {
            Materialize.toast('Correo invalido <br> Ingrese formato usuario@servicio.com', 3000, 'rounded');    
        }else{
            checkMailStatus();
        }
    });

    //Revisar correo en BD
    function checkMailStatus(){
        var email=$("#emailUser").val();
        var data={
            email:email,
            recuperar:true,
        };
        $.ajax({
            type:'post',
            url:'../models/checkEmail.php',
            data:data,
            success:function(msg){
                var resp =$.parseJSON(msg);

                if(resp===false){
                    console.log('Este correo no esta registrado');
                    Materialize.toast('Correo no esta registrado', 3000, 'rounded');
                    $('#emailUser').addClass('invalid');
                }else {
                    p1=resp['pregunta1'];
                    p2=resp['pregunta2'];
                    r1=resp['respuesta1'];
                    r2=resp['respuesta2'];
                    id=resp['id'];
                    $("label[for='respuesta1']").text(p1);
                    $("label[for='respuesta2']").text(p2);
                    if ($('#emailUser').hasClass('invalid')) {
                        $('#emailUser').removeClass('invalid');
                    } 
                }
            }
        });
    }

    // BOTON SIGUIENTE
    $("#next").click(function(){
        event.preventDefault();
        if($('#emailUser').hasClass('invalid')){
            Materialize.toast('Corrige campos en rojo', 3000, 'rounded');
        }else {
            if($('#emailUser').val()==""){
                Materialize.toast('Campos vacios', 3000, 'rounded');
            }else{
                $('#form1').addClass('animated bounceOutLeft hide');
                $('#form2').removeClass('hide');
                $('#form2').addClass('animated bounceInRight');
            }
        }
    });

    // BOTON ENVIAR
    $("#send").click(function(){
        event.preventDefault();
        if($('#respuesta2').val()==r2 && $('#respuesta1').val()==r1){
            if ($('#respuesta2').hasClass('invalid') || $('#respuesta1').hasClass('invalid')) {
                $('#respuesta2').removeClass('invalid');
                $('#respuesta2').removeClass('invalid');
            }
            $('#form2').addClass('animated bounceOutLeft hide');
            $('#form3').removeClass('hide');
            $('#form3').addClass('animated bounceInRight');
        }else{
            if (!$('#respuesta2').hasClass('invalid') || !$('#respuesta1').hasClass('invalid')) {
                $('#respuesta1').addClass('invalid');
                $('#respuesta2').addClass('invalid');
            }
            Materialize.toast('Alguna respuesta es incorreta', 3000, 'rounded');
        }
    });

    // BOTON GUARDAR
    $("#savePassword").click(function(){
        event.preventDefault();
        if($('#psw').hasClass('invalid') || $('#password').hasClass('invalid')){
            Materialize.toast('Corrige campos', 3000, 'rounded');
        }else{
            var data={
                psw:$('#psw').val(),
                email:$("#emailUser").val(),
                id:id,
            };
            $.ajax({
                type:'post',
                url:'../models/updatePass.php',
                data:data,
                success:function(msg){
                    var resp2 = $.parseJSON(msg);
                    if (resp2='true') {
                        console.log('entre1');
                        $('#mensaje').append('Tu clave a sido cambiada con exitoss.');
                        $('#redirec').text('Inicio');
                        $('#modal-msj').modal('open');
                        // BOTON REDIRECCIONAR DE MODAL MENSAJE
                        $("#redirec").click(function(event){
                            event.preventDefault();
                            window.location = '../index.php';
                        });
                        setTimeout(function(){
                            window.location = '../views/home.php';
                        }, 5000);
                    }else{
                        console.log('entre2');
                        $('#mensaje').append('Lo sentimos hubo un error al cambiar tu contraseña.');
                        $('#redirec').text('Intentar nuevamente');
                        // BOTON REDIRECCIONAR DE MODAL MENSAJE
                        $("#redirec").click(function(event){
                            event.preventDefault();
                            window.location = '../views/recuperar-contrasena.php';
                        });
                    }   
                }
            });            
        }
    });

    // Validar contraseña
    $("#password").on("blur", function() {
        var RegExPattern = /^[a-zA-Z0-9]{8,20}$/;
        if ((this.value.match(RegExPattern)) && (this.value != '')) {
            $('#password').removeClass('invalid');
        } else if (this.value != ''){
            Materialize.toast('Contrase&ntilde;a invalida <br> Debe contener: <br> letras, numeros y entre 8 y 20 caracteres', 3000, 'rounded');
            $('#password').addClass('invalid');
        }else{
            $('#password').addClass('invalid');
        }
    });

    // COMPROBAR SI LAS CONTRASEÑAS SON IGUALES
    var entro=false;
    $("#psw").click(function(){
        entro=true;
    });
    $("#psw,#password").blur(function(){
        if($("#password").val() != $("#psw").val()) {
            if (entro==true) {
                $('#errorPassword').removeClass('hide');
                $('#psw').addClass('invalid');
                Materialize.toast('Contraseña no son iguales', 3000, 'rounded');
            }
        }else{
            if(!$("#errorPassword").hasClass('hide')) {

                $('#errorPassword').addClass('hide'); 
                $('#psw').removeClass('invalid');
            }
        }   
    }); 

    $(".dropdown-button").dropdown();
    $(".button-collapse").sideNav(); 
    $('.modal').modal({
        dismissible: true, // Modal can be dismissed by clicking outside of the modal
        opacity: .5, // Opacity of modal background
        inDuration: 300, // Transition in duration
        outDuration: 200, // Transition out duration
        startingTop: '4%', // Starting top style attribute
        endingTop: '10%', // Ending top style attribute
    });       
});