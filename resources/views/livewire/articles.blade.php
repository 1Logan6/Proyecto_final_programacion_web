<div class="p-2 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-4 text-2xl">
        <div>Productos</div>
    </div>
    <div class="mt-3">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-3 py-2">
                        <div class="flex items-center">Id</div>
                    </th>
                    <th class="px-3 py-2">
                        <div class="flex items-center">Nombre</div>
                    </th>
                    <th class="px-3 py-2">
                        <div class="flex items-center">Descripcion</div>
                    </th>
                    <th class="px-3 py-2">
                        <div class="flex items-center">Precio</div>
                    </th>
                    <th class="px-3 py-2">
                        <div class="flex items-center">Stock</div>
                    </th>
                    <th class="px-3 py-2">
                        <div class="flex items-center">Fecha vencimiento</div>
                    </th>
                    <th class="px-3 py-2">
                        Accion
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td class="rounded border px-4 py-2">{{ $producto->id}}</td>
                    <td class="rounded border px-4 py-2">{{ $producto->nombre}}</td>
                    <td class="rounded border px-4 py-2">{{ $producto->descripcion}}</td>
                    <td class="rounded border px-4 py-2">{{ $producto->stock}}</td>
                    <td class="rounded border px-4 py-2">{{ $producto->fecha_vencimiento}}</td>
                    <td class="rounded border px-4 py-2">Editar / Eliminar</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
