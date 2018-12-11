$(document).ready(function(){
    $('#save').prop('disabled', true);
    $('#valemail').prop('disabled', true);
    $('#telefono').attr("maxlength", 10);
    $('form').find('input[type=email]').blur(function(){
        caracteresCorreoValido($(this).val(), '#valemail')
      });
    $("#descripcion").focusout(function(){
        validar();
    });
 
    $("#save").click(function() {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.post("/save",{_token:csrf_token,email: $("#email").val(),categoria: $("#categoria").val(),
                            telefono: $("#telefono").val(),descripcion: $("#descripcion").val()}
        ).done(function(data){
                $("#result").html(data);
            }).fail(function(cod,status,error){
                console.log(error);  
                console.log($("#email").val()); 
                console.log($("#categoria").val()); 
            });

            $("form").slideUp();
             alert("Ticket creado exitosamente");
    });
    function validar () {
        if($("#descripcion").val()=='' || $("#telefono").val()=='' ||$("#email").val()=='' ){
            $('#save').prop('disabled', true);
        }
        else{
            $('#save').prop('disabled', false);
        }
    };

});//objeto del DOM
function caracteresCorreoValido (email, div){
    console.log(email);
    //var email = $(email).val();
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

    if (caract.test(email) == false){
        $(div).hide().removeClass('hide').slideDown('fast');
        $("#valemail").text($("#email").val());
        $("#valemail").append(" no es un mail válido");
        $("#valemail").css("background-color","#ac3e3e");
        $("#valemail").css("border","solid 1px #DEDEDE");

        return false;
    }else{
        $("#valemail").text("");
//        $(div).html('');
        return true;
    }
}
function isEmail(email) {
    console.log(email);
    var regex = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
    console.log(regex);
    return regex.test(email);
}