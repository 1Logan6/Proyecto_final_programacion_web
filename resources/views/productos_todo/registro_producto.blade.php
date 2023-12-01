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
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
                Dulceria rikiluis    
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Registro de producto
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="/producto" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div>
                            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del producto</label>
                            <input type="text" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div>
                            <label for="precio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                            <input type="number" step="0.01" name="precio" id="precio" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div>
                            <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div>
                            <label for="fecha_vencimiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de vencimiento</label>
                            <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div>
                            <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad stock</label>
                            <input type="number" name="stock" id="stock" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div>
                            <label for="archivo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cargar imagen</label>
                            <input type="file" name="archivo" id="archivo" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Almacenar</button>
                    </form>
                    @if ($errors->has('archivo'))
                        <span class="text-danger text-gray-900 dark:text-white">
                            {{ $errors->first('archivo') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
      </section>
    

    {{-- <form action="/producto" method="POST">
        <!-- Esta es una ruta absoluta para el store {{ route('producto.store') }} -->

        @csrf

        <label for="nombre">Nombre del producto</label><br>
        <input type="text" name="nombre"><br>

        <label for="precio">Precio</label><br>
        <input type="number" name="precio" step="0.01"><br>

        <label for="descripcion">Descripcion</label><br>
        <input type="text" name="descripcion"><br>

        <label for="fecha_vencimiento">Fecha de vencimiento</label><br>
        <input type="date" name="fecha_vencimiento"><br>

        <label for="stock">Cantidad stock</label><br>
        <input type="number" name="stock"><br>

        
        <input type="submit" value="Enviar">
    </form> --}}
</body>
</html>