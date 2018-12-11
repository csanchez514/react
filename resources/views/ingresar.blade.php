<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/Ingresar/Ingre" method="post">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="nombre">
        <label>Nivel:</label>
        <input type="text" name="nivel">
        <input type="text" name="nota1">
        <label>Nota 2:</label>
        <input type="text" name="nota2">
        <label>Nota 3:</label>
        <input type="text" name="nota3">
        <input type="submit" value="Insertar">
    </form>
</body>
</html>