<html>
    <head>
       <title>Estudiantes</title>
    </head>
    <body>
        <p>
        @foreach($estudiantes as $est)
              <p>{{$est['name']}}-{{$est['n1']}}-{{$est['n2']}}-{{$est['n3']}}</p>
            @endforeach
        </p>
       
    </body>
</html>