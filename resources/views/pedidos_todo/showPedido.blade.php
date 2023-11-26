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
    
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold mb-8">Lista de Pedidos Activos</h1>
        
            <table class="w-full border border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border">ID Pedido</th>
                        <th class="py-2 px-4 border">ID Usuario</th>
                        <th class="py-2 px-4 border">Nombre Usuario</th>
                        <th class="py-2 px-4 border">Cantidad de Productos</th>
                        <th class="py-2 px-4 border">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pedidosActivos as $pedido)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border">{{ $pedido->id }}</td>
                            <td class="py-2 px-4 border">{{ $pedido->usuario->id }}</td>
                            <td class="py-2 px-4 border">{{ $pedido->usuario->name }}</td>
                            <td class="py-2 px-4 border">{{ $pedido->productos->sum('pivot.cantidad') }}</td>
                            <td class="py-2 px-4 border">
                                <form action="{{ route('pedidos.marcarRecogido', $pedido->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Recogido</button>
                                </form>
                                <a href="{{ route('pedidos.detalle', $pedido->id) }}" class="bg-green-500 text-white px-4 py-2 rounded ml-2 inline-block">Detalles</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-4 px-4 text-center">No hay pedidos activos.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        
            <h1 class="text-3xl font-bold mt-8 mb-8">Lista de Pedidos Recogidos</h1>
        
            <table class="w-full border border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border">ID Pedido</th>
                        <th class="py-2 px-4 border">ID Usuario</th>
                        <th class="py-2 px-4 border">Nombre Usuario</th>
                        <th class="py-2 px-4 border">Cantidad de Productos</th>
                        <th class="py-2 px-4 border">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pedidosEliminados as $pedido)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border">{{ $pedido->id }}</td>
                            <td class="py-2 px-4 border">{{ $pedido->usuario->id }}</td>
                            <td class="py-2 px-4 border">{{ $pedido->usuario->name }}</td>
                            <td class="py-2 px-4 border">{{ $pedido->productos->sum('pivot.cantidad') }}</td>
                            <td class="py-2 px-4 border">
                            <a href="{{ route('pedidos.detalleR', $pedido->id) }}" class="bg-green-500 text-white px-4 py-2 rounded ml-2 inline-block">Detalles</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-4 px-4 text-center">No hay pedidos eliminados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </body>

</html>