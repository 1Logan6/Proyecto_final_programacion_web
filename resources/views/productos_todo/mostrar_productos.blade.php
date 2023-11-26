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

<body>

    @include('partials.navigation')

    <div class="min-h-screen flex items-center justify-center">
      <div class="max-w-sm mx-auto">
          <a href="#" class="block rounded-lg p-4 shadow-sm shadow-indigo-100">
              <img
                alt="Home"
                src="https://dulcesdelarosa.com.mx/wp-content/uploads/dulces-de-la-rosa-caramelos-suaves-aciduladito-800x600.png"
                class="h-56 w-full rounded-md object-cover"
              />
            
              <div class="mt-2">
                <dl>
                  <div>
                    <dt class="sr-only">Precio</dt>
            
                  <dd class="text-sm text-gray-500">${{ $producto -> precio }}</dd>
                  </div>
            
                  <div>
                    <dt class="sr-only">Nombre</dt>
            
                    <dd class="font-medium">{{ $producto -> nombre }} </dd>
                  </div>
      
                  <div>
                    <dt class="sr-only">Descripcion</dt>
            
                    <dd class="font-medium">{{ $producto -> descripcion }} </dd>
                  </div>
                </dl>
            
                <div class="mt-6 flex items-center gap-8 text-xs">
                  <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                    </svg>
                    
            
                    <div class="mt-1.5 sm:mt-0">
                      <p class="text-gray-500">Stock</p>
            
                      <p class="font-medium">{{ $producto -> stock }} pzas</p>
                    </div>
                  </div>
            
                  <div class="sm:inline-flex sm:shrink-0 sm:items-center sm:gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                    </svg>
            
                    <div class="mt-1.5 sm:mt-0">
                      <p class="text-gray-500">Fecha vvencimiento</p>
            
                      <p class="font-medium">{{ $producto -> fecha_vencimiento }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </a>

          @if ($producto->stock > 0)
            <div class="container">
              {{-- <h1>{{ $producto->nombre }}</h1>
              <p>Precio: ${{ $producto->precio }}</p>
              <p>Stock disponible: {{ $producto->stock }} piezas</p> --}}
          
              {{-- <form action="{{ route('agregar-al-carrito', $producto->id) }}" method="POST">
                  @csrf
                  <label for="cantidad">Cantidad:</label>
                  <input type="number" name="cantidad" value="1" min="1">
                  <button type="submit">Agregar al carrito</button>
              </form> --}}
              <form action="{{ route('agregar-al-carrito', $producto->id) }}" method="POST" class="flex items-center space-x-2">
                @csrf
                <label for="cantidad" class="text-gray-700">Cantidad:</label>
                <input type="number" name="cantidad" value="1" min="1"  max="{{ $producto->stock }}" class="border border-gray-300 p-2 w-16 focus:outline-none focus:border-blue-500">
            
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-full flex items-center">
                  <i class="fa-solid fa-cart-shopping" style="color: #5805bd;"></i>
                    Agregar al carrito
                </button>
              </form>
            </div>
          @else
            <p class="text-red-500 font-bold text-2xl">El producto {{ $producto->nombre }} no tiene stock por el momento. ¡Pronto habrá más disponibles!</El>
          @endif

      </div>
    </div>
    

</body>



</html>