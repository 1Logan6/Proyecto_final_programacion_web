<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Producto</title>
</head>

<body>

    @include('partials.navigation')

    <h1> Detalle de producto: </h1><br>

    <h2>Nombre de producto: {{ $producto -> nombre }} </h2>

</body>

</html>