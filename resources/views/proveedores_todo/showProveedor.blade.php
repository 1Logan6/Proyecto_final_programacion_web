<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vistazo Proveedor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    @include('partials.navigation')

    <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
        <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Detalle de</span>
        <span class="text-gray-400">Proveedor</span>.
    </h1>
    


    <div class="flow-root rounded-lg border border-gray-100 py-3 shadow-sm">
        <dl class="-my-3 divide-y divide-gray-100 text-sm">
            <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Nombre de empresa</dt>
                <dd class="italic text-gray-900 sm:col-span-2">{{ $proveedor->nombre_empresa }}</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Nombre de contacto</dt>
                <dd class="text-gray-700 sm:col-span-2">{{ $proveedor->nombre_completo }}</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Correo de contacto</dt>
                <dd class="text-gray-700 sm:col-span-2">{{ $proveedor->correo }}</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Numero de telefono</dt>
                <dd class="text-gray-700 sm:col-span-2">{{ $proveedor->num_telefono }}</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Direccion</dt>
                <dd class="text-gray-700 sm:col-span-2">{{ $proveedor->direccion }}</dd>
            </div>

            <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                <dt class="font-medium text-gray-900">Productos que le pedimos</dt>
                <dd class="text-gray-700 sm:col-span-2">
                    Esto sigue en proceso, es por la relacion con las tablas.
                </dd>
            </div>
        </dl>
    </div>

</body>

</html>
