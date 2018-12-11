<!DOCTYPE html>
<html>

    <head>
        <meta charset=" UTF8">
        <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <body>
            @include('header')
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
           <section id="section">
            {{ csrf_field() }}
            <section id="section2">
                <form id="form">
                    <input type="text"  id="codigo" name="codigo"placeholder="Nombre del Perro"  aria-describedby="basic-addon2">
                    <button class="btn btn-info consulta" id="consultar" name="consultar" type="button">Buscar</button>
                    <button type="submit" class="btn btn-primary">Limpiar</button>
                    <br>
                        <label for="id" >ID</label>
                        <input type="text"  id="id" name="id" >      
                        <label for="nombre" >Nombre</label>
                        <input type="text" id="nombre" name="nombre" >
                        <label for="Tipo" >Raza</label>
                        <input type="text" id="Tipo" name="Tipo" >
                        <br>
                
                </form>
          </section>
            
@include('footer')      
    </body>
    <script>
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
                           $("lista").text(informe[0]["Id"]);
                         },
                     error: function(data){
                         alert(data.responseText);
                     }
                 });
                 });
    </script>
 


</html>