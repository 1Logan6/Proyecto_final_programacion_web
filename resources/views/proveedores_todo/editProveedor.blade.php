<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Norma</title>
</head>
<body>
    <h1>Agregar Norma</h1>
    <form action="{{ route('proveedor.update', $proveedor) }}" method="post">
        @csrf
        @method('PATCH')

        <label for="nombre_completo">Nombre:</label><br>
        <input type="text" name="nombre_completo" value="{{ old('nombre_completo') ?? $proveedor->nombre_completo }}"><br>

        <label for="num_telefono">Numero de telefono:</label><br>
        <input type="text" name="num_telefono" value="{{ old('num_telefono') ?? $proveedor->num_telefono }}"><br>

        <label for="correo">Correo electronico:</label><br>
        <input type="email" name="correo" value="{{ old('correo') ?? $proveedor->correo }}"><br>

        <label for="direccion">Direccion:</label><br>
        <input type="text" name="direccion" value="{{ old('direccion') ?? $proveedor->direccion }}"><br>

        <label for="nombre_empresa">Nombre de empresa:</label><br>
        <input type="text" name="nombre_empresa" value="{{ old('nombre_empresa') ?? $proveedor->nombre_empresa }}"><br>

        <input type="submit" value="Guardar">
    </form>
</body>
</html>