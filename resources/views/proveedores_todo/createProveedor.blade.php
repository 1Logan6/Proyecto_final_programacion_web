<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Crear Norma</title> --}}
    <title>Agregar Proveedor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    @include('partials.navigation')
    
    <h1 class="text-5xl font-extrabold dark:text-gray-900">Agregar<small class="ml-2 font-semibold text-gray-500 dark:text-gray-400">nuevo provedor</small></h1><br><br>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/proveedor" method="post" enctype="multipart/form-data">
        @csrf

        <div class="relative z-0 w-full mb-6 group">
            <label for="nombre_completo" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400">Nombre:</label><br>
            <input type="text" name="nombre_completo" value="{{ old('nombre_completo') }}"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"><br>
        </div>

        <div class="relative z-0 w-full mb-6 group">
            <label for="num_telefono" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400">Numero de telefono:</label><br>
            <input type="text" name="num_telefono" value="{{ old('num_telefono') }}"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"><br>
        </div>

        <div class="relative z-0 w-full mb-6 group">
            <label for="correo" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400">Correo electronico:</label><br>
            <input type="email" name="correo" value="{{ old('correo') }}"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"><br>
        </div>

        <div class="relative z-0 w-full mb-6 group">
            <label for="direccion" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400">Direccion:</label><br>
            <input type="text" name="direccion" value="{{ old('direccion') }}"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"><br>
        </div>

        <div class="relative z-0 w-full mb-6 group">
            <label for="nombre_empresa" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400">Nombre de empresa:</label><br>
            <input type="text" name="nombre_empresa" value="{{ old('nombre_empresa') }}"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"><br>
        </div>

        <div class="relative z-0 w-full mb-6 group">
            <label for="archivo" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400">Cargar imagen:</label><br>
            <input type="file" name="archivo"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"><br>
        </div>

        <label for="producto_id[]" class="peer-focus:font-medium absolute text-lg text-gray-500 dark:text-gray-800">Listado de produtos que vende:</label><br><br>
        <select name="producto_id[]" multiple>
            @foreach ($prods as $prod)
                <option value="{{ $prod->id }}" @selected( array_search($prod->id, old('producto_id') ?? []) !== false )>
                    {{ $prod->nombre }}
                </option>
            @endforeach
        </select>

        <br><br>

        <input type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Guardar">
    </form>
    @if ($errors->has('archivo'))
        <span class="text-danger text-sm text-gray-500 dark:text-gray-400">
            {{ $errors->first('archivo') }}
        </span>
    @endif
</body>

</html>


