
        $('.consulta').click(function() {
                     //alert("entra al onclick");
                     var val = $("#codigo").val();
                     $.ajax({
                         type:"GET",
                         url:'/Perro',
                         data:{'nombre':val, "_token": $('#token').val()},
                         datatype: 'JSON',
                         success: function(data) {
                          
                           var informe = Object.values(data);
                           
                           $("#id").val(informe[0]["Id"]);
                           $("#nombre").val(informe[0]["Nombre"]);
                           $('#Tipo').val(informe[0]["Tipo"]);
                           $("#codigo").val('');
                         },
                     error: function(data){
                         alert(data.responseText);
                     }
                 });
                 });
 

