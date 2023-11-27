<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @include('partials.navigation')
    
    <h1>Formulario de editar producto</h1>

    <form action="{{route('producto.update', $producto)}}" method="POST">
        <!-- Esta es una ruta absoluta para el store {{ route('producto.store') }} -->

        @csrf
        @method('PATCH')

        <label for="nombre">Nombre del producto</label><br>
        <input type="text" name="nombre" value = "{{old ('nombre') ?? $producto->nombre}}"><br>

        <label for="precio">Precio</label><br>
        <input type="number" name="precio" step="0.01" value = "{{old('precio') ?? $producto->precio}}"><br>

        <label for="descripcion">Descripcion</label><br>
        <input type="text" name="descripcion" value = "{{old('descripcion') ?? $producto->descripcion}}"><br>

        <label for="fecha_vencimiento">Fecha de vencimiento</label><br>
        <input type="date" name="fecha_vencimiento" value = "{{old('fecha_vencimiento') ?? $producto->fecha_vencimiento}}"><br>

        <label for="stock">Cantidad stock</label><br>
        <input type="number" name="stock" value = "{{old('stock') ?? $producto->stock}}"><br>

        {{-- <label for="archivo">Cargar imagen</label><br>
        <input type="file" name="archivo" value = "{{old('archivo') ?? $producto->archivo_nombre }}"><br> --}}

        <input type="submit" value="Enviar">
    </form>
</body>
</html>