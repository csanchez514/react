$(document).ready(function(){
    $('#section1').prop('disabled', true);
    $('#valtelefono').prop('disabled', true);
    $('#telefono').attr("maxlength", 10);
    $('#telefono').focusout(function(){
        validar();
    });
    $('form').find('input[type=text]').blur(function(){
        caracteresValido($(this).val(), '#valtelefono')
      });
    $("#save").click(function() {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.post("/save",{_token:csrf_token,cedula: $("#telefono").val()}
        ).done(function(data){
                $("#result").html(data);
            }).fail(function(cod,status,error){
                console.log(error);  
                console.log($("#telfono").val()); 
            });
            
            $("#section1").fadeIn(10, function(){
                $('#form').fadeOut(10,);
                $.get("/save"
                ).done(function(data){
                    var informe = Object.values(data);
                    $('#div').append(informe);

                    }).fail(function(cod,status,error){
                        console.log(error); 
                    });       
            });
    });

});
function validar () {
    if($("#telefono").val()==''){
        $('#save').prop('disabled', true);
    }
    else{
        $('#save').prop('disabled', false);
    }
};
function caracteresValido (email, div){
    console.log(email);
    //var email = $(email).val();
    var caract = new RegExp(/^([0-9])*$/);

    if (caract.test(email) == false){
        $(div).hide().removeClass('hide').slideDown('fast');
        $("#valtelefono").text("");
        $("#valtelefono").append(" no es una cédula válida");
        $("#valtelefono").css("background-color","#ac3e3e");
        $("#valtelefono").css("border","solid 1px #DEDEDE");

        return false;
    }else{
        $("#valtelefono").text("");
        $("#valtelefono").css("background-color","white");
        $("#valtelefono").css("border","solid 1px #DEDEDE");
//        $(div).html('');
        return true;
    }
}