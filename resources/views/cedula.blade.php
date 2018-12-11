<!DOCTYPE html>
<html>

    <head>
        <meta charset=" UTF8">
        <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="{{ asset('js/examen.js') }}"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>

        <section id= "section2">
                <form action="#" id="form">
                    <label for="tlf">Cedula</label>
                    <input id="telefono" class="form-control target" type="text" placeholder="Telefono" name="telefono">
                    <div id="valtelefono"></div>
                      <input type="button" name="save" id="save" value="Guardar">
                      <div id="result"></div>
                  </form>
        </section>
        <section id= "section1">
            <div id="div">
                <ul id="valores">

                </ul>
            </div>
        </section>
            @include('footer')
    </body>

</html>