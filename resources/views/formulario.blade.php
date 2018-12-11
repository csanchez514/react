<!DOCTYPE html>
<html>

    <head>
        <meta charset=" UTF8">
        <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="{{ asset('js/funciones.js') }}"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>
            @include('header')

        <section id= "section2">
                <form action="#" id="form">
                    <label for="ticket"># Ticket:</label>
                    <input type="text" id="ticket" name="ticket" placeholder="ticket">
                    <label for="categoria">Categoria</label>
                    <select required="required" class="form-control" name="categoria" id="categoria">
                        <option value="Iphone">Iphone</option>
                        <option value="Samsung">Samsung</option>
                        <option value="huawei">Huawei</option>
                        <option value="Xperia">Xperia</option>
                    </select>
                    <label for="email">Email</label>
                    <input name="email" class="form-control target" id="email" type="email" placeholder="Email">
                    <div id="valemail"><h6 class="text-danger"></h6></div>
                    <label for="tlf">Telefono</label>
                    <input id="telefono" class="form-control target" type="text" placeholder="Telefono" name="telefono">
                    <div id="valtelefono">Cedula no válida</div>
                    <label for="message">Descripcion</label>
                      <textarea name="descripcion" class="form-control target" id="descripcion" rows="6" placeholder="Descripcion"></textarea>
                      </select>
                      <input type="button" name="save" id="save" value="Guardar">
                      
                      <div id="result"></div>
                  </form>
        </section>
            @include('footer')
    </body>

    <script>
        // cuando pierde el foco, este valida si lo que esta en el campo de texto si es un correo o no y muestra una respuesta

      </script>

</html>