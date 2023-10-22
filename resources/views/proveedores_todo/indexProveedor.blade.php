<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ProveedorMain</title>
</head>
<body>
    <h1>Este es el index de provedor</h1>

    <ul>
        @foreach ($proveedores as $proveedor)

            <li>
                <a href="{{ route('proveedor.show', $proveedor) }}">
                    {{ $proveedor->nombre_completo }}
                </a>
                |
                <a href="{{ route('proveedor.edit', $proveedor) }}">
                    Editar
                </a>
                <form action="{{ route('proveedor.destroy', $proveedor) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>

</body>
</html>
