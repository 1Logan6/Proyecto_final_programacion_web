<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    @include('partials.navigation')

    {{-- <h1> Estos son los productos que tenemos: </h1><br>

    <ul>
        @foreach ($productos as $producto)
            <li>
                
                <a href="{{ route('producto.show', $producto) }}">
                    {{ $producto -> nombre }}
                </a>
                <a href="{{ route('producto.edit', $producto) }}">
                    Edit
                </a>

                <form action="{{route('producto.destroy', $producto)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>

            </li>
             
        @endforeach
    </ul> --}}

    <section>
          <div class="max-w-screen-xl px-4 py-8 mx-auto sm:px-6 sm:py-12 lg:px-8">
            <header>
              <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">
                Nuestros productos
              </h2>
    
            </header>
        
            <ul class="grid gap-4 mt-8 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($productos as $producto)
                    <li>
                        <a href="#" class="block overflow-hidden group">
                        {{-- <img
                            src="https://www.superaki.mx/cdn/shop/collections/DULCES.png?v=1634682356"
                            alt=""
                            class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]"
                        /> --}}
                        <img src="{{ $producto->imagen_url }}" alt="Imagen del producto">

                        <div class="relative pt-3 bg-white">
                            <h3
                            class="text-xs text-gray-700 group-hover:underline group-hover:underline-offset-4"
                            >
                            {{ $producto -> nombre }}
                            </h3>
                
                            <p class="mt-2">
                            <span class="sr-only"> Precio: </span>
                
                            <span class="tracking-wider text-gray-900">  ${{ $producto -> precio }} </span>
                            </p>
                        </div>
                        </a>
                        <span
                            class="inline-flex -space-x-px overflow-hidden rounded-md border bg-white shadow-sm"
                            >
                            <button
                                class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:relative"
                            >
                            <a href="{{ route('producto.edit', $producto) }}">
                                Edit
                            </a>
                            </button>

                            <button
                                class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:relative"
                            >
                            <a href="{{ route('producto.show', $producto) }}">
                                View
                            </a>
                            </button>

                            <form action="{{route('producto.destroy', $producto)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:relative", type="submit"
                                >
                                    Delete
                                </button>
                            </form>

                            

                            </span>
                    </li>
                @endforeach
            </ul>
          </div>
        </section>

</body>

</html>