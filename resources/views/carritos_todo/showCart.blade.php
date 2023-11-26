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
    
        <div class="container mx-auto p-8">
            <h1 class="text-3xl font-bold mb-6">Carrito de Compras</h1>
    
            @if ($productosEnCarrito->isEmpty())
            <p class="text-gray-600">El carrito está vacío.</p>
            @else
            <table class="w-full border-collapse border border-gray-300 mb-6">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-gray-100 border-b">Producto</th>
                        <th class="py-2 px-4 bg-gray-100 border-b">Cantidad</th>
                        <th class="py-2 px-4 bg-gray-100 border-b">Precio unitario</th>
                        <th class="py-2 px-4 bg-gray-100 border-b">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productosEnCarrito as $producto)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $producto->nombre }}</td>
                        <td class="py-2 px-4 border-b">{{ $producto->pivot->cantidad }}</td>
                        <td class="py-2 px-4 border-b">${{ $producto->precio }}</td>
                        <td class="py-2 px-4 border-b">${{ $producto->precio * $producto->pivot->cantidad }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    
            <p class="text-xl font-bold mb-4">Total: ${{ $total }}</p>
    
            <!-- Agrega aquí un formulario y un botón para realizar el pedido, por ejemplo -->
            <form action="#" method="POST">
                @csrf
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Realizar Pedido</button>
            </form>
            @endif
        </div>
    </body>

</html>