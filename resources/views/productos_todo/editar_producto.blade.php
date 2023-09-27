<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de producto</title>
</head>
<body>
    @include('partials.navigation')
    
    <h1>Formulario de editar producto</h1>

    <form action="{{route('producto.update', $producto)}}" method="POST">
        <!-- Esta es una ruta absoluta para el store {{ route('producto.store') }} -->

        @csrf
        @method('PATCH')

        <label for="nombre">Nombre del producto</label><br>
        <input type="text" name="nombre" value = "{{$producto->nombre}}"><br>

        <label for="precio">Precio</label><br>
        <input type="number" name="precio" step="0.01" value = "{{$producto->precio}}"><br>

        <label for="descripcion">Descripcion</label><br>
        <input type="text" name="descripcion" value = "{{$producto->descripcion}}"><br>

        <label for="fecha_vencimiento">Fecha de vencimiento</label><br>
        <input type="date" name="fecha_vencimiento" value = "{{$producto->fecha_vencimiento}}"><br>

        <label for="stock">Cantidad stock</label><br>
        <input type="number" name="stock" value = "{{$producto->stock}}"><br>

        
        <input type="submit" value="Enviar">
    </form>
</body>
</html>