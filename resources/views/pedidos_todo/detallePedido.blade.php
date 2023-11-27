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

        <div class="container mx-auto mt-8">
            <h1 class="text-3xl font-bold mb-4">Detalles del Pedido #{{ $pedido->id }}</h1>
        
            <div class="bg-white p-6 rounded-lg shadow-md">
                <p class="text-lg font-semibold mb-2">Información del Usuario</p>
                <p>ID Usuario: {{ $pedido->usuario->id }}</p>
                <p>Nombre Usuario: {{ $pedido->usuario->name }}</p>
            </div>
        
            <div class="bg-white mt-4 p-6 rounded-lg shadow-md">
                <p class="text-lg font-semibold mb-2">Productos en el Pedido</p>
                <ul class="list-disc pl-4">
                    @foreach ($pedido->productos as $producto)
                        <li>{{ $producto->nombre }} - Cantidad: {{ $producto->pivot->cantidad }}</li>
                    @endforeach
                </ul>
            </div>
        
            <div class="bg-white mt-4 p-6 rounded-lg shadow-md">
                <p class="text-lg font-semibold mb-2">Total</p>
                <p>Total: {{ $pedido->total }}</p>
            </div>
        
            <!-- Puedes agregar más secciones según sea necesario -->
        
            <a href="{{ route('pedidos.mostrar') }}" class="block mt-8 text-blue-500 hover:underline">Volver a la Lista de Pedidos</a>
        </div>

    </body>

</html>