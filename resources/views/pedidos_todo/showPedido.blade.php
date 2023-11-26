<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mostrar Producto</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://kit.fontawesome.com/819f23fb66.js" crossorigin="anonymous"></script>

    </head>

    <body class="font-sans antialiased bg-gray-100">

        @include('partials.navigation')
    
        <h1>Lista de Pedidos</h1>

        <table>
            <thead>
                <tr>
                    <th>ID Pedido</th>
                    <th>ID Usuario</th>
                    <th>Nombre Usuario</th>
                    <th>Cantidad de Productos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->id }}</td>
                        <td>{{ $pedido->usuario->id }}</td>
                        <td>{{ $pedido->usuario->name }}</td>
                        <td>{{ $pedido->productos->sum('pivot.cantidad') }}</td>
                        <td>
                            <form action="{{ route('pedidos.marcarRecogido', $pedido->id) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit">Recogido</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </body>

</html>