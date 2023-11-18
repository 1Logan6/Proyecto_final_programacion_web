<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ProveedorMain</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    @include('partials.navigation')
    
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Proveedres</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Estos son los actuales proveedores con los que
                    contamos.
                </p>
            </div>
            <div class="flex flex-wrap -m-2">
                @foreach ($proveedores as $proveedor)
                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                            <img alt="team"
                                class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                src="https://dummyimage.com/80x80">
                            <div class="flex-grow">
                                <h2 class="text-gray-900 title-font font-medium"><a
                                        href="{{ route('proveedor.show', $proveedor) }}">
                                        {{ $proveedor->nombre_empresa }}
                                    </a></h2>

                                    {{-- Este can solo muestra el nombre del proveedor al usuario del gate --}}
                                @can('acces-admin')
                                    <p class="text-gray-500">{{ $proveedor->nombre_empresa }}</p>
                                @endcan

                                <div class="space-x-4">
                                    <button
                                        class="inline-flex items-center gap-2 rounded-md px-3 py-1 text-sm text-gray-500 hover:text-gray-700 focus:relative">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                            <!-- Contenido del botón Edit -->
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                        <a href="{{ route('proveedor.edit', $proveedor) }}">
                                            Edit
                                        </a>
                                    </button>

                                    <button
                                        class="inline-flex items-center gap-2 rounded-md px-3 py-1 text-sm text-gray-500 hover:text-gray-700 focus:relative">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                            <!-- Contenido del botón View -->
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <a href="{{ route('proveedor.show', $proveedor) }}">
                                            View</a>
                                    </button>

                                    <form action="{{ route('proveedor.destroy', $proveedor) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="inline-flex items-center gap-2 rounded-md bg-white px-3 py-1 text-sm text-blue-500 shadow-sm focus:relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                                <!-- Contenido del botón Delete -->
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</body>

</html>
